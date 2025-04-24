<?php
require_once("conexion.php");

if (isset($_POST['buscar'])) {
    $busqueda = $_POST['medicamento'];

    // Consulta para buscar medicamentos por nombre, incluyendo el stock
    $consulta = "SELECT * FROM medicamentos WHERE nombre LIKE ?";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute(["%$busqueda%"]);

    $medicamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($medicamentos) {
        // Agregar clases de Bootstrap para dar estilo a la tabla
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead><tr><th>Nombre</th><th>Stock</th><th>Acciones</th></tr></thead>";
        echo "<tbody>";
        foreach ($medicamentos as $medicamento) {
            echo "<tr>
                    <td>" . $medicamento['nombre'] . "</td>
                    <td>" . $medicamento['stock'] . "</td>
                    <td>
                        <a href='editar.php?ID=" . $medicamento['ID'] . "' class='btn btn-warning btn-sm'>Editar</a> |
                        <a href='borrar.php?ID=" . $medicamento['ID'] . "' class='btn btn-danger btn-sm'>Borrar</a>
                    </td>
                  </tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<div class='alert alert-warning'>No se encontraron medicamentos.</div>";
    }}
?>
<head>
<link rel="stylesheet" href="estilos.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Formulario de búsqueda -->
<form action="buscar.php" method="post">
    <input type="text" name="medicamento" placeholder="Buscar medicamento">
    <button type="submit" name="buscar">Buscar</button>
    <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary">Volver al Inicio</a>
        </div>
</form>
</head>