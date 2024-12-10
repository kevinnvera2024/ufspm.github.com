<?php
// eliminar_sumario.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && isset($_POST['legajo'])) {
        $id = $_POST['id'];
        $legajo = $_POST['legajo'];

        try {
            $db = new PDO('sqlite:cadetes.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Elimina el sumario de la base de datos
            $stmt = $db->prepare("DELETE FROM sumarios WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Redirigir a ver_cadete.php con el legajo
            header("Location: ver_cadete.php?legajo=" . urlencode($legajo));
            exit; // Asegúrate de usar exit después de la redirección
        } catch (PDOException $e) {
            echo "Error al eliminar el sumario: " . $e->getMessage();
        }
    } else {
        die("El legajo o el id no están definidos.");
    }
} else {
    die("Método no permitido.");
}
?>