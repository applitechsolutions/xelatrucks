<?php 
  include_once 'functions/sesiones.php';
  include_once 'templates/header.php';
  include_once 'functions/bd_conexion.php';
?>
    <main class="auth">
      <header id="auth-header" class="auth-header" style="background-image: url(assets/images/illustration/img-1.png);">
        <h1>
          <img src="assets/images/brand-inverse.png" alt="" height="72">
        </h1>
      </header><!-- form -->
      <form class="auth-form" id="form-login" name="form-login" action="BLL/login.php" method="POST">
        <!-- .form-group -->
        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="inputUser" name="username" class="form-control" placeholder="nombre de usuario" required="" autofocus=""> <label for="inputUser">Usuario</label>
          </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="contraseña" required=""> <label for="inputPassword">Contraseña</label>
          </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <input type="hidden" name="ingresar" value="1">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group text-center">
          <div class="custom-control custom-control-inline custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="remember-me"> <label class="custom-control-label" for="remember-me">Recuérdame</label>
          </div>
        </div><!-- /.form-group -->
      </form><!-- /.auth-form -->
      <!-- copyright -->
      <footer class="auth-footer"> <strong>Copyright &copy; 2019 - <?php echo date("Y"); ?> APPLITECH SOFTWARE SOLUTIONS. </strong>
                        Todos Los
                        Derechos Reservados.
      </footer>
      
    </main><!-- /.auth -->
    <!-- BEGIN BASE JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="assets/vendor/particles.js/particles.min.js"></script>
    <script src="js/ajax/login-ajax.js"></script>
    <script>
      /**
       * Keep in mind that your scripts may not always be executed after the theme is completely ready,
       * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
       */
      $(document).on('theme:init', () =>
      {
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('auth-header', 'assets/javascript/pages/particles.json');
      })
    </script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="assets/javascript/theme.min.js"></script> <!-- END THEME JS -->
  </body>
</html>