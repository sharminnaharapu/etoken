<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class CounterController extends Controller
{
    public function index() {
        $counters = Counter::query();

        if (!empty($_GET['name'])) {
            $name        = $_GET['name'];
            $counters = $counters->where('name', 'LIKE', '%' . $name . '%');
        }

        if (!empty($_GET['status']) && $_GET['status'] != 'all') {
            $status      = $_GET['status'];
            $counters = $counters->where('status', $status);
        }

        $counters = $counters->orderByDesc('id')->paginate(100);
        return view('master.counter.index', compact('counters'));
    }

    public function store(Request $request) {
        $request->validate([
            'name'   => 'required|min:1',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            Counter::create([
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
        $counter = Counter::where('id', $id)->first();

        if ($counter->status == 'active') {
            $counter->update([
                'status'     => 'inactive',
                'update_by'  => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
        } elseif ($counter->status == 'inactive') {
            $counter->update([
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
        $counter = Counter::with('updateby', 'createby')->where('id', $id)->first();
        $html       = view('master.counter.show', compact('counter'))->render();
        return response()->json(['html' => $html]);
    }

    public function edit($id) {
        $counter = Counter::where('id', $id)->first();
        $html       = view('master.counter.edit', compact('counter'))->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id) {
        $counter = Counter::where('id', $id)->first();
        $request->validate([
            'name'   => 'required|min:1',
            'status' => 'required|in:active,inactive',
        ]);
        $counter->update([
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
        return redirect(route('master.counter.index', $name . $status));
    }
}
