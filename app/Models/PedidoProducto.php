<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{
    protected $table = 'pedido_producto';

    public function Productos(){
        return $this->hasMany("App\Models\Productos");
    }
    public function Pedidos(){
        return $this->BelongsToMany("App\Models\Pedidos");
    }
}
