<?php

function respuesta($response) {

    if (!$response) {
        echo 'Error al consumir el servicio web';
    } else {

        //$decodedText= substr($response,3, strlen($response)-1);
        $obj = json_decode($response);
        echo '<ul>';
        foreach ($obj as $value) {
            echo "<li>".$value."</li>";
        }
        echo '</ul>';
    }
}
?>
