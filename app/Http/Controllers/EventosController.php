<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventosController extends Controller
{
    public function listarNotasActivas($currante)
    {

        $total_notas_activas = DB::table('QueHacer')
            ->where('Estado', '<>', 0)
            ->where('Tipo', '=', 1)
            ->where('idUser', '=', $currante)
//          ->whereDate('fecha_pres', '>=',$desde->format('Y-m-d'))
            ->get();
        $this->quehacer = $total_notas_activas;
    }
    public function listarEventosActivos()
    {
        $eventos_activos = DB::table('QueHacer')
            ->where('Estado', '<>', 0)
            ->where('Tipo', '=', 2)
            ->get();
        $this->eventos_activos=$eventos_activos;
    }
    public function eliminar($id){

        $notaEliminar = DB::table('QueHacer')->where('id', $id)->delete();

        $this->notaEliminar=$notaEliminar;
        return back();
    }
    public function actualizar($id){

        $notaActualizada = DB::table('QueHacer')
            ->where('id', $id)
            ->update(['Estado' => 0]);
        $this->notaActualizada=$notaActualizada;
        return back();
    }
    public function crearNota(Request $request){
        $request->all();
        $notaNueva = DB::insert
        ('insert into QueHacer (Tipo,Descripcion,Estado,idUser) values (?, ?, ?, ?)',
            [$request->Tipo,$request->Descripcion, $request->Estado, $request->idUser]
        );

        $this->notaNueva=$notaNueva;
        return back();

    }

}
