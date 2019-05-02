<?php
include_once 'functions/sesiones.php';
include_once 'templates/header.php';
include_once 'templates/navbar.php';
include_once 'templates/sidebar.php';
include_once 'functions/bd_conexion.php';
?>

<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
        <!-- .page -->
        <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <!-- .page-title-bar -->
                <header class="page-title-bar">
                    <!-- .breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">
                                <a href="index.php"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Inicio</a>
                            </li>
                        </ol>
                    </nav><!-- /.breadcrumb -->
                    <!-- floating action -->
                    <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
                    <!-- /floating action -->
                    <!-- title and toolbar -->
                    <div class="d-md-flex align-items-md-start">
                        <h1 class="page-title mr-sm-auto"> Listado de usuarios </h1><!-- .btn-toolbar -->
                        <div id="dt-buttons" class="btn-toolbar"></div><!-- /.btn-toolbar -->
                    </div><!-- /title and toolbar -->
                </header><!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <!-- .card-header -->
                        <div class="card-header">
                            <!-- .nav-tabs -->
                            ¡Usuarios actualmente activos!
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            <!-- .form-group -->
                            <div class="form-group">
                                <!-- .input-group -->
                                <div class="input-group input-group-alt">
                                    <!-- .input-group-prepend -->
                                    <div class="input-group-prepend">
                                        <!-- <select id="filterBy" class="custom-select">
                                            <option value='' selected> Filter By </option>
                                            <option value="1"> Product </option>
                                            <option value="2"> Inventory </option>
                                            <option value="3"> Variants </option>
                                            <option value="4"> Prices </option>
                                            <option value="5"> Sales </option>
                                        </select> -->
                                    </div><!-- /.input-group-prepend -->
                                    <!-- .input-group -->
                                    <div class="input-group has-clearable">
                                        <button id="clear-search" type="button" class="close" aria-label="Close"><span
                                                aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span
                                                    class="oi oi-magnifying-glass"></span></span>
                                        </div><input id="table-search" type="text" class="form-control"
                                            placeholder="Buscar Usuarios">
                                    </div><!-- /.input-group -->
                                </div><!-- /.input-group -->
                            </div><!-- /.form-group -->
                            <!-- .table -->
                            <table id="users" class="table">
                                <!-- thead -->
                                <thead>
                                    <tr>
                                        <th> Área </th>
                                        <th> Nombre </th>
                                        <th> Apellidos </th>
                                        <th> Usuario </th>
                                        <th> Rol </th>
                                    </tr>
                                </thead><!-- /thead -->
                                <!-- tbody -->
                                <tbody>
                                    <!-- create empty row to passing html validator -->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /.table -->
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
        </div><!-- /.page -->
    </div><!-- .app-footer -->

    <?php
    include_once 'templates/footer.php';
    ?>