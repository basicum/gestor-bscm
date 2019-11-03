
@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">

                    <div class="row">
                        <div class="col-12 col-xl-4 mb-4 mb-xl-0">
                            <h4 class="font-weight-bold">Hola, {{ Auth::user()->name }} </h4>
                            <h4 class="font-weight-normal mb-0">Panel de Control,</h4>
                            @if (session('mensaje'))
                                <div class="alert alert-success">
                                    {{ session('mensaje') }}
                                </div>
                            @endif

                        </div>
                        <div class="col-12 col-xl-8">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="border-right pr-4 mb-3 mb-xl-0">
                                    <p class="text-muted">Ingresos</p>
                                    <h4 class="mb-0 font-weight-bold">{{$ingresos}} €</h4>
                                </div>
                                <div class="border-right pr-4 mb-3 mb-xl-0">
                                    <p class="text-muted">Gastos</p>
                                    <h4 class="mb-0 font-weight-bold">{{$gastos}} €</h4>
                                </div>
                                <div class="border-right pr-4 mb-3 mb-xl-0">
                                    <p class="text-muted">Proyectos</p>
                                    <h4 class="mb-0 font-weight-bold">{{$total_proyectos->total}}</h4>
                                </div>
                                <div class="pr-3 mb-3 mb-xl-0">
                                    <p class="text-muted">Presupuestos</p>
                                    <h4 class="mb-0 font-weight-bold">{{$total_presupuestos_activos}}</h4>
                                </div>
                                <div class="mb-3 mb-xl-0">
                                    <button class="btn btn-warning rounded-0 text-white">Ver mis datos</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">Total Presupuestos</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $total_presupuestos_activos }}</h3>
                                <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                            <p class="mb-0 mt-2 text-warning">{{round($presupuestos,2)}}% <span class="text-black ml-1"><small>(Aceptados)</small></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">Número de Clientes</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $clientes }}</h3>
                                <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                            <p class="mb-0 mt-2 text-danger">{{round($ratio_clientes,2)}}% <span class="text-black ml-1"><small>(Mis Clientes)</small></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">Proyectos Realizados</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$total_proyectos->total}}</h3>
                                <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                            <p class="mb-0 mt-2 text-success">{{round($ratio_proyectos, 2)}}%<span class="text-black ml-1"><small>(Mis proyectos)</small></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">Tareas Realizadas</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$total_trabajos}}</h3>
                                <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                            <p class="mb-0 mt-2 text-success">{{round($ratio_trabajos, 2)}}%<span class="text-black ml-1"><small>(Mis trabajos)</small></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-0">Facturas Pendientes</p>
                            <div class="table-responsive">
                                <table id="order-listing" class="table table-striped table-borderless table-hover ">
                                    <thead>
                                    <tr>
                                        <th>Factura</th>
                                        <th>Estado</th>
                                        <th>Cliente</th>
                                        <th>Importe</th>
                                        <th>Día</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($facturas->facDesde as $factura)

                                    <tr>

                                        <td> <a href="verfactura/{{$factura->facnumero}}">{{$factura->facnumero}} </a></td>
                                             @php
                                                $facestado = array ("0"=>"Cobrada","1"=>"Pte. de Pago","2"=>"Pte.Remesar","3"=>"Perdida Impagada");
                                                    foreach($facestado  as $key => $value){
                                                            if($key==$factura->facestado){
                                                                if($key==0){print "<td class='font-weight-medium text-success'>".$value." </td>";}
                                                                elseif($key==1){print "<td class='font-weight-medium text-warning'>".$value." </td>";}
                                                                elseif($key==2){print "<td class='font-weight-medium text-danger'>".$value." </td>";}
                                                                else {
                                                                print "<td class=font-weight-medium text-danger>".$value." </td>";
                                                                }
                                                          }
                                             }

                                            @endphp


                                        <td>{{utf8_decode($factura->abrevi)}}</td>
                                        <td class="font-weight-bold">{{$factura->facimp}}€</td>
                                        <td>{{$factura->facdma}}</td>


                                    </tr>

                                    @endforeach
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Avisos de Cosas que hacer--}}
                <div class="col-md-5 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cosas que hacer</h4>
                            <div class="list-wrapper pt-2">
                                <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                                  @foreach ($notas as $nota)
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox " type="checkbox" >
                                                {{ $nota->Descripcion }}
                                                <i class="input-helper"></i></label>
                                        </div>
                                        <div style="horiz-align:right"> <a href="{{ route('notas.update', $nota->id) }}">(Borrar)</a></div>

                                    </li>
                                   @endforeach

                                </ul>
                                <div class="add-items d-flex mb-0 mt-2">
                                    <form action="{{ route('notas.crear') }}" style="width: 260px;"  method="GET">


                                        <input type="text" class="form-control" name="Descripcion" style="background: #2b2e4c; padding: 10px;" placeholder="Nueva Cosa que hacer">
                                        <button class="btn btn-warning rounded-0 text-white">Añadir</button>
                                        <input type="hidden" name="idUser" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="Tipo" value="1">
                                        <input type="hidden" name="Estado" value="1">

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <p class="card-title">Gráfico Presupuestos / Proyectos</p>
                            <p class="text-muted font-weight-light">Número total de presupuestos enviados en la franja de tiempo seleccionada, en comparación con los presupestos aceptados que pasan a ser proyecto.</p>
                            <div class="d-flex flex-wrap mb-5">
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">Total Presupuestos</p>
                                    <h3>{{ $total_presupuestos_activos }}</h3>
                                </div>
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">Total Proyectos</p>
                                    <h3>{{$total_proyectos->total}} </h3>
                                </div>
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">Total Usuario</p>
                                    <h3>{{round($ratio_trabajos, 2)}}%</h3>
                                </div>
                            </div>
                            <canvas id="order-chart" style="display: block; width: 381px; height: 190px;" width="381" height="190" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <p class="card-title">Ventas Realizadas</p>
                            <p class="text-muted font-weight-light">Número total de ventas realizadas en la franja de tiempo seleccionada, frente a los mantenimeintos de clientes.</p>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"><ul class="1-legend"><li><span style="background-color:#ffc100"></span>Ventas Nuevas</li><li><span style="background-color:#f5a623"></span>Mantenimientos</li></ul></div>
                            <canvas id="sales-chart" width="381" height="190" class="chartjs-render-monitor" style="display: block; width: 381px; height: 190px;"></canvas>
                        </div>
                        <div class="card border-right-0 border-left-0 border-bottom-0">
                            <div class="d-flex justify-content-center justify-content-md-end">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-lg btn-outline-light dropdown-toggle rounded-0 border-top-0 border-bottom-0" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Today
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">Enero - Marzo</a>
                                        <a class="dropdown-item" href="#">Marzo - Junio</a>
                                        <a class="dropdown-item" href="#">Junio - Agosto</a>
                                        <a class="dropdown-item" href="#">Agosto - Noviembre</a>
                                        <a class="dropdown-item" href="#">Noviembre - Enero</a>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-outline-light text-primary rounded-0 border-0 d-none d-md-block" type="button"> View all </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card position-relative">
                        <div class="card-body">
                            <p class="card-title">Detailed Reports</p>
                            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                                                <div class="ml-xl-4">
                                                    <h1>$3404</h1>
                                                    <h3 class="font-weight-light mb-xl-4">North America</h3>
                                                    <p class="text-muted mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="table-responsive mb-3 mb-md-0">
                                                            <table class="table table-borderless report-table">
                                                                <tbody><tr>
                                                                    <td class="text-muted">Illinois</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">713</h5></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Washington</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">583</h5></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Mississippi</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">924</h5></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">California</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">664</h5></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Maryland</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">560</h5></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Alaska</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">793</h5></td>
                                                                </tr>
                                                                </tbody></table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                                        <canvas id="north-america-chart" width="295" height="147" class="chartjs-render-monitor" style="display: block; width: 295px; height: 147px;"></canvas>
                                                        <div id="north-america-legend"><div class="report-chart"><div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: #71c016"></div><p class="mb-0">Offline sales</p></div><p class="mb-0">88333</p></div><div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: #ffc100"></div><p class="mb-0">Online sales</p></div><p class="mb-0">66093</p></div><div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: #248afd"></div><p class="mb-0">Returns</p></div><p class="mb-0">39836</p></div></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                                                <div class="ml-xl-4">
                                                    <h1>$6132</h1>
                                                    <h3 class="font-weight-light mb-xl-4">South America</h3>
                                                    <p class="text-muted mb-2 mb-xl-0">It is the period time a user is actively engaged with your website, page or app, etc. The total number of sessions within the date range. </p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="table-responsive mb-3 mb-md-0">
                                                            <table class="table table-borderless report-table">
                                                                <tbody><tr>
                                                                    <td class="text-muted">Brazil</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">613</h5></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Argentina</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">483</h5></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Peru</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">824</h5></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Chile</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">564</h5></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Colombia</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">460</h5></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Uruguay</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><h5 class="font-weight-bold mb-0">693</h5></td>
                                                                </tr>
                                                                </tbody></table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                                        <canvas id="south-america-chart" height="147" class="chartjs-render-monitor" width="295" style="display: block; width: 295px; height: 147px;"></canvas>
                                                        <div id="south-america-legend"><div class="report-chart"><div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: #ffc100"></div><p class="mb-0">Offline sales</p></div><p class="mb-0">495343</p></div><div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: #248afd"></div><p class="mb-0">Online sales</p></div><p class="mb-0">630983</p></div><div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: #71c016"></div><p class="mb-0">Returns</p></div><p class="mb-0">290831</p></div></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-0">Projects</p>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th class="pl-0 border-bottom">Places</th>
                                        <th class="border-bottom">Orders</th>
                                        <th class="border-bottom">Users</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-muted pl-0">Kentucky</td>
                                        <td><p class="mb-0"><span class="font-weight-bold mr-2">65</span>(2.15%)</p></td>
                                        <td class="text-muted">65</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted pl-0">Ohio</td>
                                        <td><p class="mb-0"><span class="font-weight-bold mr-2">54</span>(3.25%)</p></td>
                                        <td class="text-muted">51</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted pl-0">Nevada</td>
                                        <td><p class="mb-0"><span class="font-weight-bold mr-2">22</span>(2.22%)</p></td>
                                        <td class="text-muted">32</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted pl-0">North Carolina</td>
                                        <td><p class="mb-0"><span class="font-weight-bold mr-2">46</span>(3.27%)</p></td>
                                        <td class="text-muted">15</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted pl-0">Montana</td>
                                        <td><p class="mb-0"><span class="font-weight-bold mr-2">17</span>(1.25%)</p></td>
                                        <td class="text-muted">25</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted pl-0">Nevada</td>
                                        <td><p class="mb-0"><span class="font-weight-bold mr-2">52</span>(3.11%)</p></td>
                                        <td class="text-muted">71</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted pl-0 pb-0">Louisiana</td>
                                        <td class="pb-0"><p class="mb-0"><span class="font-weight-bold mr-2">25</span>(1.32%)</p></td>
                                        <td class="text-muted pb-0">14</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Charts</p>
                                    <div class="charts-data">
                                        <div class="mt-3">
                                            <p class="text-muted mb-0">Orders</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="progress progress-md flex-grow-1 mr-4">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="text-muted mb-0">5k</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-muted mb-0">Users</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="progress progress-md flex-grow-1 mr-4">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="text-muted mb-0">3k</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-muted mb-0">Downloads</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="progress progress-md flex-grow-1 mr-4">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="text-muted mb-0">992</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-muted mb-0">Visitors</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="progress progress-md flex-grow-1 mr-4">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="text-muted mb-0">687</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                            <div class="card data-icon-card-primary">
                                <div class="card-body">
                                    <p class="card-title text-white">Number of Meetings</p>
                                    <div class="row">
                                        <div class="col-8 text-white">
                                            <h3>3404</h3>
                                            <p class="text-white font-weight-light mb-0">The total number of sessions within the date range. It is the period time</p>
                                        </div>
                                        <div class="col-4 background-icon">
                                            <i class="ti-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Notifications</p>
                            <ul class="icon-data-list">
                                <li>
                                    <p class="text-primary mb-1">Isabella Becker</p>
                                    <p class="text-muted">Sales dashboard have been created</p>
                                    <small class="text-muted">9:30 am</small>
                                </li>
                                <li>
                                    <p class="text-primary mb-1">Adam Warren</p>
                                    <p class="text-muted">You have done a great job #TW11109872</p>
                                    <small class="text-muted">10:30 am</small>
                                </li>
                                <li>
                                    <p class="text-primary mb-1">Leonard Thornton</p>
                                    <p class="text-muted">Sales dashboard have been created</p>
                                    <small class="text-muted">11:30 am</small>
                                </li>
                                <li>
                                    <p class="text-primary mb-1">George Morrison</p>
                                    <p class="text-muted">Sales dashboard have been created</p>
                                    <small class="text-muted">8:50 am</small>
                                </li>
                                <li>
                                    <p class="text-primary mb-1">Ryan Cortez</p>
                                    <p class="text-muted">Herbs are fun and easy to grow.</p>
                                    <small class="text-muted">9:00 am</small>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    </div>
@endsection