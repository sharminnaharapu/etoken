<?php

namespace App\Http\Controllers\Master;

use App\Events\DoctorRoomDisplayEvent;
use App\Events\DoctorTokenGenerateEvent;
use App\Http\Controllers\Controller;
use App\Models\DoctorToken;
use App\Models\DoctorTokenCall;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorTokenController extends Controller
{
    public function index()
    {
        $doctor = User::doctor()->status()->orderBy('name', 'asc')->get();
        return view('master.token.doctor_index', compact('doctor'));
    }

    public function tokengeneral($id)
    {
        $user = User::where('id', $id)->first();

        if ($user) {
            $token = DoctorToken::latest()->first();

            if ($token) {
                $tokenNumber = $token->date == date('Y-m-d') ? $token->token_number : 0;
            } else {
                $tokenNumber = 0;
            }

            $token = DoctorToken::create([
                'doctor_id'     => $user->id,
                'department_id' => $user->department_id,
                'service_id'    => $user->service_id,
                'counter_id'    => $user->counter_id,
                'room_id'       => $user->room_id,
                'name'          => null,
                'phone'         => null,
                'token_number'  => $tokenNumber + 1,
                'note'          => null,
                'status'        => 'pending',
                'atend_by'      => null,
                'call_time'     => null,
                'date'          => onlaydate(date('Y-m-d')),
                'create_by'     => Auth::id(),
                'created_at'    => Carbon::now(),
            ]);
            $doctor = User::doctor()->status()->orderBy('name', 'asc')->get();
            $html   = view('components.token.doctor-index', compact('doctor'))->render();
            $url    = null;


            DoctorTokenGenerateEvent::dispatch($token);
            return response()->json(['html' => $html, 'url' => $url]);
        }

        return response()->json('no');

    }

    public function list()
    {
        $users = DoctorToken::query();

        if (!empty($_GET['name'])) {
            $name  = $_GET['name'];
            $users = $users->where('token_number', 'LIKE', '%' . $name . '%');
        }

        $users = $users->paginate(200);
        return view('master.token.doctor_list', compact('users'));
    }

    public function filter(Request $request)
    {
        $name   = (!empty($request->name)) ? '&name=' . $request->name : '';
        $status = (!empty($request->status)) ? '&status=' . $request->status : '';
        return redirect(route('master.doctortoken.list', $name . $status));
    }

    public function activelist()
    {
        $users = DoctorToken::where('status', 'pending')->whereDate('date', date('Y-m-d'));

        if (!empty($_GET['name'])) {
            $name  = $_GET['name'];
            $users = $users->where('token_number', 'LIKE', '%' . $name . '%');
        }

        $users = $users->orderByDesc('id')->paginate(200);
        return view('master.token.doctor_list_active', compact('users'));
    }

    public function activefilter(Request $request)
    {
        $name   = (!empty($request->name)) ? '&name=' . $request->name : '';
        $status = (!empty($request->status)) ? '&status=' . $request->status : '';
        return redirect(route('master.doctortoken.activelist', $name . $status));
    }

    public function next($id)
    {
        $token = DoctorToken::where('id', $id)->first();
        if ($token) {
            try {
                $user = Auth::user();
                DB::beginTransaction();
                $data = DoctorTokenCall::create([
                    'doctor_id'     => $user->id,
                    'department_id' => $user->department_id,
                    'service_id'    => $user->service_id,
                    'room_id'       => $user->room_id,
                    'name'          => $token->name,
                    'phone'         => $token->phone,
                    'token_number'  => $token->token_number,
                    'status'        => 'complete',
                    'atend_by'      => $user->id,
                    'call_time'     => Carbon::now(),
                    'date'          => $token->date,
                    'create_by'     => $user->id,
                ]);
                $token->update([
                    'department_id' => $token->department_id,
                    'service_id'    => $token->service_id,
                    'counter_id'    => $user->counter_id ?? 1,
                    'room_id'       => $user->room_id,
                    'status'        => 'complete',
                    'atend_by'      => $user->id,
                    'call_time'     => Carbon::now(),
                    'update_by'     => $user->id,
                ]);
                DB::commit();
                $data = DoctorTokenCall::find($data->id);
                event(new DoctorRoomDisplayEvent($data));

                return redirect()->route('master.doctortoken.activelist');
            } catch (Exception $e) {
                DB::rollback();
                $notification = [
                    'message'    => __('lang.oops'),
                    'alert-type' => 'error',
                ];
                return back()->with($notification);
            }

        }

        $notification = [
            'message'    => __('lang.oops'),
            'alert-type' => 'error',
        ];
        return back()->with($notification);

    }

}
