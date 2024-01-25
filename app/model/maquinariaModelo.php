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
            foreach($datosTabla as $maquina)
            {
                $json[] = array(
                    'codigo' => $maquina['id'],
                    'nombre' => $maquina['nombre'],
                    'precio' => $maquina['precio'],
                    'descripcion' => $maquina['descripcion'],
                    'imagen' => $maquina['imagen'],
                );
            }
        return $json;
    }
}