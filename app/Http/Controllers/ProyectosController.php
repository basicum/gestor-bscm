<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProyectosController extends Controller
{
    //

    public function proyectosTrabajador($currante){
        $proyectos = DB::table('PROYECT_TOTAL')
        ->where('clquienadmin','=', $currante)
        ->whereNotIn('clestadoproyec', [2, 4, 9])
        ->orderBy('fecharegis', 'desc')
        ->get();
        $this->proyectos=$proyectos;
    }
    public function totalProyectos()
    {
        $total_proyectos = DB::table('PROYECT_TOTAL')->count();
        $this->total=$total_proyectos;

    }
}
