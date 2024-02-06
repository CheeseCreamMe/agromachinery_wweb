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

    protected function buscarProducto($id)
    {
        $productoId = self::limpiarCadena($id);
        $consulta = "SELECT p.id, p.nombre, p.precio, p.descripcion, p.precio_descuento, p.imagen, p.inventario, c.nombre AS categoria, m.nombre AS marca
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id
        WHERE p.id = ".$productoId.";";
        $producto = self::ejecutarConsultaSimple($consulta);
        return $producto;
    }
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
    protected function obtenerVeterinariaTabla(){
        $consulta = "SELECT p.id, p.nombre, p.precio, p.descripcion, p.precio_descuento, p.imagen, p.inventario, c.nombre AS categoria, m.nombre AS marca
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id
        WHERE c.nombre = 'Veterinaria';";
        $tabla = self::ejecutarConsultaSimple($consulta);
        return $tabla;
    }
    protected function obtenerFiltradoMarcaTabla($marca){
        $marcaId = self::limpiarCadena($marca);
        $consulta = "SELECT p.id, p.nombre, p.precio, p.descripcion, p.precio_descuento, p.imagen, p.inventario, c.nombre AS categoria, m.nombre AS marca
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id
        WHERE m.id = ".$marcaId.";";
        $tabla = self::ejecutarConsultaSimple($consulta);
        return $tabla;
    }

    protected function eliminarProductoId($id){
        $productoId = self::limpiarCadena($id);
        $consulta = "DELETE p
        FROM producto p
        WHERE p.id = ".$productoId.";";
        $respuesta = self::ejecutarConsultaSimple($consulta);
        return $respuesta;
    }

    protected function editarProducto($id, $precio, $precio_descuento, $descripcion, $imagen_ruta,$nombre , $inventario){
        $productoId = self::limpiarCadena($id);
        $new_precio_descuento = $precio;
        $new_nombre = self::limpiarCadena($nombre);
        $new_inventario = self::limpiarCadena($inventario);
        $new_imagen_ruta = $imagen_ruta;
        $new_descripcion = self::limpiarCadena($descripcion);
    }
}