<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <title>@yield('title', 'Maratón')</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />


</head>
<body>
<br>
<br>
<br>
<br>
<h2 align="center"> Asignaturas </h2>

    <form class="form-group" action="{{url('/asignaturas')}}" method="post" class="text-white">
        {{csrf_field()}}
        <div class="form-group">
            <label for="nombreAsignatura" >{{'Nombre de la asignatura'}}</label>
            <input class="form-control" type="text" name="nombreAsignatura" id="nombreAsignatura" value="" placeholder="Nombre de la asignatura" required>

            <label for="numUnidades">{{'Numero de unidades'}}</label>
            <input class="form-control" type="number" min="1" step="1" name="numUnidades" id="numUnidades" value="" placeholder="Numero de unidades" required >
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>


</body>

</html>

