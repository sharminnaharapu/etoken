<?php

namespace App\Http\Controllers\Master;

use App\Events\CounterTokenEvent;
use App\Events\TokenGenerateEvent;
use App\Http\Controllers\Controller;
use App\Models\CounterTokenCall;
use App\Models\Department;
use App\Models\Service;
use App\Models\Token;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TokenController extends Controller
{
    public function index()
    {
        $departments = Department::status()->orderBy('name', 'asc')->get();
        return view('master.token.index', compact('departments'));
    }

    public function servicedataget($id)
    {
        $service = Service::where('department_id', $id)->status()->orderBy('name', 'asc')->get();
        $html    = view('components.token.service', compact('service'))->render();
        return response()->json(['html' => $html]);
    }

    public function tokengeneral($id)
    {
        $service = Service::where('id', $id)->first();

        if ($service) {
            $token = Token::latest()->first();

            if ($token) {
                $tokenNumber = $token->date == date('Y-m-d') ? $token->token_number : 0;
            } else {
                $tokenNumber = 0;
            }

            $token = Token::create([
                'department_id' => $service->department_id,
                'service_id'    => $service->id,
                'counter_id'    => null,
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
            event(new TokenGenerateEvent($token));
            $departments = Department::status()->orderBy('name', 'asc')->get();
            $html        = view('components.token.department', compact('departments'))->render();
            $url         = null;
            $message    = 'Token has been generated successfully!  Token Number is: '.$tokenNumber + 1;
            return response()->json(['html' => $html, 'url' => $url,'message'=>$message]);
        }

        return response()->json('no');

    }

    public function list()
    {
        $tokens = Token::query();

        if (!empty($_GET['name'])) {
            $name   = $_GET['name'];
            $tokens = $tokens->where('token_number', 'LIKE', '%' . $name . '%');
        }

        $tokens = $tokens->paginate(200);
        return view('master.token.list', compact('tokens'));
    }

    public function filter(Request $request)
    {
        $name   = (!empty($request->name)) ? '&name=' . $request->name : '';
        $status = (!empty($request->status)) ? '&status=' . $request->status : '';
        return redirect(route('master.token.list', $name . $status));
    }

    public function activelist()
    {
        $tokens = Token::where('status', 'pending')->whereDate('date', date('Y-m-d'));

        if (!empty($_GET['name'])) {
            $name   = $_GET['name'];
            $tokens = $tokens->where('token_number', 'LIKE', '%' . $name . '%');
        }

        $tokens = $tokens->orderByDesc('id')->paginate(200);
        return view('master.token.list_active', compact('tokens'));
    }

    public function activefilter(Request $request)
    {
        $name   = (!empty($request->name)) ? '&name=' . $request->name : '';
        $status = (!empty($request->status)) ? '&status=' . $request->status : '';
        return redirect(route('master.token.activelist', $name . $status));
    }

    public function next($id)
    {
        $token = Token::where('id', $id)->first();

        if ($token) {
            try {
                $user = Auth::user();
                DB::beginTransaction();
                $newToken = CounterTokenCall::create([
                    'department_id' => $user->department_id,
                    'service_id'    => $user->service_id,
                    'counter_id'    => $user->counter_id,
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
                    'counter_id'    => $user->counter_id,
                    'status'        => 'complete',
                    'atend_by'      => $user->id,
                    'call_time'     => Carbon::now(),
                    'update_by'     => $user->id,
                ]);
                DB::commit();
                $newToken = CounterTokenCall::with('counter')->whereId($newToken->id)->first();
                event(new CounterTokenEvent($newToken));
                return redirect()->route('master.token.activelist');
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
