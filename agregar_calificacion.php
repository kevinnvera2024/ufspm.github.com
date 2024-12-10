<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $legajo = $_POST['legajo'];
    $materia_id = $_POST['materia_id'];
    $calificacion = $_POST['calificacion'];

    $maxRetries = 5;
    $retryCount = 0;

    while ($retryCount < $maxRetries) {
        try {
            $db = new PDO('sqlite:cadetes.db', null, null, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_TIMEOUT => 5 // Tiempo de espera
            ]);

            $db->exec('PRAGMA busy_timeout = 3000'); // Espera de 3 segundos
            $db->exec('PRAGMA journal_mode = DELETE'); // Cambiar modo de journal

            $db->beginTransaction(); // Iniciar la transacción

            // Consulta para verificar si ya existe una calificación para esta materia
            $checkQuery = "SELECT COUNT(*) FROM calificaciones WHERE legajo = :legajo AND materia_id = :materia_id";
            $checkStmt = $db->prepare($checkQuery);
            $checkStmt->bindParam(':legajo', $legajo);
            $checkStmt->bindParam(':materia_id', $materia_id);
            $checkStmt->execute();
            $exists = $checkStmt->fetchColumn() > 0;

            if ($exists) {
                // Actualizar la calificación si ya existe
                $updateQuery = "UPDATE calificaciones SET promedio = :calificacion WHERE legajo = :legajo AND materia_id = :materia_id";
                $updateStmt = $db->prepare($updateQuery);
                $updateStmt->bindParam(':calificacion', $calificacion);
                $updateStmt->bindParam(':legajo', $legajo);
                $updateStmt->bindParam(':materia_id', $materia_id);
                $updateStmt->execute();
            } else {
                // Insertar una nueva calificación
                $insertQuery = "INSERT INTO calificaciones (legajo, materia_id, promedio) VALUES (:legajo, :materia_id, :calificacion)";
                $insertStmt = $db->prepare($insertQuery);
                $insertStmt->bindParam(':legajo', $legajo);
                $insertStmt->bindParam(':materia_id', $materia_id);
                $insertStmt->bindParam(':calificacion', $calificacion);
                $insertStmt->execute();
            }

            $db->commit(); // Confirmar la transacción

            // Redireccionar de vuelta a la página de detalles
            header("Location: ver_cadete.php?legajo=" . $legajo);
            exit();
        } catch (PDOException $e) {
            $retryCount++;
            if ($retryCount == $maxRetries) {
                echo "Error: " . $e->getMessage();
            }
            sleep(1); // Esperar un segundo antes de reintentar
        } finally {
            // Cerrar la conexión
            $db = null;
        }
    }
} else {
    echo "Método de solicitud no válido.";
}
?>