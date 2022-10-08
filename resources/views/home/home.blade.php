@extends('includes.navbar')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Presenças</th>
                <th scope="col">Faltas</th>
                <th scope="col">Situação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>0</td>
                <td>0</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection