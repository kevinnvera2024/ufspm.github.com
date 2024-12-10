<?php
try {
    // Conexión a la base de datos SQLite
    $db = new PDO('sqlite:cadetes.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si el método es POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $distincion_texto = $_POST['distincion_texto'];
        $fecha = $_POST['fecha'];
        $legajo = $_GET['legajo'];

        // Insertar la nueva distinción en la base de datos
        $stmt = $db->prepare("INSERT INTO distinciones (legajo, distincion_texto, fecha) VALUES (:legajo, :distincion_texto, :fecha)");
        $stmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
        $stmt->bindParam(':distincion_texto', $distincion_texto, PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->execute();

        // Redireccionar de nuevo a la página del cadete
        header("Location: ver_cadete.php?legajo=" . htmlspecialchars($legajo));
        exit;
    }
} catch (PDOException $e) {
    echo "Error al agregar la distinción: " . $e->getMessage();
}
?>