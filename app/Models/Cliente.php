<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function Pedido(){
        return $this->hasOne("App\Models\Pedido");
    }
    public function Pedidos(){
        return $this->hasMany("App\Models\Pedido");
    }
    public  static function GetInfo($id){
        return Cliente::find($id);
      }
    protected $fillable=[
        'id', 'nombre', 'primer_apellido', 'segundo_apellido', 'created_at', 'updated_at'
        ];
}
