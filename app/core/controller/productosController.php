<?php
if ($peticionAjax) {
    require_once "../../app/core/model/productosModel.php";
} else {
    require_once "./app/core/model/productosModel.php";
}

class productoController extends productosModelo
{
    public function agregarProductoController()
    {
        $nombre = self::limpiarCadena($_POST['nombre']);
        $precio = $_POST['precio'];
        $descuento = $_POST['precio_descuento'];
        $descripcion = self::limpiarCadena($_POST['descripcion']);
        $inventario = $_POST['inventario'];
        $categoria = $_POST['categoria'];
        $marca = $_POST['marca'];
        $rutaImagen = $_POST['imagen'];
    
        $data = [
            "nombre" => $nombre,
            "precio" => $precio,
            "descuento" => $descuento,
            "descripcion" => $descripcion,
            "inventario" => $inventario,
            "categoria" => $categoria,
            "marca" => $marca,
            "rutaImagen" => $rutaImagen
        ];
        
        $bd_response = self::agregarProducto($data);
        return $bd_response;
    }
    public function obtenerJsonProductos($categoria)
    {
        switch ($categoria) {
            case 'Maquinaria':
                $datos = $this->obtenerJsonProductosPorCategoria($categoria);
                break;
            case 'Agricola':
                $datos = $this->obtenerJsonProductosPorCategoria($categoria);
            case 'Veterinaria':
                $datos = $this->obtenerJsonProductosPorCategoria($categoria);
                break;
            case 'Todos':
                $datos = $this->obtenerJsonProductosDefault();
                break;
        }
        return $datos;
    }
    private function obtenerJsonProductosPorCategoria($categoria)
    {
        try {
            $datos = self::obtenerPorCategoria($categoria);
            $tabla = self::crearJSonTemplateProductos($datos);
        } catch (\Throwable $th) {
            $tabla = array();
            $tabla[] = array(
                'codigo' => "0",
                'nombre' => "no hay productos",
                'precio' => "0000",
                'descuento' => "0000",
                'imagen' => "./public/images/banner_home.jpg",
            );
        }
        return $tabla;
    }
    private function obtenerJsonProductosDefault()
    {
        try {
            $datos = self::obtenerTablaDeTodosLosProductos();
            $tabla = self::crearJSonTemplateProductos($datos);
        } catch (\Throwable $th) {
            $tabla = array();
            $tabla[] = array(
                'codigo' => "0",
                'nombre' => "no hay productos",
                'precio' => "0000",
                'descuento' => "0000",
                'imagen' => "./public/images/banner_home.jpg",
            );
        }
        return $tabla;
    }

    public function eliminarProductoServidor($id)
    {
        try {
            $respuesta = self::eliminarProductoId($id);
        } catch (\Throwable $th) {
            $respuesta = false;
        }
        return $respuesta;
    }
}