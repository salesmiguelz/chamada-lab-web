@extends('includes.navbar')

@section('content')
<div class="container mt-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Aluno</th>
                <th scope="col">Situação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <th scope=" row">{{$attendance->id}}</th>
                <td>{{$attendance->student[0]->name}}</td>
                <td>{{$attendance->attendance ? "Presente" : "Ausente"}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection