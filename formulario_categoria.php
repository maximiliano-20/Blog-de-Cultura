<?php session_start(); ?>
<?php require_once 'funciones/funciones.php';  ?>
<?php require_once 'includes/menu.php';  ?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="mt-2 mb-4">Crear Categorias</h2>
        <?php if (isset($_SESSION['completo'])): ?>
        <div class="alert alert-success text-center">
          <?=$_SESSION['completo']?>
        </div>
        <?php elseif (isset($_SESSION['error-general'])) : ?>
        <div class="alert alert-danger text-center">
          <?=$_SESSION['error-general']?>
        </div>
        <?php endif; ?>
        <form action="agregar_categoria.php" method="POST" class="row">
          <div class="col-lg-8">
            <input type="text" class="form-control mb-5" name="categoria" id="categoria" placeholder="Categoria">
            <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'categoria') : '' ?>
          </div>
          <div class="col-lg-12">
            <button class="btn btn-primary mb-3">Agregar</button>
          </div>
        </form>
        <?php borrar_sesiones();  ?>
      </div>
    </div>
  </div>
</section>
<?php require_once 'includes/footer.php';  ?>
