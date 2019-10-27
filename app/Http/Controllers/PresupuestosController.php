<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PresupuestosController extends Controller
{
    //
    public function presupuestosPendientesTrabajador($currante)
    {

        $total_presupuestos_pendientes = DB::table('PRESUP_TOTAL')
            ->where('clestadopresu', '<=', 1)
            ->where('clquiencrea', '=', $currante)
//          ->whereDate('fecha_pres', '>=',$desde->format('Y-m-d'))
            ->get();
        $this->tpp = $total_presupuestos_pendientes;
    }
    public function presupuestosActivos()
    {
        $presupuestos_activos = DB::table('PRESUP_TOTAL')
            ->where('clestadopresu','<=', 1)
            ->get();
        $this->presu_activos=$presupuestos_activos;
    }

}
