@extends('layout.layout')
@section("body")

<div class="d-flex justify-content-start">
    <h4>Cliente: {{session('cliente')->nombre}}</h2>
</div>
<div class="d-flex justify-content-end">
<!-- Button to Open the Modal -->

<form method="POST" action="{{ route('pedidos.post') }}">
    @csrf
  <input type="hidden" name="id" value="{{$id}}"/>
    <button type="submit" class="btn btn-sm btn-primary mx-1"> Añadir pedido</button>
  </form>
</div>
<div class="table-responsive mt-2">

    <table class="table" id="tb-pedidos">
      <thead>
        <tr>
            <th>ID</th>
            <th>Estatus</th>
            <th>Fecha de Creación</th>
            <th>Fecha de Envio</th>
            <th>Opciones</th>
        </tr>
      </thead>
@foreach ($pedidos as $pedido )
<tr>
    <td>{{$pedido->id}}</td>
    <td>{{$pedido->estadopedido}}</td>
    <td>{{$pedido->fechapedido}}</td>
    <td>{{$pedido->fechaenvio}}</td>
    <td class="d-flex justify-content-evenly">
        <form method="POST" action="{{ url("pedidos/{$pedido->id}") }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger mx-1">Eliminar</button>
      </form>
      <form method="POST" action="{{ url("/pedidos/enviado/{$pedido->id}") }}">
        @csrf
        @method('Put')
        <button type="submit" class="btn btn-sm btn-success mx-1">Marcar Envio</button>
      </form>
      <a href="{{url("detallePedido/{$pedido->id}")}}" class="btn btn-sm btn-primary">Detalle</a>
    </td>
</tr>

@endforeach
    </table>
  </div>


  @endsection
@section('Scripts')
<script src="{{asset('Scripts/pedido/pedido-1.0.js')}}"></script>
@endsection
