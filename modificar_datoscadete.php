<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Cadete</title>
    <style> 
        /* Estilos para el formulario en modificar_datoscadete.php */
form {
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
    color: #333;
}

form input[type="text"],
form input[type="number"],
form input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

form button {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form button:hover {
    background-color: #45a049;
}

/* Mensaje de éxito o error */
.success, .error {
    margin: 15px 0;
    padding: 10px;
    border-radius: 5px;
}

.success {
    color: #4CAF50;
    background-color: #e7f5e6;
    border: 1px solid #4CAF50;
}

.error {
    color: #d9534f;
    background-color: #f9d6d5;
    border: 1px solid #d9534f;
}

    </style>
</head>
<body>
    <!-- Código de la página -->
</body>
</html>

<?php
// Conexión y obtención de datos del cadete
$legajo = $_GET['legajo'];
try {
    $db = new PDO('sqlite:cadetes.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare("SELECT * FROM cadetes WHERE legajo = :legajo");
    $stmt->bindParam(':legajo', $legajo);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        die("Cadete no encontrado.");
    }
} catch (Exception $e) {
    die('Error al conectar con la base de datos: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recogida de datos del formulario
    $nombre = $_POST['nombre'];
    $anio = $_POST['anio'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $domicilio = $_POST['domicilio'];
    $telefono = $_POST['telefono'];
    $tatuajes_visibles = $_POST['tatuajes_visibles'];
    $ubicacion_tatuaje = $_POST['ubicacion_tatuaje'];

    // Actualización en la base de datos
    $updateStmt = $db->prepare("UPDATE cadetes SET nombre = :nombre, anio = :anio, dni = :dni, correo = :correo, domicilio = :domicilio, telefono = :telefono, tatuajes_visibles = :tatuajes_visibles, ubicacion_tatuaje = :ubicacion_tatuaje WHERE legajo = :legajo");
    $updateStmt->bindParam(':nombre', $nombre);
    $updateStmt->bindParam(':anio', $anio);
    $updateStmt->bindParam(':dni', $dni);
    $updateStmt->bindParam(':correo', $correo);
    $updateStmt->bindParam(':domicilio', $domicilio);
    $updateStmt->bindParam(':telefono', $telefono);
    $updateStmt->bindParam(':tatuajes_visibles', $tatuajes_visibles);
    $updateStmt->bindParam(':ubicacion_tatuaje', $ubicacion_tatuaje);
    $updateStmt->bindParam(':legajo', $legajo);

    if ($updateStmt->execute()) {
        // Redirección a la página de ver_cadete.php
        header("Location: ver_cadete.php?legajo=" . urlencode($legajo));
        exit();
    } else {
        echo "Error al actualizar los datos.";
    }
}
?>

<h1>Modificar Datos del Cadete</h1>
<form method="post" action="">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>">

    <label for="anio">Año:</label>
    <input type="number" name="anio" id="anio" value="<?php echo htmlspecialchars($row['anio']); ?>">

    <label for="dni">DNI:</label>
    <input type="text" name="dni" id="dni" value="<?php echo htmlspecialchars($row['dni']); ?>">

    <label for="correo">Correo:</label>
    <input type="email" name="correo" id="correo" value="<?php echo htmlspecialchars($row['correo']); ?>">

    <label for="domicilio">Domicilio:</label>
    <input type="text" name="domicilio" id="domicilio" value="<?php echo htmlspecialchars($row['domicilio']); ?>">

    <label for="telefono">Número de Teléfono:</label>
    <input type="text" name="telefono" id="telefono" value="<?php echo htmlspecialchars($row['telefono']); ?>">

    <label for="tatuajes_visibles">Tatuajes visibles:</label>
    <input type="text" name="tatuajes_visibles" id="tatuajes_visibles" value="<?php echo htmlspecialchars($row['tatuajes_visibles']); ?>">

    <label for="ubicacion_tatuaje">Ubicación del tatuaje:</label>
    <input type="text" name="ubicacion_tatuaje" id="ubicacion_tatuaje" value="<?php echo htmlspecialchars($row['ubicacion_tatuaje']); ?>">

    <button type="submit">Guardar Cambios</button>
</form>

</body>
</html>