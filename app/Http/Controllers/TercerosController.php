<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

    public function actualizarTercero(Request $request,$id){


        $terceroActualizada = DB::table('TERCEROS')
            ->where('id', $id)
            ->update([
                        'abrevi'=>$request->abrevi,
                        'clcaptacion'=>$request->clcaptacion,
                        'clactividad'=>$request->clactividad,
                        'cladministrador'=>$request->cladministrador,
                        'razonsocial'=>$request->razonsocial,
                        'alaatencion'=>$request->alaatencion,
                        'direccion'=>$request->direccion,
                        'codpostal'=>$request->codpostal,
                        'poblacion'=>$request->poblacion,
                        'provincia'=>$request->provincia,
                        'pais'=>$request->pais,
                        'ctabanco'=>$request->ctabanco,
                        'cif'=>$request->cif,
                        'contacto'=>$request->contacto,
                        'email'=>$request->email,
                        'web'=>$request->web,
                        'telefonofijo'=>$request->telefonofijo,
                        'telefonomovil'=>$request->telefonomovil,
                        'clformapago'=>$request->clformapago,
                        'estado'=>$request->estado,
                        'observaciones'=>$request->observaciones,
                        'dmacreacion'=>date('Y-m-d', strtotime($request->dmacreacion)),
                        'cliva'=>$request->cliva,
                        'saldoterce'=>$request->saldoterce

            ]);
        $this-> terceroActualizada= $terceroActualizada;
        return back()->with('mensaje', 'Tercero Actualizado!');
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
