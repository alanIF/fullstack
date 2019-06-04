<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Imagem extends Model
{
    protected $fillable = [
        'titulo', 'arquivo', 'user_id'
    ];
    public function cadastrar( $titulo, $arquivo, $id_user){
        $nova_imagem= new Imagem();
        $nova_imagem->titulo=$titulo;
        $nova_imagem->arquivo=$arquivo;
        $nova_imagem->user_id=$id_user;
        

        $salvar=  $nova_imagem->save();
        if($salvar){
            return [
                'success'=> true,
                'messagem'=> 'Imagem cadastrada com sucesso!'
            ]; 
        }
        return [
                'success'=> false,
                'messagem'=> 'Erro na realização de seu cadastro!'
        ]; 
        
    }
    public function listar($id){
        $imagens= DB::table('imagems')->where("user_id", $id)->paginate(3);
        return $imagens;
    }
    public function getImagem($id){
          return Imagem::find($id);
    }
    public function excluir($id){
        $imagem=Imagem::find($id);
        $excluir= $imagem->delete();
        if($excluir){
            return [
                'success'=> true,
                'messagem'=> 'Imagem foi excluída com sucesso!'
            ]; 
        }
        return [
                'success'=> false,
                'messagem'=> 'Erro na remoção !'
        ]; 
    }
    
}
