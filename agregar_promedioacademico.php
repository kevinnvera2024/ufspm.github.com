<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Capturar el legajo desde la URL
        if (isset($_GET['legajo'])) {
            $legajo = $_GET['legajo'];
        } else {
            // Si no se encuentra el legajo en la URL, se muestra un mensaje de error
            echo "El legajo no está definido.";
            exit;
        }

        $promedio = $_POST['promedio'];

        // Conectar a la base de datos
        $db = new PDO('sqlite:cadetes.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insertar o actualizar el promedio académico
        $stmt = $db->prepare("INSERT INTO promedios_academicos (legajo, promedio, fecha) VALUES (:legajo, :promedio, DATETIME('now'))");
        $stmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
        $stmt->bindParam(':promedio', $promedio, PDO::PARAM_STR);
        $stmt->execute();

        // Redirigir a la página de visualización del cadete
        header('Location: ver_cadete.php?legajo=' . $legajo);
        exit;
    } catch (PDOException $e) {
        echo "Error al agregar el promedio académico: " . $e->getMessage();
    }
}
?>