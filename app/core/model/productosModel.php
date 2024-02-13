<?php
if ($peticionAjax) {
    require_once "../../app/connection/connection.php";
} else {
    require_once "./app/connection/connecction.php";
}

class productosModelo extends connection
{

    protected function buscarProducto($id)
    {
        $productoId = self::limpiarCadena($id);
        $consulta = "SELECT p.id, p.nombre, p.precio, p.descripcion, p.precio_descuento, p.imagen, p.inventario, c.nombre AS categoria, m.nombre AS marca
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id
        WHERE p.id = " . $productoId . ";";
        $producto = self::ejecutarConsultaSimple($consulta);
        return $producto;
    }
    protected function agregarProducto($producto)
    {
        $sql = "INSERT INTO producto (nombre, precio, descripcion, precio_descuento, imagen, inventario, categoria_id, marca_id)
                VALUES (:nombre, :precio, :descripcion, :precio_descuento, :imagen, :inventario, :categoria_id, :marca_id)";
        
        try {
            $resultado = self::connect()->prepare($sql);
            $resultado->bindParam(':nombre', $producto['nombre']);
            $resultado->bindParam(':precio', $producto['precio']); 
            $resultado->bindParam(':descripcion', $producto['descripcion']);
            $resultado->bindParam(':precio_descuento', $producto['descuento']);
            $resultado->bindParam(':imagen', $producto['rutaImagen']);
            $resultado->bindParam(':inventario', $producto['inventario']);
            $resultado->bindParam(':categoria_id', $producto['categoria']);
            $resultado->bindParam(':marca_id', $producto['marca']);
            $resultado->execute();
    
            // Verificar si la consulta afectó alguna fila
            $filas_afectadas = $resultado->rowCount();
            
            return ($filas_afectadas > 0) ? "Producto '{$producto['nombre']}' agregado" : "Error al agregar el producto";
        } catch(PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    

    protected function obtenerTablaDeTodosLosProductos()
    {
        $consulta = "SELECT p.id, p.nombre, p.precio, p.descripcion, p.precio_descuento, p.imagen, p.inventario, c.nombre AS categoria, m.nombre AS marca
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id";
        $tabla = self::ejecutarConsultaSimple($consulta);
        return $tabla;
    }

    protected function obtenerPorCategoria($categoria)
    {
        $consulta = "SELECT p.id, p.nombre, p.precio, p.descripcion, p.precio_descuento, p.imagen, p.inventario, c.nombre AS categoria, m.nombre AS marca
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id
        WHERE c.nombre = '" . $categoria . "'";
        $tabla = self::ejecutarConsultaSimple($consulta);
        return $tabla;
    }

    protected function obtenerFiltradoMarcaTabla($marca)
    {
        $marcaId = self::limpiarCadena($marca);
        $consulta = "SELECT p.id, p.nombre, p.precio, p.descripcion, p.precio_descuento, p.imagen, p.inventario, c.nombre AS categoria, m.nombre AS marca
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id
        WHERE m.id = " . $marcaId . ";";
        $tabla = self::ejecutarConsultaSimple($consulta);
        return $tabla;
    }

    protected function eliminarProductoId($id)
    {
        $productoId = self::limpiarCadena($id);
        $consulta = "DELETE FROM producto WHERE id = " . $productoId;
        $respuesta = self::ejecutarConsultaSimple($consulta);
        
        if ($respuesta > 0) {
            return  array(
                "title" => "Eliminado",
                "text" => "Se eliminó correctamente el producto con ID: " . $productoId,
                "icon" => "success"
            );
        } else {
            return array(
                "title" => "Error",
                "text" => "No se pudo eliminar el producto con ID: " . $productoId,
                "icon" => "error"
            );
        }
    }
    
    protected function editarProducto($id, $precio, $precio_descuento, $descripcion, $imagen_ruta, $nombre, $inventario)
    {
        $productoId = self::limpiarCadena($id);
        $new_precio_descuento = $precio;
        $new_nombre = self::limpiarCadena($nombre);
        $new_inventario = self::limpiarCadena($inventario);
        $new_imagen_ruta = $imagen_ruta;
        $new_descripcion = self::limpiarCadena($descripcion);
    }
}