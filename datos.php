<?php session_start(); ?>
<?php require_once 'funciones/funciones.php';  ?>
<?php require_once 'includes/menu.php';  ?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="mt-2 mb-4">Usuario <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellido']?> </h2>
        <?php if (isset($_SESSION['completo'])): ?>
        <div class="alert alert-success text-center">
          <?=$_SESSION['completo']?>
        </div>
      <?php endif; ?>
        <form action="actualizar_usuario.php" method="POST" class="row">
          <div class="col-lg-6">
            <input type="text" class="form-control mb-5" name="nombre" id="" placeholder="Nombre" value="<?=$_SESSION['usuario']['nombre']?>">
           <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'nombre') : ''  ?>
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control mb-5" name="apellido" id="" placeholder="Apellido" value="<?=$_SESSION['usuario']['apellido']?>">
            <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'apellido') : ''  ?>
          </div>
          <div class="col-lg-6">
            <input type="email" class="form-control mb-5" name="email" id="" placeholder="Email" value="<?=$_SESSION['usuario']['email']?>">
         <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'email') : ''  ?>
          </div>
          <div class="col-lg-8">
          <button  class="btn btn-primary mb-3">Actualizar Usuario</button>
          </div>
        </form>
        <?php borrar_sesiones();  ?>
      </div>
    </div>
  </div>
</section>
<?php require_once 'includes/footer.php';  ?>
