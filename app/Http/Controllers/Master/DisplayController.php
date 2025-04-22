<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Display;
use App\Models\DisplayService;
use App\Models\Service;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller {
    public function index() {
        $displays = Display::query();

        if (!empty($_GET['name'])) {
            $name     = $_GET['name'];
            $displays = $displays->where('name', 'LIKE', '%' . $name . '%');
        }

        if (!empty($_GET['status']) && $_GET['status'] != 'all') {
            $status   = $_GET['status'];
            $displays = $displays->where('status', $status);
        }

        $displays = $displays->orderByDesc('id')->paginate(100);
        $services = Service::status()->orderByDesc('id')->get();
        return view('master.display.index', compact('displays', 'services'));
    }

    public function store(Request $request) {
        $request->validate([
            'service' => 'required',
            'name'    => 'required|min:2',
            'status'  => 'required|in:active,inactive',
        ]);
        try {

            $displayId = Display::insertGetId([
                'deacription' => $request->deacription,
                'name'        => $request->name,
                'status'      => $request->status,
                'create_by'   => Auth::id(),
                'created_at'  => Carbon::now(),
            ]);

            foreach ($request['service'] as $value) {
                DisplayService::Create([
                    'display_id' => $displayId,
                    'service_id' => $value,
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
        $display = Display::where('id', $id)->first();

        if ($display->status == 'active') {
            $display->update([
                'status'     => 'inactive',
                'update_by'  => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
        } elseif ($display->status == 'inactive') {
            $display->update([
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
        $display = Display::with('updateby', 'createby')->where('id', $id)->first();
        $html    = view('master.display.show', compact('display'))->render();
        return response()->json(['html' => $html]);
    }

    public function edit($id) {
        $display  = Display::where('id', $id)->first();
        $displays = Display::whereNotIn('id', [$id])->orderByDesc('id')->paginate(100);

        $services = Service::status()->orderByDesc('id')->get();

        return view('master.display.edit', compact('display', 'displays', 'services'));
    }

    public function update(Request $request, $id) {
        $display = Display::where('id', $id)->first();
        $request->validate([
            'service' => 'required',
            'name'    => 'required|min:2',
            'status'  => 'required|in:active,inactive',
        ]);
        try {

            foreach ($display->service as $value) {
                $value->delete();
            }

            $display->update([
                'deacription' => $request->deacription,
                'name'        => $request->name,
                'status'      => $request->status,
                'update_by'   => Auth::id(),
                'updated_at'  => Carbon::now(),
            ]);

            foreach ($request['service'] as $value) {
                DisplayService::Create([
                    'display_id' => $display->id,
                    'service_id' => $value,
                    'created_at' => Carbon::now(),
                ]);
            }

            $notification = [
                'message'    => __('lang.update_message'),
                'alert-type' => 'success',
            ];
        } catch (Exception $e) {
            $notification = [
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
            ];
        }

        return redirect()->route('master.display.index')->with($notification);
    }

    public function filter(Request $request) {
        $name   = (!empty($request->name)) ? '&name=' . $request->name : '';
        $status = (!empty($request->status)) ? '&status=' . $request->status : '';
        return redirect(route('master.department.index', $name . $status));
    }

}
