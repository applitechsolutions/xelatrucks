<?php
include_once 'functions/sesiones.php';
include_once 'templates/header.php';
include_once 'templates/navbar.php';
include_once 'templates/sidebar.php';
include_once 'functions/bd_conexion.php';
?>

<!-- .app-main -->
    <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page has-sidebar has-sidebar-expand-xl">
            <!-- .page-inner -->
            <div class="page-inner">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                      <a href="listUsers.php"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Listado Usuarios</a>
                    </li>
                  </ol>
                </nav>
                <h1 class="page-title"> Crear Usuario </h1>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <div class="d-xl-none">
                  <button class="btn btn-danger btn-floated" type="button" data-toggle="sidebar"><i class="fa fa-th-list"></i></button>
                </div><!-- .card -->
                <!-- .card -->
                <div id="labels" class="card">
                  <!-- .card-body -->
                  <div class="card-body">
                    <!-- .form -->
                    <form autocomplete="off" role="form" id="form-usuario" name="form-usuario" method="POST" action="BLL/user.php">
                      <!-- .fieldset -->
                      <fieldset>
                        <legend>Campos</legend> <!-- .form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                          <label for="lbl2">Nombre <span class="badge badge-danger">Obligatorio</span></label> <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres" required="">
                        </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                          <label for="lbl2">Apellido <span class="badge badge-secondary">Opcional</span></label> <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos">
                        </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                          <label for="lbl2">Usuario <span class="badge badge-danger">Obligatorio</span></label> <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de Usuario" required="">
                        </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                          <label class="d-flex justify-content-between" for="lbl5"><span>Contraseña <span class="badge badge-danger">Obligatorio</span></span> <a href="#passW" data-toggle="password"><i class="fa fa-eye fa-fw"></i> <span>Show</span></a></label> <input type="password" class="form-control" value="label_with_action" id="passW" name="passW">
                        </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                          <label class="d-flex justify-content-between" for="lbl5"><span>Confirmar Contraseña <span class="badge badge-danger">Obligatorio</span></span> <a href="#confPass" data-toggle="password"><i class="fa fa-eye fa-fw"></i> <span>Show</span></a></label> <input type="password" class="form-control is-invalid" value="label_with_action" id="confPass" name="confPass">
                          <div class="invalid-feedback">
                              <i class="fa fa-exclamation-circle fa-fw"></i> La Contraseña debe coincidir. </div>
                          </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                            <label for="sel1">Área <span class="badge badge-danger">Obligatorio</span></label> <select class="custom-select" id="area" name="area" required="">
                            <option value="" selected> Elige... </option>
        <?php
            try {
                $conn->set_charset("utf8");
                $sql = "SELECT idArea, name FROM area ORDER BY name ASC";
                $resultado = $conn->query($sql);
                while ($area = $resultado->fetch_assoc()) {
        ?>
                            <option value="<?php echo $area['idArea']; ?>">
                                <?php echo $area['name']; ?>
                            </option>
        <?php
                }
                    } catch (Exception $e) {
                        echo "Error: " . $e->getMessage();
                    }
        ?>
                            </select>
                        </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                          <label class="d-block">Rol <span class="badge badge-danger">Obligatorio</span></label>
                          <div class="custom-control custom-control-inline custom-radio">
                            <input type="radio" class="custom-control-input" name="rdGroup1" id="admin" value="0" checked=""> <label class="custom-control-label" for="admin">Administrador</label>
                          </div>
                          <div class="custom-control custom-control-inline custom-radio">
                            <input type="radio" class="custom-control-input" name="rdGroup1" id="operativo" value="1"> <label class="custom-control-label" for="operativo">Operativo</label>
                          </div>
                        </div><!-- /.form-group -->
                      </fieldset><!-- /.fieldset -->
                      <input type="hidden" name="usuario" value="nuevo">
                      <button class="btn btn-primary" type="submit" id="btnUser" disabled><i class="fa fa-save"></i> Guardar</button>
                    </form><!-- /.form -->
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
          </div><!-- /.page -->
        </div><!-- /.wrapper -->
    </main>
<!-- .app-main -->

<?php
include_once 'templates/footer.php';
?>