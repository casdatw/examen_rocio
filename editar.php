<?php
require_once("conexion.php");

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    
    // Obtener medicamento a editar
    $consulta = "SELECT * FROM medicamentos WHERE ID = ?";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute([$id]);
    $medicamento = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['actualizar'])) {
    $id = $_POST['ID'];
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];  // Nuevo campo para stock

    // Actualizar medicamento
    $consulta = "UPDATE medicamentos SET nombre = ?, stock = ? WHERE ID = ?";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute([$nombre, $stock, $id]);

    echo "¡Medicamento actualizado exitosamente!";

    header("Location: index.php");
    exit();
}
?>
<head>
<link rel="stylesheet" href="estilos.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Formulario de edición -->
<form action="editar.php?ID=<?php echo $medicamento['ID']; ?>" method="post">
    <input type="hidden" name="ID" value="<?php echo $medicamento['ID']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $medicamento['nombre']; ?>" required><br>
    Stock: <input type="number" name="stock" value="<?php echo $medicamento['stock']; ?>" required><br>  <!-- Campo para stock -->
    <button type="submit" name="actualizar">Actualizar Medicamento</button>
</form>
</head>