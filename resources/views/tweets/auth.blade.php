@extends("layouts.master")

@section("title", "auth")

@include("layouts.header")
@include("layouts.footer")

<!-- メインの部分を以下に記述する。 -->
@section("container")
<p>{{$message}}</p>
    <table>
        <form action="/tweets/auth" method="post">
            {{csrf_field()}}
            <tr>
                <th>name: </th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>mail: </th>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <th>pass: </th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <th>mail: </th>
                <td><input type="submit" value="send"></td>
            </tr>
        </form>
    </table>
@endsection