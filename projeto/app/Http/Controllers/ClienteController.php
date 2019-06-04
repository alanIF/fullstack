<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClienteController extends Controller
{
    public function novo(){
         if(auth()->user()->tipo== "A"){
            return view('usuario.novo');

         }
         return   redirect()->route('home')->with('danger', "Você não tem permissão para acessar essa página!");

    }
    public function account(){
        $usuario=auth()->user();
        return view('usuario.account',  compact('usuario'));
    }
    public function update_account(Request $request, User $u){
        $response=$u->atualizar_account($request->nome,$request->email,$request->senha,auth()->user()->id);
        if($response['success']){
            // rederecionar e enviar mensagem
          return   redirect()->route('home')->with('success', $response['messagem']);
        }
       return  redirect()->back()->with('error', $response['messagem']);
    }
    public function store(Request $request, User $u){
      
        $response=$u->cadastrar($request->nome,$request->email,$request->senha,$request->tipo);
        
        if($response['success']){
            // rederecionar e enviar mensagem
          return   redirect()->route('home')->with('success', $response['messagem']);
        }
       return  redirect()->back()->with('error', $response['messagem']);
    }
    
    public function update(Request $request, User $u){
        $response=$u->atualizar($request->nome,$request->email,$request->senha,$request->tipo, $request->id);
        if($response['success']){
            // rederecionar e enviar mensagem
          return   redirect()->route('home')->with('success', $response['messagem']);
        }
       return  redirect()->back()->with('error', $response['messagem']);
    }
    public function editar($id, User $u){
        $usuario= $u->getUsuario($id);
        if(!$usuario)
            return redirect()->back()->with('error', 'Usuario não encontrado');
       

        return view("usuario.editar", compact('usuario'));        
        
    }
    public function excluir($id, User $u){
        $usuario= $u->getUsuario($id);
        if(!$usuario)
            return redirect()->back()->with('error', 'Usuário não encontrado');
        
        
        $response=$u->excluir($id);
        if($response['success']){
            // rederecionar e enviar mensagem
          return   redirect()->route('home')->with('success', $response['messagem']);
        }
       return  redirect()->back()->with('error', $response['messagem']);
        
    }
}
