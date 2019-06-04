<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagem;
class ImagemController extends Controller
{
    public function novo(){
        return view('imagem.novo');
    }
    public function store(Request $request, Imagem $i){
        // tem arquivo e 
        

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            // criar o nome da imagem
            
            $numero= rand(1,9999);
            $name= kebab_case(auth()->user()->name)."".$numero;

            $extensao= $request->imagem->extension();

            $nome_file="{$name}.{$extensao}";
            $response=$i->cadastrar($request->titulo, $nome_file, auth()->user()->id);

            $upload= $request->imagem->storeAs('users',$nome_file);
            
            if($response['success']){
            // rederecionar e enviar mensagem
                return   redirect()->route('home')->with('success', $response['messagem']);
             }
            
        }
        return  redirect()->back()->with('error', "Error!");
    }
    public function excluir($id, Imagem $i){
        $imagem= $i->getImagem($id);
        if(!$imagem)
            return redirect()->back()->with('error', 'Imagem não encontrada');
        
        if($imagem->user_id != auth()->user()->id)
            return redirect()->back()->with('error', 'Você nao pode excluir uma imagem que nao é sua!');

        $response=$i->excluir($id);
        if($response['success']){
            // rederecionar e enviar mensagem
          return   redirect()->route('home')->with('success', $response['messagem']);
        }
       return  redirect()->back()->with('error', $response['messagem']);
        
    }
}
