@extends('layouts.app')

@section('content')
@php
    $tip_terceros = array("1"=> "Cliente","2" => "Proveedor","3" => "Tesorería","4" => "Organismos","5" => "Subcontrata","6" => "Agente","7" => "Mediador");

    $tip_captacion = array("1"=> "Marketing","2" => "Agente","3" => "Clientes","4" => "Mailing","5" => "Web","6" => "Publicidad","7" => "Relaciones","8"=>"Otros","9"=>"Campaña BSCM");

    $tip_actividad = array("1"=> "Tienda OnLine","2" => "Músicos","3" => "Corporativa","4" => "Eventos","5" => "Varios","6" => "Landing Page","7" => "Blog WP","8"=>"Portal");

    $tip_formapago = array("1" => "Cheque","2" => "Abono en Cuenta","3" => "Paypal","4" => "Pago Domiciliado","5" => "Efectivo","6" => "TPV Online");

    $tip_presupago = array("0"=> "Único","1" => "Mensual","2" => "Bimensual","3" => "Trimestal");

    $tip_presuesta = array("0"=>"Pendiente","1" => "Enviado","2" => "Aceptado","3" => "Rechazado","9"=>"Anulado");

    $tip_admin = array("1"=> "Usuario de Pruebas","2"=> "Al","3" => "Fer","4" => "Rob");
$tip_iva =array("0"=>"NO", "1"=>"SI");
@endphp
<div class="main-panel">
<div class="content-wrapper">
<div class="row">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h3 class="form-section">Datos del Tercero</h3>

                    <!-- Empieza el Formulario para recoger datos-->
                    @foreach ($terceroSeleccionado as $tercero)
                    <form class="form-sample" name="creapresu" method="POST" action="editar_tercero.php"><!--formulario con el método POST-->
                        <p class="card-description">El tercero que vas a editar es para <b> {{utf8_decode($tercero->abrevi)}} </b></p>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><font style=color:#757575;>Nombre</font></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="abrevi" value="{{utf8_decode($tercero->abrevi)}}">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><font style=color:#757575;>Contacto</font></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="contacto" class="form-control" value="{{utf8_decode($tercero->contacto)}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>A la Atención de</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="alaatencion" class="form-control" value="{{utf8_decode($tercero->alaatencion)}}">
                                    </div>
                                </div>
                                </div>


                                <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Email</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="email" class="form-control" value="{{utf8_decode($tercero->email)}}">
                                    </div>
                                </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Web</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="web" class="form-control" value="{{utf8_decode($tercero->web)}}">
                                    </div>
                                </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Teléfono Fijo</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="telefonofijo" class="form-control" value="{{utf8_decode($tercero->telefonofijo)}}">
                                    </div>
                                </div>
                                </div>
                                </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Teléfono Móvil</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="telefonomovil" class="form-control" value="{{utf8_decode($tercero->telefonomovil)}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Cuenta del Banco</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="ctabanco" class="form-control" value="{{utf8_decode($tercero->ctabanco)}}">
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-6">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Razón Social</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="razonsocial" class="form-control" value="{{utf8_decode($tercero->razonsocial)}}">
                                    </div>
                                </div>
                                    </div>

                                    <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Identificación Fiscal (NIF, CIF)</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="cif" class="form-control" value="{{utf8_decode($tercero->cif)}}">
                                    </div>
                                </div></div></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Dirección</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="direccion" class="form-control" value="{{utf8_decode($tercero->direccion)}}">
                                    </div>
                                </div></div>

                                <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Código Postal</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="codpostal" class="form-control" value="{{utf8_decode($tercero->codpostal)}}">
                                    </div>
                                </div></div></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Población</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="poblacion" class="form-control" value="{{utf8_decode($tercero->poblacion)}}">
                                    </div>
                                </div></div>

                                <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Provincia</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="provincia" class="form-control" value="{{utf8_decode($tercero->provincia)}}">
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>País</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="pais" class="form-control" value="{{utf8_decode($tercero->pais)}}">
                                    </div>
                                </div>
                                </div>

            <div class="col-md-6">


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><font style=color:#757575;>Administrador</font></label>
                                    <div class="col-sm-9">


                                        <select class="form-control" name="cladministrador" data-placehosder="Elegir encargado del proyecto" tabindex="1">
                                            <option value="{{utf8_decode($tercero->cladministrador)}}">
                                                
                                                @foreach($tip_admin  as $key => $value)
                                                   @if($key==$tercero->cladministrador)
                                                    {{utf8_decode($value)}}
                                                @endif
                                                @endforeach
                                            </option>

                                            @foreach($tip_admin as $key => $value)
                                                <option value="{{utf8_decode($key)}}">{{utf8_decode($value)}}</option>
                                            @endforeach;

                                        </select>




                                        <span class="help-block"><font style=color:#757575;>Encargado del Tercero.</font></span>
                                    </div>
                                </div>

                        </div>
          </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><font style=color:#757575;>Captación</font></label>
                                    <div class="col-sm-9">


                                        <select class="form-control" name="clcaptacion" data-placehosder="Forma en la que se ha captado" tabindex="1">
                                            <option value="{{utf8_decode($tercero->clcaptacion)}}">
                                                @foreach($tip_captacion  as $key => $value)
                                                    @if($key==$tercero->clcaptacion)
                                                    {{utf8_decode($value)}}
                                                @endif
                                                @endforeach
                                            </option>

                                            @foreach($tip_captacion  as $key => $value)
                                                <option value="{{utf8_decode($key)}}">{{utf8_decode($value)}}</option>
                                            @endforeach

                                        </select>




                                        <span class="help-block"><font style=color:#757575;>Cómo ha sido captado.</font></span>
                                    </div>
                                </div>
                            </div>

                    <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Fecha Aceptación</font></label>
                                    <div class="col-sm-9">
                                        <div id="datepicker-popup" class="input-group date datepicker">
                                            <input name="dmacreacion" type="text" class="form-control" value="{{utf8_decode(date('d/m/Y', strtotime($tercero->dmacreacion)))}}">
                                            <span class="input-group-addon input-group-append border-left">
                          <span class="ti-calendar input-group-text"></span>
                        </span>
                                         </div>
                                    </div>
                                 </div>

                            <!--/span-->
                    </div></div>
                        <div class="row">
                    <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><font style=color:#757575;>Forma de Pago</font></label>
                                    <div class="col-sm-9">

                                        <select class="form-control chosen_category" name="clformapago" id="clpago"  data-placeholder="Elegir Forma de Pago" tabindex="1">
                                            <option value="{{utf8_decode($tercero->clformapago)}}">
                                                @foreach($tip_formapago  as $key => $value)
                                                    @if($key==$tercero->clformapago)
                                                    {{utf8_decode($value)}}
                                                @endif
                                                @endforeach</option>

                                            @foreach($tip_formapago  as $key => $value)
                                                <option value="{{utf8_decode($key)}}">{{utf8_decode($value)}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Estado</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="estado" value="1" @if ($tercero->estado==1)checked="checked" @endif>
                                                Activo
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="estado" value="0" @if ($tercero->estado==0)checked="checked" @endif>
                                               Inactivo
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                </div>
            </div>




                            </div>
        <div class="row">
            <div class="col-md-6">
                        <!--/row-->
                        <h3 class="form-section">Datos del Proyecto</h3>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><font style=color:#757575;>Actividad</font></label>
                                    <div class="col-sm-9">


                                        <select class="form-control" name="clactividad" data-placehosder="Elegir Actividad" tabindex="1">
                                            <option value="{{utf8_decode($tercero->clactividad)}}">
                                                @foreach($tip_actividad  as $key => $value)
                                                    @if($key==$tercero->clactividad)
                                                        {{utf8_decode($value)}}
                                                @endif
                                                @endforeach
                                            </option>
                                            @foreach($tip_actividad as $key => $value)
                                                <option value="{{utf8_decode($key)}}">{{utf8_decode($value)}}</option>
                                            @endforeach;

                                        </select>



                                    </div>
                                </div>
            </div>
            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><font style=color:#757575;>Descripción</font></label>
                                    <div class="col-sm-9">
                                        <textarea class="span12 form-control" name="observaciones" rows="6">{{utf8_decode($tercero->observaciones)}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><font style=color:#757575;>Cliente Lleva IVA</font></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="cliva" data-placehosder="Elegir IVA" tabindex="1">
                                            <option value="{{utf8_decode($tercero->cliva)}}">
                                               @foreach($tip_iva  as $key => $value)
                                                    @if($key==$tercero->cliva)
                                                    {{utf8_decode($value)}}
                                                @endif
                                                @endforeach
                                            </option>

                                            @foreach($tip_iva as $key => $value)
                                                <option value="{{utf8_decode($key)}}">{{utf8_decode($value)}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" ><font style=color:#757575;>Saldo</font></label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="saldoterce" class="form-control" value="{{utf8_decode($tercero->saldoterce)}}">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row


                        </div>
                        <!--/row-->
                        <div class="row-fluid" style="text-align: center">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary mr-2">Grabar</button>

                            <a href="#">   <button type="button" class="btn btn-light">Cancelar</button></a>
                        </div>

                        <input type="hidden" name="usuario" value="1">
                        <!--  <input type="hidden" name="estodopresup" value="0"> -->
                        <input type="hidden" name="clquiencrea" value="1">
                        <input type="hidden" name="clpdf" value="1">
                        <input type="hidden" name="usuarioregis" value="1">
                        <input type="hidden" name="idtercero" value="<? echo $id_tercero ?>">



                        <input type="hidden" name="fecharegis" value="<? echo $hoy ?>">
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>
@endforeach

@endsection