<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Administrador Basicum</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="favicon.png">
    <style type="text/css">/* Chart.js */
        @keyframes  chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>
</head>
<body class="boxed-layout sidebar-dark">

<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-dark">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="/"><img src="img/logo.svg" class="mr-2" alt="logo"></a>
            <a class="navbar-brand brand-logo-mini" href="<?php echo e(url('/')); ?>"><img src="img/logo-mini.svg" alt="logo"></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="ti-layout-grid2"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <?php /*TODO rango de fechas */ ?>
                    <div class="row">
                        <div id="datepicker-popup" class="input-group date datepicker">
                            <span style="color: #eaeaf1">Contar desde</span>


                            <input type="text" name="desde" class="form-control datepicker" value="<?php echo e($ayer->format('d/m/Y')); ?>">
                                <span class="input-group-addon input-group-append ">
                                <span class="ti-calendar "></span>
                                </span>

                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <?php /*Aviso de proyectos*/ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="ti-server mx-0"></i>
                        <span class="count"><?php echo e(count($proyectos->proyectos)); ?></span>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">

                        <p class="mb-0 font-weight-normal float-left dropdown-header">Estas trabajando en <?php echo e(count($proyectos->proyectos)); ?> proyectos</p>
                        <?php foreach($proyectos->proyectos as $proyecto): ?>
                        <a href="okproyecto.php?var=<?php echo e($proyecto->id); ?>" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal"><?php echo e($proyecto->descripcion); ?></h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    <span class="percent"><?php echo e($proyecto->sumahoras); ?></span>
                                </p>
                            </div>
                        </a>
                      <?php endforeach; ?>
                        <hr>
                        <a href="proyectos">Ver todos los proyectos <i class="m-icon-swapright"></i></a>
                    </div>
                </li>
                <?php /*Aviso Ordenes de trabajo*/ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                        <i class="ti-time mx-0"></i>
                        <span class="count"><?php echo e(count($ord_trabajo->ord_trabajo)); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Tareas Pendientes (<?php echo e(count($ord_trabajo->ord_trabajo)); ?>)</p>
                        <?php foreach($ord_trabajo->ord_trabajo as $tarea): ?>


                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="img/logo-mini.svg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal"><?php echo e(utf8_decode( $tarea->ampltexto )); ?>

                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                  Cliente  <?php echo e($tarea->abrevi); ?>

                                </p>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </li>
                <?php /*Aviso Notificaciones*/ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="ti-eye mx-0"></i>
                        <span class="count"><?php echo e($total_presupuestos); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Presupuestos</p>
                        <?php foreach($total_presupuestos_pendientes->tpp as $presup): ?>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal"><?php echo e($presup->id_cliente); ?> - <?php echo e($presup->fecha_pres); ?>- <?php echo e($presup->suma_imp); ?>€ (<?php echo e($presup->clestadopresu); ?>)</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    <?php echo e(utf8_decode( $presup->descripcion )); ?>

                                </p>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </li>

                    <!-- Right Side Of Navbar -->
                     <!-- Datos del usuario -->
                <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown" aria-expanded="false">
                            <img src="img/<?php echo e($usuarios->foto); ?>" alt="profile">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                <?php echo e(Auth::user()->name); ?>

                            </a>
                            <a href="<?php echo e(url('/logout')); ?>" class="dropdown-item">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                </li>

                <li class="nav-item nav-settings d-none d-lg-flex">
                    <a class="nav-link" href="#">
                        <i class="ti-more"></i>
                    </a>
                </li>

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="ti-layout-grid2"></span>
            </button>
        </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <?php /*slider de la derecha aparece al pulsar los 3 puntos*/ ?>
        <div id="right-sidebar" class="settings-panel bg-gradient-dark">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper ps" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="list-wrapper px-3">
                        <ul class="d-flex flex-column-reverse todo-list">
                            <?php foreach($notas as $nota): ?>
                            <li>
                                <?php /*se puede cambiar a class="completed"*/ ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        <?php echo e($nota->Descripcion); ?>

                                        <i class="input-helper"></i></label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                           <?php endforeach; ?>
                        </ul>
                    </div>
                    <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 11 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                        <p class="text-gray mb-0">build a js based app</p>
                    </div>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 7 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                        <p class="text-gray mb-0 ">Call Sarah Graves</p>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                <!-- To do section tab ends -->
                <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                        <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
                    </div>
                    <ul class="chat-list">
                        <li class="list active">
                            <div class="profile"><img src="img/face1.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Thomas Douglas</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="img/face2.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <div class="wrapper d-flex">
                                    <p>Catherine</p>
                                </div>
                                <p>Away</p>
                            </div>
                            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                            <small class="text-muted my-auto">23 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="img/face3.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Daniel Russell</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">14 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="img/face4.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <p>James Richardson</p>
                                <p>Away</p>
                            </div>
                            <small class="text-muted my-auto">2 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="img/face5.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Madeline Kennedy</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">5 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="img/face6.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Sarah Graves</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">47 min</small>
                        </li>
                    </ul>
                </div>
                <!-- chat tab ends -->
            </div>
        </div>

        <?php /*botonera de la izquierda*/ ?>
        <nav class="sidebar sidebar-offcanvas position-sticky sticky-top" id="sidebar">
            <ul class="nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">
                        <i class="ti-home menu-icon"></i>
                        <span class="menu-title">Inicio</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="ti-palette menu-icon"></i>
                        <span class="menu-title">Mtto Ficheros</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="terceros">Terceros</a></li>
                            <li class="nav-item"> <a class="nav-link" href="archivos">Archivos</a></li>
                            <li class="nav-item"> <a class="nav-link" href="dominios">Dominios / Alojamientos</a></li>
                            <li class="nav-item"> <a class="nav-link" href="recursos">Recursos</a></li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
                        <i class="ti-view-list menu-icon"></i>
                        <span class="menu-title">Dominios / Alojamientos</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-advanced">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="nuevo_dominio">Crear</a></li>
                            <li class="nav-item"> <a class="nav-link" href="aviso_dominio">Avisos</a></li>
                            <li class="nav-item"> <a class="nav-link" href="aceptar_dominio">Aceptación</a></li>
                            <li class="nav-item"> <a class="nav-link" href="facturar_dominio">Facturar</a></li>
                            <li class="nav-item"> <a class="nav-link" href="renovacion_dominios">Renovar</a></li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                        <i class="ti-clipboard menu-icon"></i>
                        <span class="menu-title">Presupuestos</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-elements">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="nuevo_presupuesto">Crear</a></li>
                            <li class="nav-item"><a class="nav-link" href="presupuestos">Modificar</a></li>
                            <li class="nav-item"><a class="nav-link" href="envia_presupuesto">Enviar</a></li>
                            <li class="nav-item"><a class="nav-link" href="acepta_presupuesto">Aceptar</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
                        <i class="ti-eraser menu-icon"></i>
                        <span class="menu-title">Proyectos</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="editors">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="nuevo_proyecto">Crear</a></li>
                            <li class="nav-item"><a class="nav-link" href="proyectos">Ver / Modificar</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                        <i class="ti-bar-chart-alt menu-icon"></i>
                        <span class="menu-title">Fact Clientes</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="facturas_clientes">Generar</a></li>
                            <li class="nav-item"> <a class="nav-link" href="entregas_cuenta_clientes">Entregas a cuenta</a></li>
                            <li class="nav-item"> <a class="nav-link" href="anular_factura_clientes">Anular</a></li>
                            <li class="nav-item"> <a class="nav-link" href="enviar_factura_clientes">Enviar</a></li>
                            <li class="nav-item"> <a class="nav-link" href="cobro_clientes">Cobrar</a></li>
                            <li class="nav-item"> <a class="nav-link" href="moroso_clientes">Impagadas</a></li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                        <i class="ti-layout menu-icon"></i>
                        <span class="menu-title">Fact Proveedores</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="facturas_proveedores">Registrar</a></li>
                            <li class="nav-item"> <a class="nav-link" href="facpropago">Pagar</a></li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registrar_actividad">
                        <i class="ti-bell menu-icon"></i>
                        <span class="menu-title">Actividad</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                        <i class="ti-face-smile menu-icon"></i>
                        <span class="menu-title">Posicionamiento</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="icons">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="acciones_seo">Acciones SEO</a></li>
                            <li class="nav-item"> <a class="nav-link" href="seo_local">SEO Local</a></li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tesoreria">
                        <i class="ti-email menu-icon"></i>
                        <span class="menu-title">Tesorería</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                        <i class="ti-help-alt menu-icon"></i>
                        <span class="menu-title">Informes</span>
                        <i class="menu-arrow"></i>
                    </a>

                    <div class="collapse" id="general-pages">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="informe_clientes"> Clientes </a></li>
                            <li class="nav-item"> <a class="nav-link" href="informe_dominios"> Dominios </a></li>
                            <li class="nav-item"> <a class="nav-link" href="informe_presupuestos"> Presupuestos </a></li>
                            <li class="nav-item"> <a class="nav-link" href="informe_proyectos"> Proyectos </a></li>
                            <li class="nav-item"> <a class="nav-link" href="informes_actividad"> Actividad </a></li>
                            <li class="nav-item"> <a class="nav-link" href="informes_posicionamiento"> Posicionamiento </a></li>
                            <li class="nav-item"> <a class="nav-link" href="informes_mantenimiento"> Mantenimiento </a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="ayuda">
                        <i class="ti-write menu-icon"></i>
                        <span class="menu-title">Ayuda</span>
                    </a>
                </li>
            </ul>
        </nav>



<!-- page-body-wrapper ends -->
    <?php echo $__env->yieldContent('content'); ?>


    <!-- partial -->
    </div>
<!-- main-panel ends -->

<!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="#" target="_blank">Basicum</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Administración &amp; Gestión <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->

</div>
<!-- container-scroller -->
</div>
<!-- plugins:js -->
<script src="js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!--inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<?php /*<script src="js/todolist.js"></script>*/ ?>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/formpickers.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->
<script>

    (function($) {
        'use strict';
        $(function() {
            var todoListItem = $('.todo-list');
            var todoListInput = $('.todo-list-input');
            $('.todo-list-add-btn').on("click", function(event) {
                event.preventDefault();

                var item = $(this).prevAll('.todo-list-input').val();

                if (item) {
                    todoListItem.append("<li><div class='form-check'><label class='form-check-label'><input class='checkbox' type='checkbox'/>" + item + "<i class='input-helper'></i></label></div><i class='remove ti-close'></i></li>");
                    todoListInput.val("");
                }

            });

            todoListItem.on('change', '.checkbox', function() {
                if ($(this).attr('checked')) {
                    $(this).removeAttr('checked');
                } else {
                    $(this).attr('checked', 'checked');
                }

                $(this).closest("li").toggleClass('completed');

            });

            todoListItem.on('click', '.remove', function() {


                $(this).parent().remove();
            });

        });
    })(jQuery);
</script>
</body>
</html>