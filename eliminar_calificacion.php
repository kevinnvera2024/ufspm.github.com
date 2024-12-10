<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $legajo = $_POST['legajo'];
    $materia_id = $_POST['materia_id'];

    try {
        $db = new PDO('sqlite:cadetes.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Preparar la consulta para eliminar la calificación
        $deleteQuery = "DELETE FROM calificaciones WHERE legajo = :legajo AND materia_id = :materia_id";
        $deleteStmt = $db->prepare($deleteQuery);
        $deleteStmt->bindParam(':legajo', $legajo);
        $deleteStmt->bindParam(':materia_id', $materia_id);
        $deleteStmt->execute();

        // Redireccionar de vuelta a la página de detalles
        header("Location: ver_cadete.php?legajo=" . $legajo);
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $db = null; // Cerrar la conexión
    }
} else {
    echo "Método de solicitud no válido.";
}
?>