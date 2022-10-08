@extends('includes.navbar')

@section('content')
<div class="container mt-3">
    <p>Oferecido por:</p>
    <div class="img-container m-auto" style="max-width: 300px; max-height: 300px">
        <img src="{{ asset('imgs/' . $selectedImg) }}" alt="Imagem aleatória">
    </div>
</div>
<div class="container mt-3">
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