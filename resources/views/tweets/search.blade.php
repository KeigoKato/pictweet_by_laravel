@extends("layouts.master")

@section("title", "index")

@include("layouts.header")
@include("layouts.footer")

<!-- メインの部分を以下に記述する。 -->
@section("container")
<table>
    <form action="search" method="get">
        <input type="text" name="keyword">
        <input type="submit" value="search">
        <tr>
            <th>id: </th>
            <th>title: </th>
            <th>body: </th>
        </tr>
        @foreach($results as $result)
        <tr>
            <td>{{$result->id}}</td>
            <td>{{$result->title}}</td>
            <td>{{$result->body}}</td>
        </tr>
        @endforeach
    </form>
</table>
@endsection