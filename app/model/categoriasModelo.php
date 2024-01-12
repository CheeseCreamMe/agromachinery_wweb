<?php
require_once "./core/connection/connecction.php";

class categoriasModel extends connection{
    public function obtenerCategorias(){
        $tabla = "categorias";
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