<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\User;
use App\Http\Controllers\OrdenesTrabajoController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\PresupuestosController;
use App\Http\Controllers\EventosController;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Para pasar datos a todas las vistas
//        view()->composer('*', function ($view)
//        {
//            $view->with('cartItem', $cart );
//
//        });
        View::composer('*', function($view)
        {
            $hoy=Carbon::now();
            $ayer=$hoy->subMonth(12);
            $currante = Auth::id();
            $usuarios = DB::table('USUARIOS')->where('clave', $currante)->first();
            $ord_trabajo = new OrdenesTrabajoController();
            $ord_trabajo->ordenesTrabajoCurrante($currante);
            $proyectos=new ProyectosController() ;
            $proyectos->proyectosTrabajador($currante);
            $total_presupuestos_pendientes = new PresupuestosController();
            $total_presupuestos_pendientes -> presupuestosPendientesTrabajador($currante);
            $total_presupuestos = count($total_presupuestos_pendientes->tpp);
            $lista_notas = new EventosController();
            $lista_notas->listarNotasActivas($currante);
            $notas=$lista_notas->quehacer;


            $view->with(compact('ayer','currante','usuarios','ord_trabajo','proyectos','total_presupuestos_pendientes', 'total_presupuestos','notas'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
