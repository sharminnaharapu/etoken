<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Room;
use App\Models\Service;
use App\Models\ServiceCounter;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query();

        if (!empty($_GET['name'])) {
            $name  = $_GET['name'];
            $users = $users->where('name', 'LIKE', '%' . $name . '%');
        }
        if (!empty($_GET['status']) && $_GET['status'] != 'all') {
            $status = $_GET['status'];
            $users  = $users->where('isban', $status);
        }

        $users = $users->orderByDesc('id')->paginate(100);
        return view('master.user.index', compact('users'));
    }

    function create()
    {
        $departments = Department::status()->orderByDesc('id')->get();
        $rooms       = Room::status()->orderByDesc('id')->get();
        return view('master.user.create', compact('departments', 'rooms'));
    }

    function serviceget(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required|integer',
        ]);

        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()]);
        }

        if ($request->ajax()) {
            $services = Service::where('department_id', $request->id)->status()->get();
            $outpot   = '<option value=" " disabled selected> ' . __('lang.select_one') . '</option>';

            foreach ($services as $data) {
                $outpot .= '<option value=" ' . $data->id . ' ">' . $data->name . '</option>';
            }

            return $outpot;
        }
    }

    function counterget(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required|integer',
        ]);

        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()]);
        }

        if ($request->ajax()) {
            $counter = ServiceCounter::where('service_id', $request->id)->get();
            $outpot  = '<option value=" " disabled selected> ' . __('lang.select_one') . '</option>';

            foreach ($counter as $data) {
                $outpot .= '<option value=" ' . $data->counter->id . ' ">' . $data->counter->name . '</option>';
            }

            return $outpot;
        }
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'           => 'required|min:2',
            'id_card_number' => 'required|min:6',
            'username'       => 'required|min:2',
            'doctor'         => 'required',
            'email'          => 'required|email',
            'phone'          => 'required|min:2',
            'department'     => 'required|integer',
            'service'        => 'required|integer',
            'counter'        => 'nullable|integer',
            'room'           => 'nullable|integer',
            'image'          => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()]);
        }

        $employee = substr($request->username, 0, 2);
        try {
            $manelogo  = $request->file('image');
            $imageName = date('ymdms') . time() . '.' . $manelogo->extension();
            User::create([
                'username'       => $request->username,
                'employee_id'    => $employee . date('ymdms'),
                'name'           => $request->name,
                'role_id'        => null,
                'developer'      => null,
                'doctor'         => $request->doctor,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'department_id'  => $request->department,
                'service_id'     => $request->service,
                'counter_id'     => $request->counter ?? null,
                'room_id'        => $request->room ?? null,
                'date_of_birth'  => $request->date_of_birth,
                'note'           => $request->note,
                'gender'         => $request->gender,
                'id_card_number' => $request->id_card_number,
                'image'          => $imageName,
                'isban'          => 'active',
                'last_seen'      => null,
                'password'       => bcrypt($employee . date('ymdms')),
                'signature'      => null,
                'stamp'          => null,
                'created_at'     => Carbon::now(),
            ]);
            $manelogo->move(public_path('image/profile/'), $imageName);
            return response()->json([
                'status'  => 200,
                'alert'    => 'success',
                'message' => __('lang.add_message'),
                'url'     => route('master.user.index'),
            ]);
        } catch (Exception $e) {

            return response()->json([
                'alert'    => 'error',
                'message' => __('lang.oops')
            ]);
        }
        return response()->json([ 'alert'    => 'error','message' => __('lang.oops')]);
    }

    public function status($id)
    {
        $user = User::where('id', $id)->first();

        if ($user->isban == 'active') {
            $user->update([
                'isban'     => 'inactive',
                'update_by'  => Auth::id(),
                'updated_at' => Carbon::now(),
            ]);
        } elseif ($user->isban == 'inactive') {
            $user->update([
                'isban'     => 'active',
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



    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        $departments = Department::status()->orderByDesc('id')->get();
        $rooms       = Room::status()->orderByDesc('id')->get();
        return view('master.user.edit', compact('departments', 'rooms', 'user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $validate = Validator::make($request->all(), [
            'name'           => 'required|min:2',
            'id_card_number' => 'required|min:6',
            'username'       => 'required|min:2',
            'doctor'         => 'required',
            'email'          => 'required|email',
            'phone'          => 'required|min:2',
            'department'     => 'required|integer',
            'service'        => 'required|integer',
            'counter'        => 'nullable|integer',
            'room'           => 'nullable|integer',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()]);
        }

        $employee = substr($request->username, 0, 2);
        try {
            if ($request->file('image')) {
                if (file_exists('image/profile/' . $user->image)) {
                    unlink('image/profile/' . $user->image);
                }
                $manelogo  = $request->file('image');
                $imageName = time() . '.' . $manelogo->extension();
                $manelogo->move(public_path('image/profile/'), $imageName);
            } else {
                $imageName = $user->image;
            }

            $user->update([
                'username'       => $request->username,
                'employee_id'    => $employee . date('ymdms'),
                'name'           => $request->name,
                'role_id'        => null,
                'developer'      => null,
                'doctor'         => $request->doctor,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'department_id'  => $request->department,
                'service_id'     => $request->service,
                'counter_id'     => $request->counter ?? null,
                'room_id'        => $request->room ?? null,
                'date_of_birth'  => $request->date_of_birth,
                'note'           => $request->note,
                'gender'         => $request->gender,
                'id_card_number' => $request->id_card_number,
                'image'          => $imageName,
                'last_seen'      => null,
                // 'password'       => bcrypt($employee . date('ymdms')),
                'signature'      => null,
                'stamp'          => null,
                'updated_at'     => Carbon::now(),
            ]);
            return response()->json([
                'status'  => 200,
                'alert'    => 'success',
                'message' => __('lang.add_message'),
                'url'     => route('master.user.index'),
            ]);
        } catch (Exception $e) {

            return response()->json([
                'alert'    => 'error',
                'message' => __('lang.oops'),
            ]);
        }
        return response()->json([
            'alert'    => 'error',
            'message' => __('lang.oops'),
        ]);
    }

    public function filter(Request $request)
    {
        $name   = (!empty($request->name)) ? '&name=' . $request->name : '';
        $status = (!empty($request->status)) ? '&status=' . $request->status : '';
        return redirect(route('master.user.index', $name . $status));
    }
}
