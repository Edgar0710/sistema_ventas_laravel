<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
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
        'id', 'nombre', 'descripcion', 'precio', 'contenido','cantidad', 'created_at', 'updated_at'
        ];
}
