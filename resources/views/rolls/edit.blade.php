@extends('includes.navbar')

@section('content')
<div class="container mt-3">
    <form method="POST" action="{{route('rolls.update', $lessonId)}}" class="col-4">
        @method("PUT")
        @csrf


        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @foreach($attendances as $attendance)
        <div class="form-group">
            <p>{{$attendance->student[0]->name}}</p>
            <div class="custom-control custom-radio">
                <input type="radio" name="a[{{$attendance->student[0]->id}}]" id="presente{{$attendance->student[0]->id}}" value="p" class="custom-control-input" {{$attendance->attendance ? 'checked' : ''}}>
                <label class="custom-control-label" for="presente{{$attendance->student[0]->id}}">Presente</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" name="a[{{$attendance->student[0]->id}}]" id="ausente{{$attendance->student[0]->id}}" value="a" class="custom-control-input" {{!$attendance->attendance ? 'checked' : ''}}>
                <label class="custom-control-label" for="ausente{{$attendance->student[0]->id}}">Ausente</label>
            </div>

            @endforeach
            <button class="btn btn-primary mt-4">Enviar</button>
    </form>

</div>


@endsection