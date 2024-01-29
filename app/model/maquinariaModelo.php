<?php
if ($peticionAjax) {
    require_once "../connection/connecction.php";
} else {
    require_once "./core/connection/connecction.php";
}
class maquinariaModel extends connection
{
    protected function obtenerJsonVeterinaria()
    {
        $consulta = "SELECT p.*, c.nombre AS categoria_nombre, m.nombre AS marca_nombre
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id
        WHERE c.nombre = 'veterinaria';";

        $datosTabla = $this->consultaPerzonlaizada($consulta);
        $json = array();
        foreach ($datosTabla as $productoVeterinaria) {
            $json[] = array(
                'codigo' => $productoVeterinaria['id'],
                'nombre' => $productoVeterinaria['nombre'],
                'precio' => $productoVeterinaria['precio'],
                'descuento' => $productoVeterinaria['precio_descuento'],
                'descripcion' => $productoVeterinaria['descripcion'],
                'marca' => $productoVeterinaria['marca_id'],
                'categoria' => $$productoVeterinaria['categoria_id'],
                'imagen' => $productoVeterinaria['imagen'],
            );
        }
        return $json;
    }

    protected function obtenerJsonAgricola()
    {
        $consulta = "SELECT p.*, c.nombre AS categoria_nombre, m.nombre AS marca_nombre
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id
        WHERE c.nombre = 'Agrícola';";

        $datosTabla = $this->consultaPerzonlaizada($consulta);
        $json = array();
        foreach ($datosTabla as $productoAgricola) {
            $json[] = array(
                'codigo' => $productoAgricola['id'],
                'nombre' => $productoAgricola['nombre'],
                'precio' => $productoAgricola['precio'],
                'descuento' => $productoAgricola['precio_descuento'],
                'descripcion' => $productoAgricola['descripcion'],
                'marca' => $productoAgricola['marca_id'],
                'categoria' => $productoAgricola['categoria_id'],
                'imagen' => $productoAgricola['imagen'],
            );
        }
        return $json;
    }

    protected function obtenerJsonMaquinaria()
    {
        $consulta = "SELECT p.*, c.nombre AS categoria_nombre, m.nombre AS marca_nombre
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id
        WHERE c.nombre = 'Maquinaria';";

        $datosTabla = $this->consultaPerzonlaizada($consulta);
        $json = array();
        foreach ($datosTabla as $productoMaquinaria) {
            $json[] = array(
                'codigo' => $productoMaquinaria['id'],
                'nombre' => $productoMaquinaria['nombre'],
                'precio' => $productoMaquinaria['precio'],
                'descuento' => $productoMaquinaria['precio_descuento'],
                'descripcion' => $productoMaquinaria['descripcion'],
                'marca' => $productoMaquinaria['marca_id'],
                'categoria' => $productoMaquinaria['categoria_id'],
                'imagen' => $productoMaquinaria['imagen'],
            );
        }
        return $json;
    } 
    protected function obtenerJsonTodosLosProductos()
    {
        $tabla = 'producto';
        $datosTabla = self::consultarTodo($tabla);
        $json = array();
        foreach ($datosTabla as $producto) {
            $json[] = array(
                'codigo' => $producto['id'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'descuento' => $producto['precio_descuento'],
                'descripcion' => $producto['descripcion'],
                'marca' => $producto['marca_id'],
                'categoria' => $producto['categoria_id'],
                'imagen' => $producto['imagen'],
            );
        }
        return $json;
    }
    protected function buscarProductoPorMarcaJson($valor)
    {
        $respuesta = self::Cn()->prepare("
        SELECT p.*, c.nombre AS categoria, m.nombre AS marca
        FROM producto p
        INNER JOIN categoria c ON p.categoria_id = c.id
        INNER JOIN marca m ON p.marca_id = m.id
        WHERE m.id = :valor;");
        $respuesta->bindParam(':valor', $valor);
        $respuesta->execute();
        $rows = $respuesta->fetchAll(PDO::FETCH_ASSOC);
    
        $json = [];
        foreach ($rows as $producto) {
            $json[] = array (
                'codigo' => $producto['id'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'precio_descuento' => $producto['precio_descuento'],
                'descripcion' => $producto['descripcion'],
                'imagen' => $producto['imagen'],
                'categoria' => $producto['categoria'],
                'marca' => $producto['marca'],
            );
        }
    
        return $json;
    }

    
}