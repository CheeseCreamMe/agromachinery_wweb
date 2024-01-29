<?php
if ($peticionAjax) {
    require_once "../connection/connecction.php";
} else {
    require_once "./core/connection/connecction.php";
}
class maquinariaModel extends connection
{
    protected function obtenerJsonMaquinaria()
    {
        $tabla = 'producto';
        $datosTabla = self::consultarTodo($tabla);
        $json = array();
        foreach ($datosTabla as $maquina) {
            $json[] = array(
                'codigo' => $maquina['id'],
                'nombre' => $maquina['nombre'],
                'precio' => $maquina['precio'],
                'descuento' => $maquina['precio_descuento'],
                'descripcion' => $maquina['descripcion'],
                'marca' => $maquina['marca_id'],
                'categoria' => $maquina['categoria_id'],
                'imagen' => $maquina['imagen'],
            );
        }
        return $json;
    }

    protected function onbtenerJsonMaquienariaUnFiltro($valor)
    {
        $respuesta = self::Cn()->prepare("
            SELECT pm.id, pm.nombre, pm.precio, pm.descripcion, pm.imagen, cm.nombre as categoria_nombre
            FROM producto_maquinaria pm
            JOIN categoria_producto cp ON pm.id = cp.producto_id
            JOIN categoria_maquinaria cm ON cp.categoria_id = cm.id
            WHERE cm.id =" . $valor);
        $respuesta->execute();
        $rows = $respuesta->fetchAll(PDO::FETCH_ASSOC);
    
        $json = [];
        foreach ($rows as $maquina) {
            $json[] = array (
                'codigo' => $maquina['id'],
                'nombre' => $maquina['nombre'],
                'precio' => $maquina['precio'],
                'descripcion' => $maquina['descripcion'],
                'imagen' => $maquina['imagen'],
                'categoria_nombre' => $maquina['categoria_nombre'],
            );
        }
    
        return $json;
    }
}