<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    public function Pedido(){
        return $this->hasOne("App\Models\Pedido");
    }
    public function Pedidos(){
        return $this->hasMany("App\Models\Pedido");
    }

    public  static function Login($email,$password){
      return Vendedor::where("usuario","=",$email)->where("password","=",$password)->first();
    }
}
