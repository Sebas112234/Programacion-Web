<?php
require 'db.php';
$id = $_GET['id'] ?? null;
if (!$id) { header('Location: index.php'); exit; }

$stmt = $pdo->prepare("SELECT p.*, s.nombre AS seccion, t.nombre AS tipo
                       FROM personajes p
                       LEFT JOIN secciones s ON p.seccion_id = s.id
                       LEFT JOIN tipos t ON p.tipo_id = t.id
                       WHERE p.id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch();
if (!$p) { header('Location: index.php'); exit; }
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($p['nombre']); ?> - Ficha</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark navbar-fixed">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Menu</a>
  </div>
</nav>

<div class="container mt-5 pt-3">
  <div class="row">
    <div class="col-md-4">
      <?php if ($p['foto'] && file_exists(__DIR__ . '/assets/img/uploads/' . $p['foto'])): ?>
        <img src="assets/img/uploads/<?php echo htmlspecialchars($p['foto']); ?>" class="img-fluid rounded" alt="">
      <?php else: ?>
        <img src="assets/img/banner.jpg" class="img-fluid rounded" alt="">
      <?php endif; ?>
    </div>
    <div class="col-md-8">
      <h2><?php echo htmlspecialchars($p['nombre']); ?></h2>
      <p><strong>Sección:</strong> <?php echo htmlspecialchars($p['seccion']); ?></p>
      <p><strong>Tipo:</strong> <?php echo htmlspecialchars($p['tipo']); ?></p>
      <p><?php echo nl2br(htmlspecialchars($p['descripcion'])); ?></p>

      <a href="edit.php?id=<?php echo $p['id']; ?>" class="btn btn-warning">Editar</a>
      <button class="btn btn-danger" onclick="confirmarEliminar('<?php echo addslashes($p['nombre']); ?>', 'delete.php?id=<?php echo $p['id']; ?>')">Eliminar</button>
      <a href="index.php" class="btn btn-secondary">Volver</a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
