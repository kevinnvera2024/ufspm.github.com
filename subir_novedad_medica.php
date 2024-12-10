<?php
// Verifica si el legajo está definido en la URL
if (isset($_GET['legajo'])) {
    $legajo = intval($_GET['legajo']);
} else {
    die("El legajo no está definido.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener la descripción
    $descripcion = $_POST['descripcion'];

    // Validar y mover el archivo subido
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = basename($_FILES['archivo']['name']);
        $destino = "uploads/" . $nombreArchivo;
        
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $destino)) {
            try {
                $db = new PDO('sqlite:cadetes.db');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Inserta la novedad médica en la base de datos
                $stmt = $db->prepare("INSERT INTO novedades_medicas (legajo, descripcion, nombre_archivo, fecha) VALUES (:legajo, :descripcion, :nombre_archivo, datetime('now'))");
                $stmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
                $stmt->bindParam(':descripcion', $descripcion);
                $stmt->bindParam(':nombre_archivo', $nombreArchivo);
                $stmt->execute();

                // Redirigir a la página del cadete
                header("Location: ver_cadete.php?legajo=" . $legajo);
                exit();
            } catch (PDOException $e) {
                echo "Error al subir la novedad médica: " . $e->getMessage();
            }
        } else {
            echo "Lo siento, hubo un error al subir su archivo.";
        }
    } else {
        echo "Por favor, seleccione un archivo válido.";
    }
}
?>