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
                <th scope="col">Frequência</th>
                <th scope="col">Situação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->presences}}</td>
                <td>{{$student->absences}}</td>
                <td>{{$student->frequency}}%</td>
                <td>{{$student->frequency > 75 ? 'Aprovado' : 'Reprovado por RI'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection