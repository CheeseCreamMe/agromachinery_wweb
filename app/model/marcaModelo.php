<?php
if($peticionAjax)
{
    require_once "../connection/connecction.php";
}
else
{
require_once "./core/connection/connecction.php";
}
class marcasModel extends connection{
    protected function obtenerJsonMarcas(){
        $tabla ='marca';
        $datosTabla = self::consultarTodo($tabla);
        $json = array();
            foreach($datosTabla as $categoria)
            {
                $json[] = array(
                    'codigo' => $categoria['id'],
                    'nombre' => $categoria['nombre'],
                    'imagen' => $categoria['imagen'],
                );
            }
        return $json;
    }
}