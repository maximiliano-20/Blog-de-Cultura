  
  <?php require_once 'db/conexion.php';  ?>
  <?php require_once 'funciones/funciones.php';  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
<header class="navigation">
  <nav class="navbar navbar-expand-lg navbar-light">
    <h3 class="text-secondary">Cultura</h3>
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navogation"
      aria-controls="navogation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navogation">
      <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="index.php">Inicio</a>
        </li>

         <?php if (!isset($_SESSION['usuario'])) : ?>
          <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="formulario_login.php">Inicia Sesion</a>
         </li>
          <?php else : ?> 
          <li class="nav-item dropdown">
          <a  class="nav-link text-uppercase text-dark dropdown-toggle" href="#" id="navbarDropdown"
            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-user mr-1 "></i>
          <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellido']?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="formulario_noticia.php">Crear Noticias</a>
            <a class="dropdown-item" href="formulario_categoria.php">Crear Categorias</a>
            <a class="dropdown-item" href="datos.php">Mis Datos</a>
            <a class="dropdown-item" href="cerrar.php">Cerrar Sesion</a>
          </div>
        </li>
      <?php endif; ?>
          <li class="nav-item dropdown">
          <a class="nav-link text-uppercase text-dark dropdown-toggle" href="#" id="navbarDropdown"
            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorias
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <?php $categorias=categorias($conexion);?>
           <?php while ($categoria = mysqli_fetch_array($categorias)) : ?>
            <a class="dropdown-item" href="ver_categoria.php?id=<?=$categoria['id']?>"><?=$categoria['categoria']?></a>
          <?php endwhile; ?>
          </div>
        </li>
      </ul>
      <form method="POST" action="buscar.php" class="form-inline position-relative ml-lg-4">
        <input class="form-control px-0 w-100" type="search" placeholder="Buscar..." name="busqueda">
        <button class="search-icon"><i class="ti-search text-dark"></i></button>
      </form>
    </div>
  </nav>
</header>
