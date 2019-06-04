<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Imagem;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $u, Imagem $i)
    {
        $administrador=false;
        if(auth()->user()->tipo== "A"){
            $administrador=true;
        }
        $usuarios= $u->listar();
        $imagens= $i->listar(auth()->user()->id);
        return view('home',  compact('administrador','usuarios','imagens'));
    }
}
