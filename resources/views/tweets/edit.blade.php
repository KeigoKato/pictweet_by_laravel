@extends("layouts.master")

@section("title", "index")

@include("layouts.header")

@include("layouts.footer")

<!-- メインの部分を以下に記述する。 -->
@section("container")
<table>
    <form action="edit" method="post">
    {{csrf_field()}}
        <input type="hidden" name="id" value="{{$tweet->id}}">
        <tr>
            <th>title: </th>
            <td><input type="text" name="title" value="{{$tweet->title}}"></td>
        </tr>
        <tr>
            <th>body: </th>
            <td><input type="text" name="body" value="{{$tweet->body}}"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="send"></td>
        </tr>
    </form>
</table>
@endsection