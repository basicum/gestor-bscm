<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TercerosController extends Controller
{
    //
    public function todosTerceros()
    {
        $terceros = DB::table('TERCEROS')
            ->orderBy('dmacreacion', 'desc')
            ->get();

        $this->terceros = $terceros;

        return view('terceros', compact('terceros'));
    }


    public function clientesTotal($i){

        $clientes = DB::table('TERCEROS')
            ->where('clterceros','=', $i)
            ->orderBy('dmacreacion', 'desc')
            ->get();

        $this->clientes = $clientes;
    }
    public function clientesUser($currante){

        $clientes_user = DB::table('TERCEROS')
            ->where('cladministrador','=', $currante)
            ->where('clterceros','=', 1)
            ->orderBy('dmacreacion', 'desc')
            ->get();


        $this->misclientes = $clientes_user;
    }
}
