@extends('layouts.app')

@section('title', 'Bienvenido a maratón')

@section('body-class', 'landing-page')
@extends('layouts.app')

@section('content')

    <h2 align="center"> Asignaturas </h2>


    <form class="form-group" method="POST" action="{{ route('asignaturas.update', $asignature->id) }}">

        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="nombreAsignatura">Nombre de la asignatura</label>
            <input type="text" value="{{$asignature->nombreAsignatura}}" name="nombreAsignatura" id="nombreAsignatura" class="form-control" autocomplete="off">
            <label for="numUnidades">Numero de unidades</label>
            <input type="number" min="1" step="1" name="numUnidades" id="numUnidades" value="{{$asignature->numUnidades}}" class="form-control" autocomplete="off">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>

    </form>

@endsection
