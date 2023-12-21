@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection
@section('content')
打刻ページ
<form action="/start_worktime" method="post">
    @csrf
    <button type="submit" @disabled($date->isNotEmpty())>
        勤務開始
    </button>
</form>

<form action="/end_worktime" method="post">
    @csrf
    <button type="submit" @disabled($errors->isNotEmpty())>
        勤務終了
    </button>
</form>

@endsection