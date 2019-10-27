<?php


namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrdenesTrabajoController extends Controller
{
    public function totalOrdTrabajo(){
        $total_ord_trabajo = DB::table('ORD_TRABAJO')
            ->count();
        $this->total_trabajo=$total_ord_trabajo;

    }
    //

    public function ordenesTrabajoCurrante($currante){
     $ord_trabajo = DB::table('ORD_TRABAJO')
            ->join('TERCEROS', 'ORD_TRABAJO.idcliente', '=', 'TERCEROS.id')
            ->where('ORD_TRABAJO.clrealizacion','=', $currante)
            ->where('ORD_TRABAJO.estado', '<', 2)
//            ->whereDate('ORD_TRABAJO.desde', '<=',$hoy)
            ->get();
        $this->ord_trabajo=$ord_trabajo;

    }
}