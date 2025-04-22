<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller {
    public function index() {
        $departments = Department::query();

        if (!empty($_GET['name'])) {
            $name        = $_GET['name'];
            $departments = $departments->where('name', 'LIKE', '%' . $name . '%');
        }

        if (!empty($_GET['status']) && $_GET['status'] != 'all') {
            $status      = $_GET['status'];
            $departments = $departments->where('status', $status);
        }

        $departments = $departments->orderByDesc('id')->paginate(100);
        return view('master.department.index', compact('departments'));
    }

    public function store(Request $request) {
        $request->validate([
            'name'   => 'required|min:2',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            Department::create([
                'deacription' => $request->deacription,
                'name'        => $request->name,
                'status'      => $request->status,
                'create_by'   => Auth::id(),
                'created_at'  => Carbon::now(),
            ]);
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
        $department = Department::where('id', $id)->first();

        if ($department->status == 'active') {
            $department->update([
                'status'     => 'inactive',
                'update_by'  => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
        } elseif ($department->status == 'inactive') {
            $department->update([
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
        $department = Department::with('updateby', 'createby')->where('id', $id)->first();
        $html       = view('master.department.show', compact('department'))->render();
        return response()->json(['html' => $html]);
    }

    public function edit($id) {
        $department = Department::where('id', $id)->first();
        $html       = view('master.department.edit', compact('department'))->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id) {
        $department = Department::where('id', $id)->first();
        $request->validate([
            'name'   => 'required|min:2',
            'status' => 'required|in:active,inactive',
        ]);
        $department->update([
            'name'       => $request->name,
            'status'     => $request->status,
            'update_by'  => Auth::id(),
            'updated_at' => Carbon::now(),
        ]);
        $notification = [
            'message'    => __('lang.update_message'),
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    public function filter(Request $request) {
        $name   = (!empty($request->name)) ? '&name=' . $request->name : '';
        $status = (!empty($request->status)) ? '&status=' . $request->status : '';
        return redirect(route('master.department.index', $name . $status));
    }
}
