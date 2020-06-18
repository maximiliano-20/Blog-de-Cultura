<?php session_start(); ?>
<?php require_once 'db/conexion.php'; ?>
<?php require_once 'funciones/funciones.php';  ?>
<?php require_once 'includes/menu.php';  ?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="mt-2 mb-4">Crea tu Noticia</h2>
        <?php if (isset($_SESSION['completo'])): ?>
        <div class="alert alert-success text-center">
          <?=$_SESSION['completo']?>
        </div>
      <?php endif; ?>
        <form action="agregar_noticia.php" id="formulario" method="POST" class="row" enctype="multipart/form-data">
          <div class="col-md-9">
            <input type="text" class="form-control mb-5" name="titulo" id="" placeholder="Titulo">
            <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'titulo') : ''  ?>
          </div>
          <div class="col-md-9">
            <textarea name="contenido" class="form-control mb-4" placeholder="Escribe El Contenido..."></textarea>
            <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'contenido') : ''  ?>
          </div>
          <div class="col-md-9">
            <?php $categorias=categorias($conexion);?>
            <select class="form-control mb-5" name="categoria">
            <?php while ($categoria = mysqli_fetch_array($categorias)) : ?>
              <option value="<?=$categoria['id']?>"><?=$categoria['categoria']?></option>
            <?php endwhile; ?>  
            </select>
          </div>
          <div class="col-md-9">
            <input placeholder="Imagen" class="form-control mb-5" type="file" name="imagen">
          <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'],'imagen') : ''  ?>
          </div>
          <div class="col-lg-12">
            <button class="btn btn-primary mb-3 ">Agregar</button>
          </div>
        </form>
        <?php borrar_sesiones();  ?>
      </div>
    </div>
  </div>
</section>
<?php require_once 'includes/footer.php';  ?>
<script type="text/javascript">

  $(document).ready(function() { 

    $('#formulario').submit(function(){


     var formulario = $('#formulario');

       $.ajax({

           type : 'POST',
           url : formulario.attr('action'),
           data : formulario.serialize(),
           beforeSend : function(){
              console.log('Enviando');
           },

           success : function(respuesta){
            console.log(respuesta)
           },
           error : function(){
            console.log('Error');
           },
           timeout : 20000
       });
    });
  });

</script>
