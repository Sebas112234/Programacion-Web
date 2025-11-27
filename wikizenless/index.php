<?php
require 'db.php';

$stmt = $pdo->query("SELECT p.*, s.nombre AS seccion, t.nombre AS tipo
                     FROM personajes p
                     LEFT JOIN secciones s ON p.seccion_id = s.id
                     LEFT JOIN tipos t ON p.tipo_id = t.id
                     ORDER BY p.creado DESC");
$personajes = $stmt->fetchAll();
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WikiZenless</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- Toolbar fija -->
<nav class="navbar navbar-dark bg-dark navbar-fixed">
  <div class="container-fluid">
    <a class="navbar-brand fs-4" href="#">Menu</a>
    <div class="d-flex">
      <a class="nav-link text-light fs-4 me-3" href="create.php">Crear</a>


      
    </div>
  </div>
</nav>

<!-- Portada / Banner -->
<div class="header-banner" style="background-image: url('assets/img/banner.jpg');">
  <div class="header-title">WikiZenless</div>
</div>

<!-- Contenido -->
<div class="container container-cards mt-4">
  <div class="row">
    <?php foreach ($personajes as $p): ?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card card-custom shadow-sm">
          <?php if ($p['foto'] && file_exists(__DIR__ . '/assets/img/uploads/' . $p['foto'])): ?>
            <img src="assets/img/uploads/<?php echo htmlspecialchars($p['foto']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($p['nombre']); ?>">
          <?php else: ?>
            <img src="assets/img/banner.jpg" class="card-img-top" alt="placeholder">
          <?php endif; ?>
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($p['nombre']); ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($p['seccion'] . ' • ' . $p['tipo']); ?></h6>
            <p class="card-text" style="height: 90px; overflow: hidden;"><?php echo nl2br(htmlspecialchars($p['descripcion'])); ?></p>
            <a href="view.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-primary">Ver</a>
            <a href="edit.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
            <button onclick="confirmarEliminar('<?php echo addslashes($p['nombre']); ?>', 'delete.php?id=<?php echo $p['id']; ?>')" class="btn btn-sm btn-danger">Eliminar</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
