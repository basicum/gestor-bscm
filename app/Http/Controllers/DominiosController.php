<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class DominiosController extends Controller
{
    //
    public function todosDominios()
    {
        $dominios = DB::table('DOMINIOS')
            ->join('TERCEROS', 'TERCEROS.id', '=', 'DOMINIOS.idcliente')
            ->orderBy('abrevi', 'asc')
            ->get();

        $this->dominios = $dominios;


        return view('dominios', compact('dominios'));
    }


}
