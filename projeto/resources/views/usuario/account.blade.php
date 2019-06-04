@extends('adminlte::page')

@section('title', 'Atualizar Conta')

@section('content_header')
<h1>Atualizar Usuario</h1>
    <ol class="breadcrumb">
        <li>
        <a href=""> Painel de Controle</a>

        </li>
       
        <li>
        <a href=""> Atualizar meus dados </a>

        </li>
    </ol>
@stop

@section('content')
<div class='box'>
        <div class='box-header'>
               <h3>Atualizar Meus Dados</h3>

        </div>
        <div class='box-body'>
                @include('recursos.alerts')
            <form class="" method="post" action="{{route('usuario.updateAccount')}}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <input type="text" class="form-control" value="{{$usuario->name}}" placeholder="Nome" class="form-control" name="nome" required/>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control"  value="{{$usuario->email}}" placeholder="Email" class="form-control" name="email" required/>
                </div>
                 <div class="form-group">
                     <input type="password" class="form-control"   placeholder="Senha" class="form-control" name="senha" required/>
                </div>
               
                
                <div class="form-group">
                    <button class="btn btn-success" type="submit" >Atualizar</button>
                    <a href="{{route('home')}}"><button type="button"  class="btn btn-warning">Voltar</button>    </a>

                </div>
            </form>
        </div>
    
    </div>
@stop