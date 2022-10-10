@extends('includes.navbar')

@section('content')
<div class="container mt-3">
    <form method="POST" action="rolls/store" class="col-4">
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            @foreach($students as $student)
            <p>{{$student->name}}</p>
            <div class="custom-control custom-radio">
                <input type="radio" name="attendance{{$student->id}}" class="custom-control-input">
                <label class="custom-control-label" for="customRadio1">Presente</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" name="{{$student->id}}" class="custom-control-input">
                <label class="custom-control-label" for="customRadio2">Ausente</label>
            </div>
            @endforeach
        </div>
    </form>
    <button class="btn btn-primary">Enviar</button>
</div>


@endsection