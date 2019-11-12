@extends('layouts.app')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">


                <div class="row">
                    <div class="col-12">
                        <h2>Subir archivo</h2>
                        <div class="active mt-2" ><br>
                        @php
                        echo Form::open(array('url' => '/archivos','files'=>'true'));

                        echo Form::file('image', array('class' => 'form-control col-md-6 p-3'));
                        echo '<br />';
                        echo Form::submit('Subir', array('class' => 'btn btn-info'));
                        echo Form::close();
                        @endphp
                        </div>
<hr>

                        <div class="table-responsive">
                            <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="order-listing" class="table dataTable table-striped table-borderless table-hover" role="grid" aria-describedby="order-listing_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 72px;"></th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 72px;"></th>

                                            </tr>
                                            </thead>

                                            <tbody>
                                           {{--listado archivos--}}

                                           @php

                                               $directorio = opendir("uploads"); //ruta actual
                                               while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
                                               {
                                               if (is_dir($archivo))//verificamos si es o no un directorio
                                               {
                                              // echo "[".$archivo . "]<br />"; de ser un directorio lo envolvemos entre corchetes
                                               }
                                               else
                                               {
                                                echo "<tr><td><a href=uploads/".$archivo ." target=_blank>".$archivo ."</td><td></td></tr>";
                                               }
                                               }
                                           @endphp
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