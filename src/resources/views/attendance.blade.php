@extends('layouts.app')
@section('css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="content__date">
        <a href="{{ route('show_date', ['date' => $previous_day]) }}">
            <span class="content__date--block">
                &lt;
            </span>
        </a>
        <span class="content__date-display">
            {{$current_day}}
        </span>
        <a href="{{ route('show_date', ['date' => $next_day]) }}">
            <span class="content__date--block">
                &gt;
            </span>
        </a>
    </div>
    <div class="content__attendance">
        <table class="content__table">
            <tr class="content__table-row">
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            @foreach($worktimes as $worktime)
            <tr class="content__table-row">
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
                    $diff_worktime =$start_worktime->diffInSeconds($end_worktime);
                    $sum_worktime = $diff_worktime-$sum_breaktime;

                    $hours = floor($sum_worktime / 3600);
                    $minutes = floor(($sum_worktime % 3600) / 60);
                    $seconds = $sum_worktime % 60;
                    $formatted_worktime = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                    @endphp
                    {{$formatted_worktime}}

                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="content__pagination">{{ $worktimes->links('vendor.pagination.default') }}</div>
</div>
@endsection