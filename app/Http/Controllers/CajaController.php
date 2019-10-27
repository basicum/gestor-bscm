<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CajaController extends Controller
{
private $ingresos ;
private $gastos;
    //
    public function cajaIngresosDesde($desde){
$caja_ingresos = DB::table('CAJA')
->select('tesoimp')
->where('tipgasto', '=',0)
->whereDate('tesodma', '>=',$desde->format('Y-m-d'))
->get();
        $ingresos = 0;
foreach ($caja_ingresos as $imp){
$ingresos+=$imp->tesoimp;
}

$this->totalingresos=$ingresos;
$this->ingresos=$caja_ingresos;

}

    public function cajaGastosDesde($desde){
        $caja_gastos = DB::table('CAJA')
            ->select('tesoimp')
            ->where('tipgasto', '<>',0)
            ->whereDate('tesodma', '>=',$desde->format('Y-m-d'))
            ->get();
        $gastos = 0;
        foreach ($caja_gastos as $imp){
            $gastos+=$imp->tesoimp;
        }

        $this->totalgastos=$gastos;
        $this->gastos=$caja_gastos;

    }
}
