@extends('includes.navbar')

@section('content')
<div class="container mt-3">
    <form method="POST" action="{{route('rolls.store')}}" class="col-4">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @csrf
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        @foreach($students as $student)

        <div class="form-group">
            <p>{{$student->name}}</p>
            <div class="custom-control custom-radio">
                <input type="radio" name="a[{{$student->id}}]" id="presente{{$student->id}}" class="custom-control-input" value="p">
                <label class="custom-control-label" for="presente{{$student->id}}">Presente</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" name="a[{{$student->id}}]" id="ausente{{$student->id}}" class="custom-control-input" value="a">
                <label class="custom-control-label" for="ausente{{$student->id}}">Ausente</label>
            </div>
        </div>
        @endforeach
        <button class="btn btn-primary mt-4">Enviar</button>

    </form>
</div>


@endsection