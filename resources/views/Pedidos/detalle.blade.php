@extends('layout.layout')
@section("body")

<div class="d-flex justify-content-start">
    <button class="btn btn-link"  onClick="history.back()">Volver</button>
</div>
<div class="d-flex justify-content-end">
<!-- Button to Open the Modal -->
<form method="POST" action="{{ route('pedidos.addProduct') }}" class="form-inline">
    @csrf
    <input type="hidden" name="pedido" value="{{$id}}" >
    <label for="producto" class="mr-sm-2">Producto:</label>
    <select name="producto" id="producto"  class="form-control mb-2 mr-sm-2"  required>
    <option selected disabled>Seleccina un producto</option>
    @foreach ($allProductos as $producto )
    <option value="{{$producto->id}}">{{$producto->nombre}}</option>
    @endforeach
    </select>
    <button type="submit" class="btn btn-sm btn-primary mx-1 mb-2">Agregar</button>
  </form>
</div>
<div class="table-responsive mt-2">
    <table class="table" id="tb-productos">
      <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Contenido</th>
            <th>Precio</th>
            <th>Opciones</th>
        </tr>
      </thead>
@foreach ($productos as $producto )
<tr>
    <td>{{$producto->nombre}}</td>
    <td>{{$producto->descripcion}}</td>
    <td>{{$producto->contenido}}</td>
    <td>{{$producto->precio}}</td>
    <td class="d-flex justify-content-evenly">
        <form method="POST" action="{{ route('pedidos.removeProducto') }}">
            <input type="hidden" name="pedido" value="{{$id}}" >
            <input type="hidden" name="producto" value="{{$producto->id}}" >
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger mx-1">Eliminar</button>
      </form>
    </td>
</tr>

@endforeach
    </table>
  </div>
<div class="modal" id="modalInsert">
    <form action="{{ route('productos.post') }}" method="post" enctype="multipart/form">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crear producto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                <label for="nombre">nombre producto:</label>
                <input type="text" class="form-control" placeholder="Coca Cola" id="nombre" name="nombre">
                <label for="descripcion">descripción producto:</label>
                <textarea type="text" class="form-control"  id="descripcion" name="descripcion"></textarea>
                <label for="precio">precio producto:</label>
                <input type="number" class="form-control" placeholder="15"  id="precio" name="precio">
                <label for="Contenido">Contenido producto:</label>
                <input type="text" class="form-control" placeholder="" id="contenido" name="contenido"/>
                <label for="cantidad">Cantidad producto:</label>
                <input type="number" class="form-control" placeholder="15"  id="cantidad" name="cantidad">

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
    <form action="{{ route('productos.put') }}" method="post" id="form-update">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Actualizar producto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id" id="id">
                <label for="nombre">nombre producto:</label>
                <input type="text" class="form-control" placeholder="Coca Cola" id="nombre" name="nombre">
                <label for="descripcion">descripción producto:</label>
                <textarea type="text" class="form-control" placeholder="Coca Cola" id="descripcion" name="descripcion">
                </textarea>
                <label for="precio">precio producto:</label>
                <input type="number" class="form-control" placeholder="12.5"  id="precio" name="precio">
                <label for="Contenido">Contenido producto:</label>
                <input type="text" class="form-control" placeholder="" id="contenido" name="contenido"/>
                <label for="cantidad">Cantidad producto:</label>
                <input type="number" class="form-control" placeholder="15"  id="cantidad" name="cantidad">


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
<script>
var allProducts={!! json_encode($allProductos) !!};
</script>
<script src="{{asset('Scripts/Pedido/detallePedido-1.0.js')}}"></script>
@endsection
