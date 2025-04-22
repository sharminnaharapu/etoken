<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\Department;
use App\Models\Service;
use App\Models\ServiceCounter;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller {
    public function index() {
        $services = Service::query();

        if (!empty($_GET['name'])) {
            $name     = $_GET['name'];
            $services = $services->where('name', 'LIKE', '%' . $name . '%');
        }

        if (!empty($_GET['status']) && $_GET['status'] != 'all') {
            $status   = $_GET['status'];
            $services = $services->where('status', $status);
        }

        $services    = $services->orderByDesc('id')->paginate(100);
        $departments = Department::status()->get();
        $counters    = Counter::status()->get();
        // return $services;
        return view('master.service.index', compact('services', 'departments', 'counters'));
    }

    public function store(Request $request) {
        $request->validate([
            'counter'    => 'required',
            'department' => 'required|integer|min:1',
            'name'       => 'required|min:2',
            'status'     => 'required|in:active,inactive',
            'image'      => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $manelogo  = $request->file('image');
            $imageName = time() . '.' . $manelogo->extension();
            $manelogo->move(public_path('image/service/'), $imageName);

            $serviseId = Service::insertGetId([
                'department_id' => $request->department,
                'deacription'   => $request->deacription,
                'name'          => $request->name,
                'image'         => $imageName,
                'status'        => $request->status,
                'create_by'     => Auth::id(),
                'created_at'    => Carbon::now(),
            ]);

            foreach ($request['counter'] as $value) {
                ServiceCounter::Create([
                    'service_id' => $serviseId,
                    'counter_id' => $value,
                    'created_at' => Carbon::now(),
                ]);
            }

            $notification = [
                'message'    => __('lang.add_message'),
                'alert-type' => 'success',
            ];
        } catch (Exception $e) {
            $notification = [
                'message'    => __('lang.oops'),
                'alert-type' => 'error',
            ];
        }

        return redirect()->back()->with($notification);
    }

    public function status($id) {
        $service = Service::where('id', $id)->first();

        if ($service->status == 'active') {
            $service->update([
                'status'     => 'inactive',
                'update_by'  => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
        } elseif ($service->status == 'inactive') {
            $service->update([
                'status'     => 'active',
                'update_by'  => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = [
            'message'    => __('lang.update_status_message'),
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    public function show($id) {
        $service = Service::with('updateby', 'createby')->where('id', $id)->first();
        $html    = view('master.service.show', compact('service'))->render();
        return response()->json(['html' => $html]);
    }

    public function edit($id) {
        $departments = Department::status()->get();
        $counters    = Counter::status()->get();
        $services    = Service::whereNotIn('id', [$id])->orderByDesc('id')->paginate(100);
        $service     = Service::where('id', $id)->first();
        // return $service;
        return view('master.service.edit', compact('service', 'departments', 'counters', 'services'));
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id) {
        $service = Service::where('id', $id)->first();
        $request->validate([
            'counter'    => 'required',
            'department' => 'required|integer|min:1',
            'name'       => 'required|min:2',
            'status'     => 'required|in:active,inactive',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            foreach ($service->counter as $value) {
                $value->delete();
            }
            if ($request->file('image')) {
                if (file_exists('image/service/' . $service->image)) {
                    unlink('image/service/' . $service->image);
                }
                $manelogo  = $request->file('image');
                $imageName = time() . '.' . $manelogo->extension();
                $manelogo->move(public_path('image/service/'), $imageName);
            } else {
                $imageName = $service->image;
            }

            $service->update([
                'department_id' => $request->department,
                'deacription'   => $request->deacription,
                'name'          => $request->name,
                'image'         => $imageName,
                'status'        => $request->status,
                'update_by'     => Auth::id(),
                'updated_at'    => Carbon::now(),
            ]);

            foreach ($request['counter'] as $value) {
                ServiceCounter::Create([
                    'service_id' => $service->id,
                    'counter_id' => $value,
                    'created_at' => Carbon::now(),
                ]);
            }

            $notification = [
                'message'    => __('lang.update_message'),
                'alert-type' => 'success',
            ];
        } catch (Exception $e) {
            $notification = [
                'message'    => __('lang.oops'),
                'alert-type' => 'error',
            ];
        }


        return redirect()->route('master.service.index')->with($notification);
    }

    public function filter(Request $request) {
        $name   = (!empty($request->name)) ? '&name=' . $request->name : '';
        $status = (!empty($request->status)) ? '&status=' . $request->status : '';
        return redirect(route('master.service.index', $name . $status));
    }

}
