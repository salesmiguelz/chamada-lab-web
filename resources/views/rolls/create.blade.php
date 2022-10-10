@extends('includes.navbar')

@section('content')
<div class="container mt-3">
    <form method="POST" action="rolls/store" class="col-4">
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        @foreach($students as $student)

        <div class="form-group">
            <p>{{$student->name}}</p>
            <div class="custom-control custom-radio">
                <input type="radio" name="attendance" id="presente" class="custom-control-input" value="1">
                <label class="custom-control-label" for="customRadio1">Presente</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" name="attendance" id="ausente" class="custom-control-input" value="0">
                <label class="custom-control-label" for="customRadio2">Ausente</label>
            </div>
        </div>
        @endforeach

    </form>
    <button class="btn btn-primary">Enviar</button>
</div>


@endsection