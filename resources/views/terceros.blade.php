@extends('layouts.app')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">


                <div class="row">
                    <div class="col-12"><h2 style="float:left">Terceros</h2><button class="btn btn-warning rounded-0 text-white" style="float:right; margin-right:50%;">Añadir Nuevo</button>

                        <div class="table-responsive">
                            <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="order-listing" class="table dataTable table-striped table-borderless table-hover" role="grid" aria-describedby="order-listing_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 72px;"></th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" style="width: 100px;">Nombre</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased Price: activate to sort column ascending" style="width: 86px;">Estado</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 118px;">Teléfono</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 85px;">Actividad</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Ship to: activate to sort column ascending" style="width: 64px;">Tipo</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Base Price: activate to sort column ascending" style="width: 92px;">Administra</th>

                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($terceros as $tercero)
                                                <tr>
                                                    <td>
                                                        <button class="btn btn-outline-primary">Ver</button>
                                                    </td>
                                                    <td>{{utf8_decode($tercero->abrevi)}}</td>
                                                    <td>
                                                        @if($tercero->estado==1)

                                                            <label class="badge badge-info">Activo</label>
                                                        @else
                                                            <label class="badge badge-danger">Baja</label>
                                                        @endif
                                                    </td>
                                                    {{--<td>{{$tercero->poblacion}}</td>--}}
                                                    {{--<td>{{$tercero->email}}</td>--}}
                                                    <td>{{$tercero->telefonomovil}}</td>
                                                    <td>
                                                        @if($tercero->clactividad==1)
                                                            <label class="font-weight-medium text-success">Tienda Online</label>
                                                        @elseif($tercero->clactividad==3)
                                                            <label class="font-weight-medium text-warning">Corporativa</label>
                                                        @elseif($tercero->clactividad==6)
                                                            <label class="font-weight-medium text-info">PUBLICO</label>
                                                        @else
                                                            <label class="font-weight-medium text-danger">OTROS</label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($tercero->clterceros==1)
                                                            <label class="badge badge-success">CLIENTE</label>
                                                        @elseif($tercero->clterceros==2)
                                                            <label class="badge badge-warning">PROVEEDOR</label>
                                                        @elseif($tercero->clterceros==3)
                                                            <label class="badge badge-primary">TESORERIA</label>
                                                        @elseif($tercero->clterceros==4)
                                                            <label class="badge badge-outline-info">PUBLICO</label>
                                                            @else
                                                            <label class="badge badge-danger">OTROS</label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($tercero->cladministrador==3)

                                                            <label class="badge ">FER</label>
                                                        @elseif($tercero->cladministrador==2)
                                                            <label class="badge">ALBER</label>
                                                        @elseif($tercero->cladministrador==4)
                                                            <label class="badge">ROBER</label>
                                                        @endif


                                                    </td>

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