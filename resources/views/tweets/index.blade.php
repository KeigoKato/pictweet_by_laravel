<!-- @extendの継承を用いてlayouts/master.blade.phpの内容が反映される -->
@extends("layouts.master")
<!-- layouts/master.blade.php用いてに従って、@yield("title")に値を代入する -->
@section("title", "index")
<!-- ヘッダーとフッターの外部ファイルを@yield("header")と@yield("footer")にそれぞれ埋め込む -->
@include("layouts.header")
@include("layouts.footer")

<!-- メインの部分を以下に記述する。 -->
@section("container")
<table>
    <tr>
        <th>id: </th>
        <th>title: </th>
        <th>body: </th>
    </tr>
    @foreach($tweets as $tweet)
    <tr>
        <td>{{$tweet->id}}</td>
        <td>{{$tweet->title}}</td>
        <td>{{$tweet->body}}</td>
    </tr>
    @endforeach
</table>
@endsection