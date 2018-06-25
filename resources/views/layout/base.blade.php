<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ url('css/custom.css')}}">
  <link rel="stylesheet" href="{{ url('css/fontawesome-all.min.css')}}">
  <script src="{{ url('js/jquery-2.1.4.min.js') }}"></script>
  <script src="{{ url('js/bootstrap.min.js') }}"></script>


    <title>Tarefas</title>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-light bg-light" style="padding-bottom: 10px;">
            <span class="navbar-brand mb-0 h1">TaskList de Tarefas</span>
        </nav>
        <div id="content">
            @yield('content')
        </div>
    </div>
  </body>
</html>
