<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class LoginController extends Controller
{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
 public function index(){

    return view('Login.Login',['mensaje'=>null]);
 }   
 public function Store(Request $request){

    $user = Vendedor::Login($request->email,$request->pwd);
   if(!$user){
    return view('Login.Login',['mensaje'=>'usuario o contraseña incorrecta.','user',$user]);
   }
   session(['user'=>$user]);
   return redirect('/productos');
 }
 public function Logout() {
     session()->flush();
     return redirect('/');
 }   
}
