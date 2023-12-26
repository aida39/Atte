@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection
@section('content')

<div class="container">
    <div class="content__date">
        <span>
            <a href="/attendance?date={{$previous_day}}">&lt;</a>
        </span>
        {{$current_day}}
        <span>
            <a href="/attendance?date={{$next_day}}">&gt;</a>
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
                    @foreach($worktime->breaktimes as $breaktime)
                    @php
                    $start_breaktime =\Carbon\Carbon::parse($breaktime['start_breaktime']);
                    $end_breaktime =\Carbon\Carbon::parse($breaktime['end_breaktime']);
                    $sum_breaktime = $start_breaktime->diff($end_breaktime);

                    @endphp
                    {{$sum_breaktime->format('%H:%I:%S')}}
                    @endforeach
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
    <div class="content__pagination"></div>
</div>
@endsection