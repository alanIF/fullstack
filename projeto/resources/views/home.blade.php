@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @include('recursos.alerts')
    @include('recursos.scripts')
    @if($administrador)
        <div class='box'>
        <div class='box-header'>
               <h3>Lista de Usuarios: Clientes e Administradores</h3>

        </div>
        <div class='box-body'>
            
            <div class="table-responsive">

            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Tipo</th>
                       
                         <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $u)
                    <tr>
                        <td>{{$u->id}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->password}}</td>
                        <td>{{$u->type($u->tipo)}} </td>
                        <td><a href="{{route('usuario.editar', ['id'=>$u->id])}}"><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick="return confirmar();" href="{{route('usuario.excluir', ['id'=>$u->id])}}"><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5"> <a href="{{route('usuario.novo')}}"><i class="fa fa-plus-square" aria-hidden="true"></i></a></td>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
    
    </div>
    @else
        <div class='box'>
        <div class='box-header'>
               <h3>Minha Galeria</h3>

        </div>
        <div class='box-body'>
                                                                          

                    @forelse($imagens as $i)
                    <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                <img src="{{url("storage/users/".$i->arquivo)}}"  width="100%" height="100%"  alt="{{$i->titulo}}" style="max-width: 100px;">
                <div class="card-body">
                  <p class="card-text">{{$i->titulo}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-default"> <a onclick="return confirmar();" href="{{route('imagem.excluir', ['id'=>$i->id])}}"><i class='fa fa-trash-o' aria-hidden='true'></i></a></button>
                    </div>
                  </div>
                </div>
              </div>
                </div>
                    
                    @empty
                    @endforelse
                    <br/>
                    <div  class="col-md-12">
                                                  {!! $imagens->links() !!}

                        <hr/>   
              <a href="{{route('imagem.novo')}}"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
                    </div>     
       

        </div>

    </div>
    @endif    
@stop