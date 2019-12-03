@extends('layouts.app')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">


                <div class="row">
                    <div class="col-12"><h2 style="float:left">Listado Facturas Emitidas</h2><button class="btn btn-warning rounded-0 text-white" style="float:right; margin-right:50%;">Generar Factura</button>

                        <div class="table-responsive">
                            <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="order-listing" class="table dataTable table-striped table-borderless table-hover" role="grid" aria-describedby="order-listing_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 72px;"></th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" style="width: 100px;">Nº FACTURA</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased Price: activate to sort column ascending" style="width: 86px;">Fecha</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 118px;">Cliente</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 85px;">BASE</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 85px;">IVA</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Ship to: activate to sort column ascending" style="width: 64px;">IRPF</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Base Price: activate to sort column ascending" style="width: 92px;">IMPORTE</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Base Price: activate to sort column ascending" style="width: 92px;">ESTADO</th>

                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($facturas as $factura)
                                                <tr>
                                                    <td>
                                                        <a href="modif_factura_cliente_{{ $factura->idFactura }}"> <button class="btn btn-outline-primary">Ver</button></a>
                                                    </td>
                                                    <td>{{$factura->facnumero}}</td>
                                                    <td>{{date('d/m/Y', strtotime($factura->facdma))}}</td>
                                                    <td> <label class="badge badge-info">{{$factura->abrevi}}</label></td>
                                                    <td>{{$factura->facbase}} €</td>
                                                    <td>{{$factura->faciva}} €</td>
                                                    <td>{{$factura->facirpf}} €</td>
                                                    <td>{{$factura->facimp}} €</td>

                                                    <td>
                                                        @if($factura->facestado==0)
                                                            <label class="font-weight-medium text-success"> COBRADA</label>
                                                        @else
                                                            <label class="badge badge-danger">  PTE.COBRO</label>
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