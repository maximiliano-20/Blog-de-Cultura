<?php session_start(); ?>
<?php require_once 'funciones/funciones.php';  ?>
<?php require_once 'includes/menu.php';  ?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="mt-2 mb-4">Inicia Sesion </h2>
        <?php if (isset($_SESSION['error-login'])): ?>
        <div class="alert alert-danger text-center">
          <?=$_SESSION['error-login']?>
        </div>
      <?php endif; ?>
        <form action="login.php" method="POST" class="row">
          <div class="col-lg-6">
            <input type="email" class="form-control mb-5" name="email" id="" placeholder="Email">
          </div>
          <div class="col-lg-6">
            <input type="password" class="form-control mb-5" name="password" id="" placeholder="Contraseña">
          </div>
          <div class="col-lg-12">
            <button class="btn btn-primary mb-4 ">Inicia Sesion</button>
           <a class="btn btn-primary mb-4 ml-2" href="formulario_registro.php">Registrarse</a>
          </div>
        </form>
        <?php borrar_sesiones();  ?>
      </div>
    </div>
  </div>
</section>
<?php require_once 'includes/footer.php';  ?>
