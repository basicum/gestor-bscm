<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FacturasController extends Controller
{
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
