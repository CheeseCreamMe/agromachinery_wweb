<?php
if($peticionAjax)
{
    require_once "../../app/connection/connection.php";
}
else
{
require_once "./app/connection/connecction.php";
}
class marcasModel extends connection{
    protected function obtenerJsonMarcas(){
        $tabla ='marca';
        $datosTabla = self::ejecutarSelectTemplate($tabla);
        return self::crearJSonTemplateMarca($datosTabla);
    }
}