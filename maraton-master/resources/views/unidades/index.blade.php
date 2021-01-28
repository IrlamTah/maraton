
@extends('layouts.app')
@section('content')

    <h2 align="center">{{$asignature->nombreAsignatura}}</h2>

    <table class="table" >
        <thead>
        <th>Unidad</th>
        <th>Nombre de la unidad</th>

        <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter" data-id="{{ $asignature->id }}">Nuevo</button>   </th>
        </thead>
        @foreach($find as $unidad)
            <tr>
                <td>{{$unidad->numUnidad}}</td>
                <td>{{$unidad->nombreUnidad}}</td>
                <td><a href="/preguntas/{{$unidad->id}}"> <button type="button" class="btn btn-warning">Preguntas</button> </a></td>
                <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalCenterEdit" data-id="{{ $unidad->id }}">Editar</button>
                <td>
                    <form action="{{url('/unidades/'.$unidad->id.'/'.$unidad->idAsignatura.'') }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

                    </form>
                </td>



            </tr>
        @endforeach
    </table>

    <!-- Modal -->
    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Unidad</h5>
                </div>
                <div class="modal-body">

                    <form class="form-group" action="{{url('/unidades/'.$asignature->id.'')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Unidades</label>
                        <label for="nombreUnidad">{{'Nombre de la unidad'}}</label>
                        <input class="form-control" type="text" name="nombreUnidad" id="nombreUnidad" value="" placeholder="Nombre de la unidad" required>

                        <label for="numUnidad">{{'Numero de unidad'}}</label>
                        <input class="form-control" type="number" min="1" step="1" name="numUnidad" id="numUnidad" value="" placeholder="Numero de unidades" required >

                        <label for="idAsignatura">{{'Id asignatura'}}</label>
                        <input class="form-control" type="number" min="1" step="1" name="idAsignatura" id="idAsignatura" value="{{$asignature->id}}" placeholder="idAsignatura" required readonly >


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>

                </div>
                        </div>
                </form>

            </div>
        </div>
    </div>
    </div>


    <!-- Modal Edit -->
    <div class="modal fade" id="ModalCenterEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Unidad</h5>
                </div>
                <div class="modal-body">
                    <h2 align="center"> Unidades </h2>
                    <form class="form-group" method="POST" action="{{ route('unidades.update', $unidad->id) }}">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                        <label for="nombreUnidad">{{'Nombre de la unidad'}}</label>
                        <input class="form-control" type="text" name="nombreUnidad" id="nombreUnidad" value="{{$unidad->nombreUnidad}}" placeholder="Nombre de la unidad" required>

                        <label for="numUnidad">{{'Numero de unidad'}}</label>
                        <input class="form-control" type="number" min="1" step="1" name="numUnidad" id="numUnidad" value="{{$unidad->numUnidad}}" placeholder="Numero de unidades" required >

                        <label for="idAsignatura">{{'Id asignatura'}}</label>
                        <input class="form-control" type="number" min="1" step="1" name="idAsignatura" id="idAsignatura" value="{{$unidad->idAsignatura}}" placeholder="idAsignatura" required >



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
                </form>
                </div>

            </div>
            </div>
        </div>


@endsection
