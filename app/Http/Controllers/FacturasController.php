<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FacturasController extends Controller
{
    public function todasFacturas(){

        $facturas = DB::table('FactCLTE_Tot')

            ->join('TERCEROS as t', 'FactCLTE_Tot.idcliente', '=', 't.id')
            ->select('t.id as idTercero', 'FactCLTE_Tot.id as idFactura', 'FactCLTE_Tot.*','t.*')
            ->orderBy('facdma', 'desc')
            ->get();
        $this->facTotal = $facturas;
        return view('facturas_clientes', compact('facturas'));
    }

    //
    public function facturasDesde($desde){

        $facturas = DB::table('FactCLTE_Tot')
            ->join('TERCEROS', 'FactCLTE_Tot.idcliente', '=', 'TERCEROS.id')
            ->whereDate('facdma', '>=',$desde->format('Y-m-d'))
//            ->whereBetween('facdma', [$ayer->format('Y-m-d'), $hoy->format('Y-m-d')])
            ->orderBy('facdma', 'desc')
            ->get();
        $this->facDesde = $facturas;
    }

}
