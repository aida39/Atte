@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection
@section('content')

<div class="container">
    <div class="content__date">
        <span>
            <a href="{{ route('show_date', ['date' => $previous_day]) }}">&lt;</a>
        </span>
        {{$current_day}}
        <span>
            <a href="{{ route('show_date', ['date' => $next_day]) }}">&gt;</a>
        </span>

    </div>
    <div class="content__attendance">
        <table>
            <tr>
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            @foreach($worktimes as $worktime)
            <tr>
                <td>{{ $worktime['user']['name'] }}</td>
                <td>{{ $worktime['start_worktime'] }}</td>
                <td>{{ $worktime['end_worktime'] }}</td>

                <td>
                    @php
                    $sum_breaktime=0;
                    @endphp

                    @foreach($worktime->breaktimes as $breaktime)
                    @php
                    $start_breaktime =\Carbon\Carbon::parse($breaktime['start_breaktime']);
                    $end_breaktime =\Carbon\Carbon::parse($breaktime['end_breaktime']);
                    $diff_breaktime = $start_breaktime->diffInSeconds($end_breaktime);
                    $sum_breaktime += $diff_breaktime;
                    @endphp
                    @endforeach

                    @php
                    $hours = floor($sum_breaktime / 3600);
                    $minutes = floor(($sum_breaktime % 3600) / 60);
                    $seconds = $sum_breaktime % 60;
                    $formatted_breaktime = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                    @endphp
                    {{$formatted_breaktime}}
                </td>
                </td>

                <td>
                    @php
                    $start_worktime =\Carbon\Carbon::parse($worktime['start_worktime']);
                    $end_worktime =\Carbon\Carbon::parse($worktime['end_worktime']);
                    $total_worktime =$start_worktime->diff($end_worktime);
                    @endphp
                    {{$total_worktime->format('%H:%I:%S')}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="content__pagination">{{ $worktimes->links() }}</div>
</div>
@endsection