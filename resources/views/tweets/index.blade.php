<!-- @extendの継承を用いてlayouts/master.blade.phpの内容が反映される -->
@extends("layouts.master")
<!-- layouts/master.blade.php用いてに従って、@yield("title")に値を代入する -->
@section("title", "index")
<!-- ヘッダーとフッターの外部ファイルを@yield("header")と@yield("footer")にそれぞれ埋め込む -->
@include("layouts.header")
@include("layouts.footer")

<!-- メインの部分を以下に記述する。 -->
@section("container")

{{--ログイン認証--}}
{{--現在アクセスしているユーザーがログインしているかどうかを判定する--}}
@if(Auth::check())
<p>USER: {{$user->name.'('.$user->email.')'}}</p>
@else
<p>※ログインしていません。（<a href="/login">ログイン</a> | <a href="/register">会員登録</a>）</p>
@endif

<table>
    <form action="search" method="get">
        <input type="text" name="keyword">
        <input type="submit" value="search">
    </form>
    <tr>
        <th>id: </th>
        <th>title: </th>
        <th>body: </th>
        <th>edit: </th>
        <th>delete: </th>
    </tr>
    @foreach($tweets as $tweet)
    <tr>
        <td>{{$tweet->id}}</td>
        <td>{{$tweet->title}}</td>
        <td>{{$tweet->body}}</td>
        <td>
            <form action="edit" method="get">
                <input type="hidden" name="id" value="{{$tweet->id}}">
                <input type="submit" value="edit">
            </form>
            <form action="delete" method="get">
                <input type="hidden" name="id" value="{{$tweet->id}}">
                <input type="submit" value="delete">
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $tweets->links() }}
@endsection