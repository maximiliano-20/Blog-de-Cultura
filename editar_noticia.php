<?php session_start(); ?>
<?php require_once 'db/conexion.php'; ?>
<?php require_once 'funciones/funciones.php';  ?>
<?php require_once 'includes/menu.php';  ?>


  
<?php $noticia_actual=ver_noticia($conexion,$_GET['id'])?>

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="mt-2 mb-4">Edita tu Noticia</h2>
        <?php if (isset($_SESSION['completo'])): ?>
        <div id="info" class="alert alert-success text-center">
          <?=$_SESSION['completo']?>
        </div>
      <?php endif; ?>
        <form action="actualizar_noticia.php?id=<?=$noticia_actual['id']?>" method="POST" class="row" enctype="multipart/form-data" >
          <div class="col-md-9">
            <input type="text" class="form-control mb-5" name="titulo" id="" placeholder="Titulo" value="<?=$noticia_actual['titulo']?>">
            <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'titulo') : ''  ?>
          </div>
          <div class="col-md-9">
            <textarea name="contenido" class="form-control mb-4" placeholder="Escribe El Contenido..."><?=$noticia_actual['contenido'] ?></textarea>
            <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'contenido') : ''  ?>
          </div>
          <div class="col-md-9">
            <?php $categorias=categorias($conexion);?>
            <select class="form-control mb-5" name="categoria">
            <?php while ($categoria = mysqli_fetch_array($categorias)) : ?>
              <option value="<?=$categoria['id']?>"<?=$categoria['id']== $noticia_actual['categoria_id'] ? 'selected="selected"' : '' ?>>
                <?=$categoria['categoria']?>
                </option>
            <?php endwhile; ?>  
            </select>
          </div>
          <div class="col-md-9">
            <img width="120" class="img-fluid ml-3" src="imagenes/<?=$noticia_actual['imagen']?>">
            <input placeholder="Imagen" class="form-control mb-5" type="file" name="imagen">
          <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'imagen') : ''  ?>
          </div>
          <div class="col-lg-12">
            <button class="btn btn-primary mb-3 ">Actualizar</button>
          </div>
        </form>
        <?php borrar_sesiones();  ?>
      </div>
    </div>
  </div>
</section>
<?php require_once 'includes/footer.php';  ?>
  

