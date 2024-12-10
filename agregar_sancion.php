<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si los campos requeridos están presentes
    if (!empty($_POST['sancion_texto']) && !empty($_POST['fecha']) && isset($_GET['legajo'])) {
        $sancion_texto = $_POST['sancion_texto'];
        $fecha = $_POST['fecha'];
        $legajo = intval($_GET['legajo']); // Asegurarse de que el legajo es un número entero

        try {
            $db = new PDO('sqlite:cadetes.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insertar la sanción en la base de datos
            $stmt = $db->prepare("INSERT INTO sanciones (legajo, sancion_texto, fecha) VALUES (:legajo, :sancion_texto, :fecha)");
            $stmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
            $stmt->bindParam(':sancion_texto', $sancion_texto, PDO::PARAM_STR);
            $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $stmt->execute();

            // Redirigir a la página de detalles del cadete tras agregar la sanción
            header("Location: ver_cadete.php?legajo=$legajo");
            exit;
        } catch (PDOException $e) {
            echo "Error al agregar la sanción: " . $e->getMessage();
        }
    } else {
        // Redirigir en caso de que falten datos
        header("Location: ver_cadete.php?legajo=" . $_GET['legajo'] . "&error=datos_insuficientes");
        exit;
    }
}
?>