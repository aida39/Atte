<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Worktime;
use App\Models\Breaktime;
use App\Models\User;
use Carbon\Carbon;

class TimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        $user = Auth::user();
        $user_name = $user->name;
        $date = Carbon::now()->toDateString();
        $date_record = Worktime::where('user_id', $user->id)->latest('date_worktime')->pluck('date_worktime')->first();
        if ($date == $date_record) {
            $start_worktime = 'disabled';
        } else {
            $start_worktime = '';
        }

        $end_record = Worktime::where('user_id', $user->id)->latest('date_worktime')->pluck('end_worktime')->first();
        if ($start_worktime == 'disabled' && $end_record == '') {
            $end_worktime = '';
        } else {
            $end_worktime = 'disabled';
        }

        $id = Auth::id();
        $worktime_id = Worktime::where('date_worktime', $date)->where('user_id', $id)->pluck('id')->first();
        $break_data = Breaktime::where('worktime_id', $worktime_id)->first();
        $break_record = Breaktime::where('worktime_id', $worktime_id)->latest('start_breaktime')->pluck('end_breaktime')->first();
        if ($date == $date_record && $end_record == '' && empty($break_data)) {
            $start_breaktime = '';
            $end_breaktime = 'disabled';
        } elseif ($date == $date_record && $end_record == '' && $break_record == '') {
            $end_worktime = 'disabled';
            $start_breaktime = 'disabled';
            $end_breaktime = '';
        } elseif ($date == $date_record && $end_record == '' && $break_record != '') {
            $start_breaktime = '';
            $end_breaktime = 'disabled';
        } else {
            $start_breaktime = 'disabled';
            $end_breaktime = 'disabled';
        }


        return view('index', compact('user_name', 'start_worktime', 'end_worktime', 'start_breaktime', 'end_breaktime'));
    }

    public function attendance(Request $request)
    {
        $date = $request->input('date', Carbon::now()->toDateString());
        $page = $request->input('page', 1);

        $worktimes = Worktime::with('user', 'breaktimes')->where('date_worktime', $date)->paginate(5, ['*'], 'page', $page)->withQueryString();


        $current_day = $date;
        $previous_day = Carbon::parse($current_day)->copy()->subDay()->toDateString();
        $next_day = Carbon::parse($current_day)->copy()->addDay()->toDateString();

        return view('attendance', compact('worktimes', 'current_day', 'previous_day', 'next_day'));
    }

    public function user()
    {
        $users = User::paginate(5);
        return view('user', compact('users'));
    }

    public function user_attendance(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $page = $request->input('page', 1);
        $worktimes = Worktime::with('user', 'breaktimes')->where('user_id', $id)->paginate(5, ['*'], 'page', $page)->withQueryString();
        return view('user_attendance', compact('user', 'worktimes'));
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

    public function start_breaktime()
    {
        $id = Auth::id();
        $date = Carbon::now()->toDateString();
        $time = Carbon::now()->toTimeString();
        $worktime_id = Worktime::where('date_worktime', $date)->where('user_id', $id)->pluck('id')->first();

        Breaktime::create([
            'worktime_id' => $worktime_id,
            'start_breaktime' => $time,
        ]);
        return redirect()->back();
    }

    public function end_breaktime()
    {
        $id = Auth::id();
        $date = Carbon::now()->toDateString();
        $time = Carbon::now()->toTimeString();
        $worktime_id = Worktime::where('date_worktime', $date)->where('user_id', $id)->pluck('id')->first();
        $record = Breaktime::where('worktime_id', $worktime_id)->latest()->first();

        $record->update([
            'end_breaktime' => $time,
        ]);
        return redirect()->back();
    }
}
