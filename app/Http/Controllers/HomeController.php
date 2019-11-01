<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
    public function index()
    {

        $hoy=Carbon::now();

//        $hoy=$hoy->format('Y-m-d');
//        $hasta=date('Y/m/d', strtotime("$hoy +30 day"));
//
        $ayer=$hoy->subMonth(12);
        /**
         * Recogemos el id del trabajador que se ha logado con email y contraseña
         */
        $currante = Auth::id();
//        buscamos en la tabla usuarios los datos como nombre y fotografía
        $usuarios = DB::table('USUARIOS')->where('clave', $currante)->first();
        /**
         * Controlador para OrdenesTrabajo
         */
        $ord_trabajo = new OrdenesTrabajoController();
        $ord_trabajo->ordenesTrabajoCurrante($currante);
        $total_trabajos = new OrdenesTrabajoController();
        $total_trabajos->totalOrdTrabajo();
        $total_trabajos=$total_trabajos->total_trabajo;
        /**
         * Controlador para Proyectos
         */
        $proyectos=new ProyectosController() ;
        $proyectos->proyectosTrabajador($currante);

        $total_proyectos = new ProyectosController();
        $total_proyectos->totalProyectos();

        /**
         * Controlador para Clientes
         */
        $clientes = new TercerosController();
        $clientes->clientesTotal(1);
        $clientes=count($clientes->clientes);

        $clientes_user = new TercerosController();
        $clientes_user->clientesUser($currante);
        /**
         * Controlador para Facturación
         */

        $facturas =  new FacturasController();
        $facturas->facturasDesde($ayer);
        /**
         * Controlador para Caja - Ingresos y Gastos
         */
        $caja_ingresos = new CajaController();
        $caja_ingresos->cajaIngresosDesde($ayer);
        $ingresos=$caja_ingresos->totalingresos;

        $caja_gastos = new CajaController();
        $caja_gastos->cajaGastosDesde($ayer);
        $gastos=$caja_gastos->totalgastos;

        /**
         * Contralador para Notas QueHacer y Eventos
         */
        $lista_notas = new EventosController();
        $lista_notas->listarNotasActivas($currante);
        $notas=$lista_notas->quehacer;

        /**
         * Controlador para presupuestos
         */

        $total_presupuestos_pendientes = new PresupuestosController();
        $total_presupuestos_pendientes -> presupuestosPendientesTrabajador($currante);
        $total_presupuestos = count($total_presupuestos_pendientes->tpp);


        $presupuestos_activos= new PresupuestosController();
        $presupuestos_activos->presupuestosActivos();
        $total_presupuestos_activos = count($presupuestos_activos->presu_activos);

        $presupuestos = ($total_presupuestos_activos<>0) ? $total_presupuestos / $total_presupuestos_activos * 100 : null;


        $ratio_proyectos = ($total_presupuestos) ? $total_presupuestos / $total_trabajos *100: null;
        $ratio_trabajos = ($ord_trabajo) ? count($ord_trabajo->ord_trabajo) / $total_trabajos *100: null;
        $ratio_clientes = ($clientes_user->misclientes) ? count($clientes_user->misclientes) / $clientes * 100: null;


        return view('home', compact(
            'ayer',
            'usuarios',
            'ord_trabajo',
            'proyectos',
            'clientes',
            'total_presupuestos_pendientes',
            'total_presupuestos_activos',
            'total_presupuestos',
            'gastos',
            'presupuestos',
            'total_proyectos',
            'ingresos',
            'total_trabajos',
            'facturas',
            'ratio_trabajos',
            'ratio_proyectos',
            'ratio_clientes',
            'notas'
        ));
    }
}
