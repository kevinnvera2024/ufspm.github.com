<?php
// eliminar_sancion.php

try {
    $db = new PDO('sqlite:cadetes.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['id']) && isset($_POST['legajo'])) {
        $id = $_POST['id'];
        $legajo = $_POST['legajo'];

        // Consulta para eliminar la sanción
        $stmt = $db->prepare("DELETE FROM sanciones WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redireccionar a la página de detalles del cadete
        header("Location: ver_cadete.php?legajo=" . urlencode($legajo)); // Cambia esto si tu archivo tiene otro nombre
        exit();
    } else {
        echo "Datos insuficientes para eliminar la sanción.";
    }
} catch (PDOException $e) {
    echo "Error al eliminar la sanción: " . $e->getMessage();
}