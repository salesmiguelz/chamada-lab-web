@extends('includes.navbar')

@section('content')
<div class="container mt-3">
    <table class="table">
        <thead>
            <a class="btn btn-primary mb-2" href="/rolls/create">
                Criar
            </a>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Data</th>
                <th scope="col">Presenças</th>
                <th scope="col">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($lessons as $lesson)
            <tr>
                <th scope=" row">{{$lesson->id}}</th>
                <td width="30%">{{Carbon\Carbon::parse($lesson->date)->format('d/m/y') }}</td>
                <td width="30%">{{$lesson->attendances }}</td>
                <td width="30%">
                    <a class="btn btn-success" href="rolls/{{$lesson->id}}">
                        Ver
                    </a>
                    <a class="btn btn-info" href="{{route('rolls.edit', $lesson->id)}}">
                        Editar
                    </a>
                    <form method="post" action="{{route('rolls.destroy', $lesson->id)}}" style="display: inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">
                            Deletar
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection