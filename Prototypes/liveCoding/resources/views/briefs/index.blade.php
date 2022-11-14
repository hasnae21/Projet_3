@extends('welcome')
@section('content')
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>assign</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($briefs as $value)

            @endforeach
            <tr>
                <td>{{$value->name}}</td>
                <td><a href="{{route('assign.show', $value->id)}}">assign</a></td>
            </tr>
        </tbody>
    </table>
@endsection
