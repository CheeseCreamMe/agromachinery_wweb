<?php
$rutaDestino = "../../app/resources/images/marca/";
$respuesta;
if(isset($_FILES['imagen'])){
    $file_name = uniqid() . "_Marca_" . $_FILES['imagen']['name']; 
    $file_tmp = $_FILES['imagen']['tmp_name']; 
    $file_destino = $rutaDestino . $file_name; 
    
    if(move_uploaded_file($file_tmp, $file_destino)){
       $respuesta  = $file_destino;
    } else {
        $respuesta = "No se ha guardado la imagen";
    }
}
echo $respuesta;