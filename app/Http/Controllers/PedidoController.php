<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\PedidoProducto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        session(['cliente'=>Cliente::GetInfo($id)]);
        $pedidos=Pedido::all();
        return view("Pedidos.Pedidos",['pedidos'=>$pedidos,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = date('Y-m-d H:i');
        $pedido= new Pedido();
        $pedido->fechapedido=$now;
        $pedido->estadopedido='Pendiente';
        $pedido->cliente_id=$request->id;
        $pedido->fechaenvio=null;
        $pedido->vendedor_id=session('user')->id;
     $pedido->save();
     return redirect('/pedidos/'.session('cliente')->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pedido= Pedido::findOrFail($id);
        $Pedido->delete();
       return redirect('/pedidos/'.session('cliente')->id);
    }


    public function Enviado($id){
        $now = date('Y-m-d H:i');
        $pedido= Pedido::findOrFail($id);
        $pedido->fechaenvio=$now;
        $pedido->estadopedido='Enviado';
        $pedido->update();
        return redirect('/pedidos/'.session('cliente')->id);
    }


/**Detalle de pedido */
    public function DetallePedido($id){
        $pedido=Pedido::find($id);
        $productos=Producto::all();
        return view("Pedidos.detalle",['pedido'=>$pedido,'id'=>$id,"productos"=>$pedido->Producto,"allProductos"=>$productos]);
    }
    public function AddProduct(Request $request){
        $pedidoProducto = new PedidoProducto();

        $pedidoProducto->producto_id = $request->producto;
        $pedidoProducto->pedido_id = $request->pedido;
        $pedidoProducto->save();
        return redirect('/detallePedido/'.$request->pedido);
    }
    public function RemoveProducto(Request $request){
       PedidoProducto::where('pedido_id',"=",$request->pedido)->where('producto_id',"=",$request->producto)->delete();
       
        return redirect('/detallePedido/'.$request->pedido);
    }       

}
