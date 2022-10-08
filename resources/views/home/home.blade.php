@extends('includes.navbar')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Presenças</th>
                <th scope="col">Faltas</th>
                <th scope="col">Situação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Aprovado</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>Aprovado</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Aprovado</td>
            </tr>
        </tbody>
    </table>
</div>


@endsection