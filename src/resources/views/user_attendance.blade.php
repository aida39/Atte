@extends('layouts.app')

@section('css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/user_attendance.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="content__user-list">
        <div>
            <h1 class="content__heading">{{ $user['name'] }}さん 勤怠表</h1>
        </div>
        <table class="content__table">
            <tr class="content__table-row">
                <th>日付</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            @foreach($worktimes as $worktime)
            <tr class="content__table-row">
                <td>{{ $worktime['date_worktime'] }}</td>
                <td>{{ $worktime['start_worktime'] }}</td>
                <td>{{ $worktime['end_worktime'] }}</td>
                <td>
                    @php
                    $sum_breaktime = $worktime->breaktimes->sum(function ($breaktime) {
                    return Carbon\Carbon::parse($breaktime['start_breaktime'])
                    ->diffInSeconds(Carbon\Carbon::parse($breaktime['end_breaktime']));
                    });

                    $formatted_breaktime = gmdate("H:i:s", $sum_breaktime);
                    @endphp
                    {{ $formatted_breaktime }}
                </td>
                <td>
                    @php
                    $start_worktime = Carbon\Carbon::parse($worktime['start_worktime']);
                    $end_worktime = Carbon\Carbon::parse($worktime['end_worktime']);
                    $diff_worktime = $start_worktime->diffInSeconds($end_worktime);
                    $sum_worktime = $diff_worktime - $sum_breaktime;

                    $formatted_worktime = gmdate("H:i:s", $sum_worktime);
                    @endphp
                    {{ $formatted_worktime }}
                </td>
            </tr>
            @endforeach
        </table>

    </div>
    <div class="content__pagination">{{ $worktimes->links('vendor.pagination.default') }}</div>
</div>
@endsection