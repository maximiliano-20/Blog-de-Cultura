<?php session_start(); ?>
<?php require_once 'funciones/funciones.php';  ?>
<?php require_once 'includes/menu.php';  ?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="mt-2 mb-4">Registrar Usuario</h2>
        <?php if (isset($_SESSION['completo'])): ?>
        <div class="alert alert-success text-center">
          <?=$_SESSION['completo']?>
        </div>
      <?php endif; ?>
        <form action="registro.php" method="POST" class="row">
          <div class="col-lg-6">
            <input type="text" class="form-control mb-5" name="nombre" id="" placeholder="Nombre">
           <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'nombre') : ''  ?>
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control mb-5" name="apellido" id="" placeholder="Apellido">
            <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'apellido') : ''  ?>
          </div>
          <div class="col-lg-6">
            <input type="email" class="form-control mb-5" name="email" id="" placeholder="Email">
         <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'email') : ''  ?>
          </div>
         <div class="col-lg-6">
            <input type="password" class="form-control mb-5" name="password" id="" placeholder="Contraseña">
          <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'password') : ''  ?>
          </div>
          <div class="col-lg-8">
          <button  class="btn btn-primary mb-3  ">Registrar</button>
          </div>
        </form>
        <?php borrar_sesiones();  ?>
      </div>
    </div>
  </div>
</section>
<?php require_once 'includes/footer.php';  ?>
