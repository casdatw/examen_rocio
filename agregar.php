<?php
require_once("conexion.php");

if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];  // Nuevo campo para el stock

    // Consulta para insertar un nuevo medicamento
    $consulta = "INSERT INTO medicamentos (nombre, stock) VALUES (?, ?)";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute([$nombre, $stock]);

    echo "¡Medicamento agregado exitosamente!";
}
?>
<head>
<link rel="stylesheet" href="estilos.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Formulario para agregar medicamento -->
<form action="agregar.php" method="post">
    Nombre: <input type="text" name="nombre" required><br>
    Stock: <input type="number" name="stock" required><br>  <!-- Campo para stock -->
    <button type="submit" name="agregar">Agregar Medicamento</button>
    <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary">Volver al Inicio</a>
        </div>
</form>
</head>