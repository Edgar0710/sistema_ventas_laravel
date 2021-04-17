@extends('layout.layout')
@section("body")

<div class="d-flex justify-content-end">
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInsert">
    Añadir cliente
</button>
</div>
<div class="table-responsive mt-2">
    <table class="table" id="tb-clientes">
      <thead>
        <tr>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Opciones</th>
        </tr>
      </thead>
@foreach ($clientes as $cliente )
<tr>
    <td>{{$cliente->nombre}}</td>
    <td>{{$cliente->primer_apellido}}</td>
    <td>{{$cliente->segundo_apellido}}</td>
    <td class="d-flex justify-content-evenly">
        <form method="POST" action="{{ url("clientes/{$cliente->id}") }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger mx-1">Eliminar</button>
      </form>
      <button type="button" class="btn btn-sm btn-success btn-update mx-1" data-object='@json($cliente)' data-toggle="modal" data-target="#modalUpdate">
        Actualizar
    </button>
    <a class="btn btn-primary btn-sm mx-1" href="{{ url("pedidos/{$cliente->id}") }}"> ver pedidos</a>
    </td>
</tr>

@endforeach
    </table>
  </div>
<div class="modal" id="modalInsert">
    <form action="{{ route('clientes.post') }}" method="post" enctype="multipart/form">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crear cliente</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                <label for="nombre">Nombre cliente:</label>
                <input type="text" class="form-control" placeholder="Edgar" id="nombre" name="nombre" required>
                <label for="primer_apellido"> Apellido Paterno:</label>
                <input type="text" class="form-control" placeholder="Carrera"  id="primer_apellido" name="primer_apellido" required>
                <label for="segundo_apellido"> Apellido:</label>
                <input type="text" class="form-control" placeholder="Carrasco
                " id="segundo_apellido" name="segundo_apellido" required>


        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        @csrf
    </form>
      </div>
    </div>
  </div>

  <div class="modal" id="modalUpdate">
    <form action="{{ route('clientes.put') }}" method="post" id="form-update">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Actualizar cliente</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id" id="id">
            <label for="nombre">Nombre cliente:</label>
            <input type="text" class="form-control" placeholder="Coca Cola" id="nombre" name="nombre" required>
            <label for="primer_apellido"> Apellido Paterno:</label>
            <input type="text" class="form-control"  id="primer_apellido" name="primer_apellido" required>
            <label for="segundo_apellido"> Apellido:</label>
            <input type="text" class="form-control"  id="segundo_apellido" name="segundo_apellido" required>


            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Aceptar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        @csrf
        @method('PUT')
    </form>
      </div>
    </div>
  </div>

  @endsection
@section('Scripts')
<script src="{{asset('Scripts/Cliente/cliente-1.0.js')}}"></script>
@endsection
