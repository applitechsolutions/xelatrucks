<?php
include_once 'functions/sesiones.php';
include_once 'templates/header.php';
include_once 'templates/navbar.php';
include_once 'templates/sidebar.php';
include_once 'functions/bd_conexion.php';
$id = $_GET['id'];
if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("Error!");
}
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
                <h1 class="page-title"> Editar Usuario </h1>
              </header><!-- /.page-title-bar -->
<?php
  $conn->set_charset("utf8");
  $sql = "SELECT idUser, _idArea, name, lastName, user, rol FROM `user` WHERE `idUser` = $id AND state = 0";
  $resultado = $conn->query($sql);
  $user = $resultado->fetch_assoc();
?>
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
                          <label for="lbl2">Nombre <span class="badge badge-danger">Obligatorio</span></label> <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres" required="" value="<?php echo $user['name']; ?>">
                        </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                          <label for="lbl2">Apellido <span class="badge badge-secondary">Opcional</span></label> <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos" value="<?php echo $user['lastName']; ?>">
                        </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                          <label for="lbl2">Usuario <span class="badge badge-danger">Obligatorio</span></label> <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de Usuario" required="" value="<?php echo $user['user']; ?>">
                        </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                            <label for="sel1">Área <span class="badge badge-danger">Obligatorio</span></label> <select class="custom-select" id="area" name="area" required="">
                            <option value="" selected> Elige... </option>
<!-- INICIO PHP -->
<?php
  try {
      $area_actual = $user['_idArea'];
      $sql = "SELECT * FROM area";
      $resultado = $conn->query($sql);
      while ($area = $resultado->fetch_assoc()) {
          if ($area['idArea'] == $area_actual) {
?>
                            <!-- INICIO PHP -->
                            <option value="<?php echo $area['idArea']; ?>" selected>
                                <?php echo $area['name']; ?>
                            </option>
                            <!-- PHP MEDIO -->
        <?php
          } else {
        ?>
                            <!-- PHP MEDIO -->
                            <option value="<?php echo $area['idArea']; ?>">
                                <?php echo $area['name']; ?>
                            </option>
                            <!-- PHP FINAL -->
<?php
          }
    }
  } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
  }
?>
                                            <!-- PHP FINAL -->
                            </select>
                        </div><!-- /.form-group -->
                        <!-- .form-group -->
                        <div class="form-group">
                          <label class="d-block">Rol <span class="badge badge-danger">Obligatorio</span></label>
                      <?php 
                        if ($user['rol'] == 0) {?>
                          <div class="custom-control custom-control-inline custom-radio">
                            <input type="radio" class="custom-control-input" name="rdGroup1" id="admin" value="0" checked=""> <label class="custom-control-label" for="admin">Administrador</label>
                          </div>
                          <div class="custom-control custom-control-inline custom-radio">
                            <input type="radio" class="custom-control-input" name="rdGroup1" id="operativo" value="1"> <label class="custom-control-label" for="operativo">Operativo</label>
                          </div>
                        </div><!-- /.form-group -->
                  <?php } else { ?>
                          <div class="custom-control custom-control-inline custom-radio">
                            <input type="radio" class="custom-control-input" name="rdGroup1" id="admin" value="0"> <label class="custom-control-label" for="admin">Administrador</label>
                          </div>
                          <div class="custom-control custom-control-inline custom-radio">
                            <input type="radio" class="custom-control-input" name="rdGroup1" id="operativo" value="1" checked=""> <label class="custom-control-label" for="operativo">Operativo</label>
                          </div>
                        </div><!-- /.form-group -->
                  <?php } ?>
                      </fieldset><!-- /.fieldset -->
                      <input type="hidden" name="usuario" value="editar">
                      <input type="hidden" name="idUser" value="<?php echo $id; ?>">
                      <button class="btn btn-primary" type="submit" id="btnUser"><i class="fa fa-save"></i> Guardar</button>
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