@extends("layouts.master")

@section("title", "index")

@include("layouts.header")

@include("layouts.footer")

<!-- メインの部分を以下に記述する。 -->
@section("container")
<table>
    <form action="/tweets/add" method="post">
    {{csrf_field()}}
        <tr>
            <th>title: </th>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <th>body: </th>
            <td><input type="text" name="body"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="send"></td>
        </tr>
    </form>
</table>
@endsection