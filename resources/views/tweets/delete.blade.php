@extends("layouts.master")

@section("title", "index")

@include("layouts.header")

@include("layouts.footer")

<!-- メインの部分を以下に記述する。 -->
@section("container")
<table>
    <form action="delete" method="post">
    {{csrf_field()}}
        <input type="hidden" name="id" value="{{$tweet->id}}">
        <tr>
            <th>title: </th>
            <td>
                <p>{{$tweet->title}}</p>
            </td>
        </tr>
        <tr>
            <th>body: </th>
            <td>
                <p>{{$tweet->body}}</p>
            </td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="delete"></td>
        </tr>
    </form>
</table>
@endsection