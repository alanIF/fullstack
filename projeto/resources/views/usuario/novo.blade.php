@extends('adminlte::page')

@section('title', 'Novo Usuario')

@section('content_header')
<h1>Nova Conta</h1>
    <ol class="breadcrumb">
        <li>
        <a href=""> Painel de Controle</a>

        </li>
       
        <li>
        <a href=""> Novo Usuário</a>

        </li>
    </ol>
@stop

@section('content')
<div class='box'>
        <div class='box-header'>
               <h3>Novo Usuário</h3>

        </div>
        <div class='box-body'>
                @include('recursos.alerts')
            <form class="" method="post" action="{{route('usuario.store')}}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nome" class="form-control" name="nome" required/>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" class="form-control" name="email" required/>
                </div>
                 <div class="form-group">
                     <input type="password" class="form-control" placeholder="Senha" class="form-control" name="senha" required/>
                </div>
                <div class="form-group">
                    <select class="form-control" name='tipo' required="">
                      <option value='A'>Administrador</option>
                      <option value='C'>Cliente</option>
                     
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" >Cadastrar</button>
                    <a href="{{route('home')}}"><button type="button"  class="btn btn-warning">Voltar</button>    </a>

                </div>
            </form>
        </div>
    
    </div>
@stop