<?php
require 'db.php';

// Obtener opciones de selects
$secciones = $pdo->query("SELECT * FROM secciones")->fetchAll();
$tipos = $pdo->query("SELECT * FROM tipos")->fetchAll();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $seccion_id = $_POST['seccion_id'] ?: null;
    $tipo_id = $_POST['tipo_id'] ?: null;
    $descripcion = trim($_POST['descripcion'] ?? '');

    // Validación mínima
    if ($nombre === '') $errors[] = "Nombre es obligatorio.";

    // Manejo de imagen
    $foto_nombre = null;
    if (!empty($_FILES['foto']['name'])) {
        $up = $_FILES['foto'];
        $ext = pathinfo($up['name'], PATHINFO_EXTENSION);
        $foto_nombre = uniqid() . '.' . $ext;
        $dest = __DIR__ . '/assets/img/uploads/' . $foto_nombre;
        if (!move_uploaded_file($up['tmp_name'], $dest)) {
            $errors[] = "Error subiendo la imagen.";
        }
    }

    if (empty($errors)) {
        $sql = "INSERT INTO personajes (nombre, seccion_id, tipo_id, descripcion, foto) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $seccion_id, $tipo_id, $descripcion, $foto_nombre]);
        header("Location: index.php");
        exit;
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crear Personaje - WikiZenless</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark navbar-fixed">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Menu</a>
    <div class="d-flex">
      <a class="nav-link text-light" href="create.php">Crear</a>
    </div>
  </div>
</nav>

<div class="container mt-5 pt-3">
  <h3>Crear personaje</h3>

  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $err) echo "<div>" . htmlspecialchars($err) . "</div>"; ?>
    </div>
  <?php endif; ?>

  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Nombre</label>
      <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Sección</label>
        <select name="seccion_id" class="form-select">
          <option value="">-- Seleccionar --</option>
          <?php foreach ($secciones as $s): ?>
            <option value="<?php echo $s['id']; ?>"><?php echo htmlspecialchars($s['nombre']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Tipo</label>
        <select name="tipo_id" class="form-select">
          <option value="">-- Seleccionar --</option>
          <?php foreach ($tipos as $t): ?>
            <option value="<?php echo $t['id']; ?>"><?php echo htmlspecialchars($t['nombre']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <textarea name="descripcion" class="form-control" rows="6"></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Foto (opcional)</label>
      <input type="file" name="foto" accept="image/*" class="form-control">
    </div>

    <button class="btn btn-primary">Guardar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
