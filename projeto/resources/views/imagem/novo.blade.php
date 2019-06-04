@extends('adminlte::page')

@section('title', 'Nova Imagem')

@section('content_header')
<h1>Nova Conta</h1>
    <ol class="breadcrumb">
        <li>
        <a href=""> Painel de Controle</a>

        </li>
       
        <li>
        <a href=""> Novo Imagem</a>

        </li>
    </ol>
@stop

@section('content')
<div class='box'>
        <div class='box-header'>
               <h3>Novo Imagem</h3>

        </div>
        <div class='box-body'>
                @include('recursos.alerts')
                <form class="" method="post" action="{{route('imagem.store')}}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Título" class="form-control" name="titulo" required/>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" placeholder="Imagem" class="form-control" name="imagem" required/>
                </div>
                 
                
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" >Adicionar a Galeria</button>
                    <a href="{{route('home')}}"><button type="button"  class="btn btn-warning">Voltar</button>    </a>

                </div>
            </form>
        </div>
    
    </div>
@stop