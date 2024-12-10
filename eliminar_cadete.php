<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
    try {
        $db = new PDO('sqlite:cadetes.db'); // Ajusta la ruta si es necesario
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Obtener el número de legajo del cadete a eliminar
        $legajo = $_POST['legajo'];
        
        // Preparar la consulta para eliminar el cadete
        $stmt = $db->prepare("DELETE FROM cadetes WHERE legajo = ?");
        $stmt->execute([$legajo]);

        // Redirigir de vuelta a la lista de cadetes
        header("Location: lista_cadetes.php"); // Ajusta la ruta a tu página principal
        exit();
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
?>