<?php
if($peticionAjax)
{
    require_once "../connection/connecction.php";
}
else
{
require_once "./core/connection/connecction.php";
}
class maquinariaModel extends connection{
    protected function obtenerJsonMaquinaria(){
        $tabla ='producto_maquinaria';
        $datosTabla = self::consultarTodo($tabla);
        $json = array();
            foreach($datosTabla as $categoria)
            {
                $json[] = array(
                    'codigo' => $categoria['id'],
                    'nombre' => $categoria['nombre'],
                    'precio' => $categoria['precio'],
                    'descripcion' => $categoria['descripcion'],
                    'imagen' => $categoria['imagen'],
                );
            }
        return $json;
    }
}