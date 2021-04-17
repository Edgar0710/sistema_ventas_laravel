<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function Cliente(){
        return $this->belongsTo("App\Models\Cliente");
    }
    public function Vendedores(){
        return $this->belongsTo("App\Models\Vendedor");
    }
    public function Producto(){
        return $this->belongsToMany("App\Models\Producto");
    }
    protected $fillable=[
        'fechapedido', 'estadopedido', 'fechaenvio', 'cliente_id', 'vendedor_id', 'created_at', 'updated_at'
        ];

}
