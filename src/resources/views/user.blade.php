@extends('layouts.app')

@section('css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/user.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="content__user-list">
        <div>
            <h1 class="content__heading">ユーザー一覧</h1>
        </div>
        <table class="content__table">
            <tr class="content__table-row">
                <th>名前</th>
            </tr>
            @foreach($users as $user)
            <tr class="content__table-row">
                <td>{{$user['name']}} </td>
                <td><a class="content__table-link" href="/user/attendance?id={{$user['id']}} ">勤怠表</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="content__pagination">{{ $users->links('vendor.pagination.default') }}</div>

</div>
@endsection