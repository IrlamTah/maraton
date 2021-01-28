@extends('layouts.app')

@section('title', 'Bienvenido a maratón')

@section('body-class', 'landing-page')


@section('content')

    <br>
    <br>
    <br>

    <h2 align="center">Asignaturas</h2>
<div class="container">

    <table class="table" align="center">
        <thead>
        <th>Nombre de la asignatura</th>
        <th>Numero de unidades</th>
        <th> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter">Nuevo</button> </th>
        </thead>
        @foreach($asignature as $asignature)
            <tr>
                <td>{{$asignature->nombreAsignatura}}</td>
                <td align="center">{{$asignature->numUnidades}}</td>
                <td> <a href="/unidades/{{$asignature->id}}"> <button type="button" class="btn btn-warning">Unidades</button> </a></td>
                <td>  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalCenterEdit" data-id="{{ $asignature->id }}">Editar</button> </td>
                <td>
                    <form action="{{url('/asignaturas/'.$asignature->id) }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </div>
    </table>
</div>

    <!-- Modal -->
    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Asignatura</h5>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="POST" action="/asignaturas">
                        @csrf
                        <div class="form-group">
                            <label for="">Asignatura</label>
                                <label for="nombreAsignatura" >{{'Nombre de la asignatura'}}</label>
                                <input class="form-control" type="text" name="nombreAsignatura" id="nombreAsignatura" value="" placeholder="Nombre de la asignatura" required autocomplete="off">

                                <label for="numUnidades">{{'Numero de unidades'}}</label>
                                <input class="form-control" type="number" min="1" step="1" name="numUnidades" id="numUnidades" value="" placeholder="Numero de unidades" required >
                                <br>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <div class="modal fade" id="ModalCenterEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Asignatura</h5>
                </div>
                <div class="modal-body">
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
