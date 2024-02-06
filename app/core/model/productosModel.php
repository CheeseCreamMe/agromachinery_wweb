<?php
if($peticionAjax)
{
    require_once "../../app/connection/connection.php";
}
else
{
require_once "./app/connection/connecction.php";
}

class productosModelo extends connection {

    protected function agregarProducto($producto)
    {}

    protected function obtenerAgricolaTabla(){
            $consulta = "SELECT p.id, p.nombre, p.precio, p.descripcion, p.precio_descuento, p.imagen, p.inventario, c.nombre AS categoria, m.nombre AS marca
            FROM producto p
            INNER JOIN categoria c ON p.categoria_id = c.id
            INNER JOIN marca m ON p.marca_id = m.id
            WHERE c.nombre = 'Agricola'";
        $tabla = self::ejecutarConsultaSimple($consulta);
        return $tabla;
    }
    protected function obtenerMaquinariaTabla(){
        $consulta = "SELECT p.id, p.nombre, p.precio, p.descripcion, p.precio_descuento, p.imagen, p.inventario, c.nombre AS categoria, m.nombre AS marca
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id
        WHERE c.nombre = 'Maquinaria';";
        $tabla = self::ejecutarConsultaSimple($consulta);
        return $tabla;
    }
    protected function obtenerVeterinariaTabla(){}
    protected function obtenerFiltradoMarcaTabla(){}

    protected function eliminarProductoId($id){}

    protected function editarProducto($id){}
}