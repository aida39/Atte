<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Worktime;
use Carbon\Carbon;

class TimeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function list()
    {
        return view('attendance');
    }

    public function start_worktime()
    {
        $id = Auth::id();
        $date = Carbon::now()->toDateString();
        $time = Carbon::now()->toTimeString();

        Worktime::create([
            'user_id' => $id,
            'date_worktime' => $date,
            'start_worktime' => $time,
        ]);
        return redirect()->back();
    }

    public function end_worktime()
    {
        $user = Auth::user();
        $record = Worktime::where('user_id', $user->id)->latest()->first();
        $time = Carbon::now()->toTimeString();

        $record->update([
            'end_worktime' => $time,
        ]);
        return redirect()->back();
    }
}
