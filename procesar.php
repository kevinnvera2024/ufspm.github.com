<?php
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        if ($accion == 'cadetes') {
            // Redirigir a la página de cadetes
            header('Location: lista_cadetes.php');
            exit;
        } elseif ($accion == 'personal') {
            // Redirigir a la página de personal
            header('Location: personal/lista_personal.php');
            exit;
        }
    } else {
        // Si no se seleccionó una opción, redirigir a una página de error o de inicio
        header('Location: index.php');
        exit;
    }
?>