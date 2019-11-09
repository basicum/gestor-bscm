<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


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
    public function visualizaTercero($id){

        $terceroSeleccionado = DB::table('TERCEROS')
            ->where('id', $id)
            ->get();
        $this->terceroSeleccionado=$terceroSeleccionado;
        $terceroSeleccionado=$terceroSeleccionado;
        return view('modif_tercero', compact('terceroSeleccionado'));
    }
    public function actualizarTercero($id){

        $notaActualizada = DB::table('TERCEROS')
            ->where('id', $id)
            ->update(['Estado' => 0]);
        $this->terceroActualizada=$terceroActualizada;
        return back();
    }
    public function crearTercero(Request $request){
        $request->all();
        $notaNueva = DB::insert
        ('insert into QueHacer (Tipo,Descripcion,Estado,idUser) values (?, ?, ?, ?)',
            [$request->Tipo,$request->Descripcion, $request->Estado, $request->idUser]
        );

        $this->terceroNuevo=$terceroNuevo;
        return back();

    }
}
