<?php
require 'db.php';
$id = $_GET['id'] ?? null;
if (!$id) { header('Location: index.php'); exit; }

// Obtener foto para eliminar archivo
$stmt = $pdo->prepare("SELECT foto FROM personajes WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();

if ($row) {
    // borrar registro
    $del = $pdo->prepare("DELETE FROM personajes WHERE id = ?");
    $del->execute([$id]);

    // borrar archivo si existe
    if ($row['foto'] && file_exists(__DIR__ . '/assets/img/uploads/' . $row['foto'])) {
        @unlink(__DIR__ . '/assets/img/uploads/' . $row['foto']);
    }
}

header('Location: index.php');
exit;
