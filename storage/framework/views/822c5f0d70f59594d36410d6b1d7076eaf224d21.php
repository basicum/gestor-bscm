<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>JustDo Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
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
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="ti-search"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Buscar" aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <?php /*Aviso de proyectos*/ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="ti-server mx-0"></i>
                        <span class="count"></span>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">

                        <p class="mb-0 font-weight-normal float-left dropdown-header">Estas trabajando en <?php echo e(count($proyectos)); ?> proyectos</p>
                        <?php foreach($proyectos as $proyecto): ?>
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
                <li class="nav-item dropdown mr-1">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                        <i class="ti-time mx-0"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Tareas Pendientes (<?php echo e(count($ord_trabajo)); ?>)</p>
                        <?php foreach($ord_trabajo as $tarea): ?>


                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="img/logo-mini.svg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal"><?php echo e(utf8_decode( $tarea->ampltexto )); ?>

                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                  Cliente  <?php echo e($tarea->idcliente); ?>

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
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="ti-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Settings</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="ti-user mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    2 days ago
                                </p>
                            </div>
                        </a>
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
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Team review meeting at 3.00 PM
                                        <i class="input-helper"></i></label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Prepare for presentation
                                        <i class="input-helper"></i></label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Resolve all the low priority tickets due today
                                        <i class="input-helper"></i></label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked="">
                                        Schedule meeting for next week
                                        <i class="input-helper"></i></label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked="">
                                        Project review
                                        <i class="input-helper"></i></label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
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
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">
                        <i class="ti-home menu-icon"></i>
                        <span class="menu-title">Inicio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/widgets/widgets.html">
                        <i class="ti-settings menu-icon"></i>
                        <span class="menu-title">Widgets</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="ti-palette menu-icon"></i>
                        <span class="menu-title">UI Elements</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/accordions.html">Accordions</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/buttons.html">Buttons</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/badges.html">Badges</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/breadcrumbs.html">Breadcrumbs</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/dropdowns.html">Dropdowns</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/modals.html">Modals</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/progress.html">Progress bar</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/pagination.html">Pagination</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/tabs.html">Tabs</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/typography.html">Typography</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/tooltips.html">Tooltips</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
                        <i class="ti-view-list menu-icon"></i>
                        <span class="menu-title">Advanced UI</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-advanced">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/dragula.html">Dragula</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/clipboard.html">Clipboard</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/context-menu.html">Context menu</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/slider.html">Sliders</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/carousel.html">Carousel</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/colcade.html">Colcade</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/loaders.html">Loaders</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#form-elements" aria-expanded="false" aria-controls="form-elements">
                        <i class="ti-clipboard menu-icon"></i>
                        <span class="menu-title">Form elements</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-elements">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/forms/basic_elements.html">Basic Elements</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/forms/advanced_elements.html">Advanced Elements</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/forms/validation.html">Validation</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/forms/wizard.html">Wizard</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#editors" aria-expanded="false" aria-controls="editors">
                        <i class="ti-eraser menu-icon"></i>
                        <span class="menu-title">Editors</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="editors">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/forms/text_editor.html">Text editors</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/forms/code_editor.html">Code editors</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#charts" aria-expanded="false" aria-controls="charts">
                        <i class="ti-bar-chart-alt menu-icon"></i>
                        <span class="menu-title">Charts</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/charts/chartjs.html">ChartJs</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/charts/morris.html">Morris</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/charts/flot-chart.html">Flot</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/charts/google-charts.html">Google charts</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/charts/sparkline.html">Sparkline js</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/charts/c3.html">C3 charts</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/charts/chartist.html">Chartists</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/charts/justGage.html">JustGage</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#tables" aria-expanded="false" aria-controls="tables">
                        <i class="ti-layout menu-icon"></i>
                        <span class="menu-title">Tables</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/tables/basic-table.html">Basic table</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/tables/data-table.html">Data table</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/tables/js-grid.html">Js-grid</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/tables/sortable-table.html">Sortable table</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/popups.html">
                        <i class="ti-export menu-icon"></i>
                        <span class="menu-title">Popups</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/ui-features/notifications.html">
                        <i class="ti-bell menu-icon"></i>
                        <span class="menu-title">Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#icons" aria-expanded="false" aria-controls="icons">
                        <i class="ti-face-smile menu-icon"></i>
                        <span class="menu-title">Icons</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="icons">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/icons/flag-icons.html">Flag icons</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/icons/mdi.html">Mdi icons</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/icons/font-awesome.html">Font Awesome</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/icons/simple-line-icon.html">Simple line icons</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/icons/themify.html">Themify icons</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#maps" aria-expanded="false" aria-controls="maps">
                        <i class="ti-map menu-icon"></i>
                        <span class="menu-title">Maps</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="maps">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/maps/mapael.html">Mapael</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/maps/vector-map.html">Vector Map</a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/maps/google-maps.html">Google Map</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#auth" aria-expanded="false" aria-controls="auth">
                        <i class="ti-layers-alt menu-icon"></i>
                        <span class="menu-title">User Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/login.html"> Login </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/login-2.html"> Login 2 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/register.html"> Register </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/register-2.html"> Register 2 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/lock-screen.html"> Lockscreen </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#error" aria-expanded="false" aria-controls="error">
                        <i class="ti-help-alt menu-icon"></i>
                        <span class="menu-title">Error pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="error">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/error-404.html"> 404 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/error-500.html"> 500 </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#general-pages" aria-expanded="false" aria-controls="general-pages">
                        <i class="ti-layers menu-icon"></i>
                        <span class="menu-title">General Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="general-pages">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/blank-page.html"> Blank Page </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/profile.html"> Profile </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/faq.html"> FAQ </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/faq-2.html"> FAQ 2 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/news-grid.html"> News grid </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/timeline.html"> Timeline </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/search-results.html"> Search Results </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/portfolio.html"> Portfolio </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/index.html#e-commerce" aria-expanded="false" aria-controls="e-commerce">
                        <i class="ti-shopping-cart menu-icon"></i>
                        <span class="menu-title">E-commerce</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="e-commerce">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/invoice.html"> Invoice </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/pricing-table.html"> Pricing Table </a></li>
                            <li class="nav-item"> <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/samples/orders.html"> Orders </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/apps/email.html">
                        <i class="ti-email menu-icon"></i>
                        <span class="menu-title">E-mail</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/apps/calendar.html">
                        <i class="ti-calendar menu-icon"></i>
                        <span class="menu-title">Calendar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/apps/todo.html">
                        <i class="ti-check-box menu-icon"></i>
                        <span class="menu-title">Todo List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/apps/gallery.html">
                        <i class="ti-gallery menu-icon"></i>
                        <span class="menu-title">Gallery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.urbanui.com/justdo/template/demo/vertical-boxed/pages/documentation/documentation.html">
                        <i class="ti-write menu-icon"></i>
                        <span class="menu-title">Documentation</span>
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="#" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &amp; made with <i class="ti-heart text-danger ml-1"></i></span>
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
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->

</body>
</html>