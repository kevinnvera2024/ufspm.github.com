<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Verificar si se ha recibido el parámetro 'id' en el formulario
        if (isset($_POST['id']) && isset($_GET['legajo'])) {
            $id = $_POST['id'];              // ID del promedio a eliminar
            $legajo = $_GET['legajo'];       // Legajo tomado de la URL

            // Conectar a la base de datos
            $db = new PDO('sqlite:cadetes.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Eliminar el registro del promedio académico
            $stmt = $db->prepare("DELETE FROM promedios_academicos WHERE id = :id AND legajo = :legajo");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
            $stmt->execute();

            // Redirigir a la página de visualización del cadete
            header('Location: ver_cadete.php?legajo=' . $legajo);
            exit;
        } else {
            echo "Faltan los parámetros necesarios para eliminar el promedio.";
        }
    } catch (PDOException $e) {
        echo "Error al eliminar el promedio académico: " . $e->getMessage();
    }
}
?>