<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\CounterTokenCall;
use App\Models\Display;
use App\Models\DoctorTokenCall;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;

class DisplayShowController extends Controller
{
    public function roomindex()
    {
        $rooms = Room::query();

        if (!empty($_GET['name'])) {
            $name  = $_GET['name'];
            $rooms = $rooms->where('name', 'LIKE', '%' . $name . '%');
        }
        if (!empty($_GET['status']) && $_GET['status'] != 'all') {
            $status = $_GET['status'];
            $rooms  = $rooms->where('status', $status);
        }

        $rooms = $rooms->orderByDesc('id')->paginate(100);
        return view('master.displayshow.room_list', compact('rooms'));
    }

    public function roomfilter(Request $request)
    {
        $name   = (!empty($request->name)) ? '&name=' . $request->name : '';
        $status = (!empty($request->status)) ? '&status=' . $request->status : '';
        return redirect(route('master.displayshow.roomindex', $name . $status));
    }
    public function roomview($id)
    {
        $room      = Room::where('id', $id)->first();
        $lasttoken = DoctorTokenCall::where('room_id', $id)->latest()->first();
        return view('master.displayshow.room_view', compact('room', 'lasttoken'));

    }

    public function counterindex()
    {
        $counters = Counter::query();

        if (!empty($_GET['name'])) {
            $name     = $_GET['name'];
            $counters = $counters->where('name', 'LIKE', '%' . $name . '%');
        }

        if (!empty($_GET['status']) && $_GET['status'] != 'all') {
            $status   = $_GET['status'];
            $counters = $counters->where('status', $status);
        }

        $counters = $counters->orderByDesc('id')->paginate(100);
        // return view('master.counter.index', compact('counters'));
        return view('master.displayshow.counter_list', compact('counters'));
    }
    public function counterfilter(Request $request)
    {
        $name   = (!empty($request->name)) ? '&name=' . $request->name : '';
        $status = (!empty($request->status)) ? '&status=' . $request->status : '';
        return redirect(route('master.displayshow.roomindex', $name . $status));
    }

    public function counterView($display)
    {
        $counterTokens = self::service($display);
        return view('master.displayshow.counter_view', compact('counterTokens'));
    }

    private static function service($display)
    {
        $display  = Display::whereId($display)->first();
        $services = $display->service()->get()->filter(function ($service) {
            return $service['counter'] = $service->service->counter;
        });
        $counterIds = static::flattenForService($services);
        return CounterTokenCall::with('counter')->whereIn('counter_id', $counterIds)->latest('created_at')->limit(10)->get();
    }

    public static function flattenForService($services)
    {
        $newModel = [];
        $ids      = [];
        foreach ($services as $service) {
            array_push($newModel, $service->counter);
        }

        foreach ($newModel as $key => $value) {
            for ($index = 0; $index < count($value); $index++) {
                array_push($ids, $value[$index]->toArray()['counter']['id']);
            }
        }
        return $ids;
    }
}
