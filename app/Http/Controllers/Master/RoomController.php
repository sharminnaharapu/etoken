<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index() {
        $rooms = Room::query();

        if (!empty($_GET['name'])) {
            $name        = $_GET['name'];
            $rooms = $rooms->where('name', 'LIKE', '%' . $name . '%');
        }

        if (!empty($_GET['status']) && $_GET['status'] != 'all') {
            $status      = $_GET['status'];
            $rooms = $rooms->where('status', $status);
        }

        $rooms = $rooms->orderByDesc('id')->paginate(100);
        return view('master.room.index', compact('rooms'));
    }

    public function store(Request $request) {
        $request->validate([
            'name'   => 'required|min:1',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            Room::create([
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
        $room = Room::where('id', $id)->first();

        if ($room->status == 'active') {
            $room->update([
                'status'     => 'inactive',
                'update_by'  => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
        } elseif ($room->status == 'inactive') {
            $room->update([
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
        $rooms = Room::with('updateby', 'createby')->where('id', $id)->first();
        $html       = view('master.rooms.show', compact('rooms'))->render();
        return response()->json(['html' => $html]);
    }

    public function edit($id) {
        $room = Room::where('id', $id)->first();
        $html       = view('master.room.edit', compact('room'))->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id) {
        $room = Room::where('id', $id)->first();
        $request->validate([
            'name'   => 'required|min:1',
            'status' => 'required|in:active,inactive',
        ]);
        $room->update([
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
        return redirect(route('master.room.index', $name . $status));
    }
}

