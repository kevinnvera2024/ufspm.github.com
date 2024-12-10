<?php
try {
    // Conexión a la base de datos SQLite
    $db = new PDO('sqlite:cadetes.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si el método es POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $legajo = $_POST['legajo'];

        // Eliminar la distinción correspondiente en la base de datos
        $stmt = $db->prepare("DELETE FROM distinciones WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redireccionar de nuevo a la página del cadete
        header("Location: ver_cadete.php?legajo=" . htmlspecialchars($legajo));
        exit;
    }
} catch (PDOException $e) {
    echo "Error al eliminar la distinción: " . $e->getMessage();
}
?>