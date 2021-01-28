@extends('layouts.app')
@section('content')

    <h2 align="center">Asignatura: {{$asignature->nombreAsignatura}}</h2>
    <br>
    <h2 align="center">Unidad: {{$unidad->nombreUnidad}}</h2>
    <br>
    <h2 align="center">Pregunta: {{$pregunta->pregunta}}</h2>

    <table class="table" >
        <thead>
        <th>Respuesta</th>
        <th>Estado</th>
        <th>Unidad</th>

        <th> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter" data-id="{{$pregunta->id}}">Nuevo</button> </a> </th>
        </thead>
        @foreach($find as $respuesta)
            <tr>
                <td>{{$respuesta->respuesta}}</td>
                <td>{{$respuesta->resultado}}</td>
                <td>{{$respuesta->idPregunta}}</td>
                 <td>
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalCenterEdit" data-id="{{ $respuesta->id }}">Editar</button>
                <td>
                    <form action="{{url('/respuestas/'.$respuesta->id.'/'.$pregunta->id.'') }}" method="post">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Respuesta</h5>
                </div>
                <div class="modal-body">

                    <h2 align="center"> Respuesta </h2>


                    <form class="form-group" action="{{url('/preguntas/'.$unidad->id.'')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="pregunta">{{'Pregunta'}}</label>
                            <input class="form-control" type="text" name="pregunta" id="pregunta" value="" placeholder="Pregunta" required>

                            <label for="dificultad">{{'Dificultad'}}</label>
                            <select class="form-control"  name="dificultad" id="dificultad" required>
                                <option value="1">Facil</option>
                                <option value="2">Medio</option>
                                <option value="3">Dificil</option>
                            </select>


                            <label for="idUnidad">{{'Id Unidad'}}</label>
                            <input class="form-control" type="number" min="1" step="1" name="idUnidad" id="idUnidad" value="{{$unidad->id}}" required readonly >

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
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Pregunta</h5>
                </div>
                <div class="modal-body">
                    <h2 align="center"> Pregunta </h2>
                    <form class="form-group" action="{{route('preguntas.update',$pregunta->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">

                            <label for="pregunta">{{'Pregunta'}}</label>
                            <input class="form-control" type="text" name="pregunta" id="pregunta" value="{{$pregunta->pregunta}}" placeholder="Pregunta" required>

                            <label for="dificultad">{{'Dificultad'}}</label>
                            <select class="form-control"  name="dificultad" id="dificultad" value="{{$pregunta->dificultad}}" required>
                                <option value="1">Facil</option>
                                <option value="2">Medio</option>
                                <option value="3">Dificil</option>
                            </select>

                            <label for="idUnidad">{{'Id Unidad'}}</label>
                            <input class="form-control" type="number" min="1" step="1" name="idUnidad" id="idUnidad" value="{{$pregunta->idUnidad}}" required readonly >

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
