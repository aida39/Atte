@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="content__user-list">
        <div class="content__heading">
            <h1>ユーザー一覧</h1>
        </div>

        <table class="content__table">
            <tr class="content__table-row">
                <th>名前</th>
            </tr>
            @foreach($users as $user)
            <tr class="content__table-row">
                <td>{{$user['name']}} </td>
                <td><a class="content__table-link" href="/">勤怠表</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection