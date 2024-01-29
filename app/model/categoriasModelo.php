<?php
if($peticionAjax)
{
    require_once "../connection/connecction.php";
}
else
{
require_once "./core/connection/connecction.php";
}
class categoriasModel extends connection{
    protected function obtenerJsonCategorias(){
        $tabla ='categoria';
        $datosTabla = self::consultarTodo($tabla);
        $json = array();
            foreach($datosTabla as $categoria)
            {
                $json[] = array(
                    'codigo' => $categoria['id'],
                    'nombre' => $categoria['nombre'],
                );
            }
        return $json;
    }
}