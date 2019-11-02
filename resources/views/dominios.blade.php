@extends('layouts.app')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">


                <div class="row">
                    <div class="col-12"><h2 style="float:left">Listado Dominios y Alojamientos</h2><button class="btn btn-warning rounded-0 text-white" style="float:right; margin-right:50%;">Añadir Nuevo</button>

                        <div class="table-responsive">
                            <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="order-listing" class="table dataTable table-striped table-borderless table-hover" role="grid" aria-describedby="order-listing_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 72px;"></th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" style="width: 100px;">Cliente</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased Price: activate to sort column ascending" style="width: 86px;">Dominio</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 118px;">Cobro</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 85px;">Caducidad<br>Dominio</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 85px;">Caducidad<br>Alojamiento</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Ship to: activate to sort column ascending" style="width: 64px;">Importe<br>Dominio</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Base Price: activate to sort column ascending" style="width: 92px;">Importe<br>Alojamiento</th>

                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($dominios as $dominio)
                                                <tr>
                                                    <td>
                                                        <button class="btn btn-outline-primary">Modificar</button>
                                                    </td>
                                                    <td>{{utf8_decode($dominio->abrevi)}}</td>
                                                    <td>{{$dominio->dominombre}}</td>
                                                    <td>
                                                        @if($dominio->secobra==1)

                                                            <label class="badge badge-info">SI</label>
                                                        @else
                                                            <label class="badge badge-danger">NO</label>
                                                        @endif
                                                    </td>

                                                    <td>{{date('d/m/Y', strtotime($dominio->domcaduci))}}</td>
                                                    <td>{{date('d/m/Y', strtotime($dominio->alojcaduci))}}</td>
                                                    <td>
                                                        @if($dominio->domprecio==0)
                                                            <label class="badge badge-danger"> {{$dominio->domprecio}}</label> €
                                                        @else
                                                            <label class="font-weight-medium text-success"> {{$dominio->domprecio}}</label> €
                                                            @endif
                                                    </td>
                                                    <td>
                                                        @if($dominio->alojprecio==0)
                                                            <label class="badge badge-danger">  {{$dominio->alojprecio}}</label> €
                                                        @else
                                                            <label class="font-weight-medium text-success">  {{$dominio->alojprecio}}</label> €
                                                        @endif


                                                    {{--<td>--}}
                                                        {{--@if($tercero->clterceros==1)--}}
                                                            {{--<label class="badge badge-success">CLIENTE</label>--}}
                                                        {{--@elseif($tercero->clterceros==2)--}}
                                                            {{--<label class="badge badge-warning">PROVEEDOR</label>--}}
                                                        {{--@elseif($tercero->clterceros==3)--}}
                                                            {{--<label class="badge badge-primary">TESORERIA</label>--}}
                                                        {{--@elseif($tercero->clterceros==4)--}}
                                                            {{--<label class="badge badge-outline-info">PUBLICO</label>--}}
                                                            {{--@else--}}
                                                            {{--<label class="badge badge-danger">OTROS</label>--}}
                                                        {{--@endif--}}
                                                    {{--</td>--}}


                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection