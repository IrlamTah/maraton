@extends('layouts.app')

@section('title', 'Bienvenido a maratón')

@section('body-class', 'landing-page')

@section('styles')
<style type="text/css">
            .team .row .col-md-4
            {
                margin-bottom: 3em;
            }
            .row {
           display: flex;
          display: -webkit-flex;
          flex-wrap: wrap;
        }
</style>

<link rel="stylesheet" type="text/css" href="css/typeahead.css">

@endsection

@section('content')

<div class="header" {{-- style="background-image: url({{ asset('/img/instrucciones2.png')}});" --}}>


    <div class="container2">
        <div class="row">
            <div class="col-md-8">
                <h1>Instrucciones para el/la profesor </h1>
                <h4>Bienvenido/a profesor (a) al juego de maratón de conocimientos. Para iniciar, deberá preparar las preguntas para colocar en cada uno de los apartados correspondientes.
                Asimismo, es importante colocar el número de opciones de respuesta solicitados y seleccionar la correcta.
                Es necesario incluir una breve retroalimentación a cada una de las preguntas, puesto que aparecerá cuando el estudiante se haya equivocado. Lo anterior, permitirá que el proceso de enseñanza-aprendizaje se desarrolle de manera pertinente y adecuada.

                </h4>
                <a href="{{ url('/asignaturas') }}" class="btn btn-danger btn-lg">
                    <i> Formularios</i>
                </a>
                <a href="{{ url('/') }}" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i>
                </a>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>

    <script>
        $(function(){
            var products = new Bloodhound({
              datumTokenizer: Bloodhound.tokenizers.whitespace,
              queryTokenizer: Bloodhound.tokenizers.whitespace,
              prefetch: '{{ url("products/json")}}'
            });

            //inicializamos typeahead sobre el input de búsqueda
            $('#search').typeahead({
                hint: true,
                hightlight: true, //resultados en negrita
                minLenght: 1 //mostrar resultados a partir de un caracter
            }, {
                name: 'products',
                source: products

            })
        });
    </script>
@endsection
