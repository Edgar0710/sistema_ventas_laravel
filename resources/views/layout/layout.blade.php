<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ventas</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark  position-relative">
        <a class="navbar-brand" href="#">Ventas</a>
          <!-- Links -->
  <ul class="navbar-nav mx-auto ">
    <li class="nav-item">
      <a class="nav-link" href="{{route('productos.get')}}">Productos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('clientes.get')}}">Clientes</a>
    </li>
    
  </ul>
  <div class="dropdown ">
    <a class="btn dropdown-toggle float-right  text-white min-w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user " aria-hidden="true"></i></a>
    <div class="dropdown-menu dropdown-menu-right position-absolute ddl-menu">
        <label class="dropdown-item cl-gray md-text border-bottom">{{session('user')->nombre." ".session('user')->primer_apellido}}</label>
        <a class="dropdown-item cl-gray" href="{{route('login.logout')}}"><i class="fa fa-arrow-alt-circle-left"></i> Salir</a>
    </div>
</div>
      </nav>
<div class="container mt-4">
    @yield("body")
</div>
<footer>
    @yield("footer")
</footer>


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    @yield('Scripts')
</body>
</html>
