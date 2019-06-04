<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Crypt;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function listar(){
        $usuarios= User::all();
        return $usuarios;
    }
    public function type($type=null){
        $tipos=[
            "A"=> "Administrador",
            "C"=> "Cliente",
        ];
        if(!$type){
            return $types;
        }
       
        return $tipos[$type];
    }
    public function getUsuario($id){
              return User::find($id);
    }
     public function excluir($id){
        $usuario=User::find($id);
        $excluir= $usuario->delete();
        if($excluir){
            return [
                'success'=> true,
                'messagem'=> 'Usuario foi excluído com sucesso!'
            ]; 
        }
        return [
                'success'=> false,
                'messagem'=> 'Erro na remoção !'
        ]; 
    }
    public function cadastrar( $nome, $email, $senha, $tipo){
        $nova_usuario= new User();
        $nova_usuario->name=$nome;
        $nova_usuario->email=$email;
        $nova_usuario->password= bcrypt($senha);
        $nova_usuario->tipo=$tipo;

        $salvar= $nova_usuario->save();
        if($salvar){
            return [
                'success'=> true,
                'messagem'=> 'Usuario cadastrado com sucesso!'
            ]; 
        }
        return [
                'success'=> false,
                'messagem'=> 'Erro na realização de seu cadastro!'
        ]; 
        
    }
     public function atualizar($nome, $email,$senha, $tipo, $id){
        $usuario= User::find($id);
        $usuario->name=$nome;
        $usuario->password= bcrypt($senha);
        $usuario->email=$email;
        $usuario->tipo=$tipo;

        $salvar= $usuario->save();
        if($salvar){
            return [
                'success'=> true,
                'messagem'=> 'Usuário foi atualizado com sucesso!'
            ]; 
        }
        return [
                'success'=> false,
                'messagem'=> 'Erro na atualização !'
        ]; 
        
    }
    public function atualizar_account($nome, $email,$senha, $id){
        $usuario= User::find($id);
        $usuario->name=$nome;
        $usuario->password= bcrypt($senha);
        $usuario->email=$email;
        $salvar= $usuario->save();
        if($salvar){
            return [
                'success'=> true,
                'messagem'=> 'Dados atualizados com sucesso!'
            ]; 
        }
        return [
                'success'=> false,
                'messagem'=> 'Erro na atualização !'
        ]; 
        
    }
    
        }
