<?php
require_once("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Borrar medicamento
    $consulta = "DELETE FROM medicamentos WHERE id = ?";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute([$id]);

    // Redirigir a la página principal (index.php)
    header("Location: index.php");
    exit();  // Asegúrate de que el script termine después de la redirección
}
?>
<head>
<link rel="stylesheet" href="estilos.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>