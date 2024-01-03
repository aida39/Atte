@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection
@section('content')

<div class="container">
    <div class="menu__message">
        <p>{{$user_name}}さんお疲れ様です！</p>
    </div>

    <div class="menu__button-area">
        <form action="/start_worktime" method="post">
            @csrf
            <button class='menu__button' type="submit" @disabled(filled($start_worktime))>
                勤務開始
            </button>
        </form>

        <form action="/end_worktime" method="post">
            @csrf
            <button class='menu__button' type="submit" @disabled(filled($end_worktime))>
                勤務終了
            </button>
        </form>

        <form action="/start_breaktime" method="post">
            @csrf
            <button class='menu__button' type="submit" @disabled(filled($start_breaktime))>
                休憩開始
            </button>
        </form>

        <form action="/end_breaktime" method="post">
            @csrf
            <button class='menu__button' type="submit" @disabled(filled($end_breaktime))>
                休憩終了
            </button>
        </form>
    </div>
</div>
@endsection