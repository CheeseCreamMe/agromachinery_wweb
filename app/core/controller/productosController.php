<?php
require_once $peticionAjax ? "../../app/core/model/productosModel.php" : "./app/core/model/productosModel.php";

class ProductoController extends ProductosModelo
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

        return self::agregarProducto($data);
    }

    public function obtenerJsonProductos($categoria)
    {
        switch ($categoria) {
            case 'Maquinaria':
            case 'Agricola':
            case 'Veterinaria':
                $datos = $this->obtenerJsonProductosPorCategoria($categoria);
                break;
            case 'Todos':
                $datos = $this->obtenerJsonProductosDefault();
                break;
            default:
                $datos = [];
                break;
        }
        return $datos;
    }

    private function obtenerJsonProductosPorCategoria($categoria)
    {
        try {
            $datos = self::obtenerPorCategoria($categoria);
            return self::crearJSonTemplateProductos($datos);
        } catch (\Throwable $th) {
            return $this->handleError($th);
        }
    }

    private function obtenerJsonProductosDefault()
    {
        try {
            $datos = self::obtenerTablaDeTodosLosProductos();
            return self::crearJSonTemplateProductos($datos);
        } catch (\Throwable $th) {
            return $this->handleError($th);
        }
    }

    public function eliminarProductoServidor()
    {
        try {
            $id = $_POST['id'];
            return self::eliminarProductoId($id);
        } catch (\Throwable $th) {
            return $this->handleError($th);
        }
    }

    private function handleError($error)
    {
        return [
            "title" => "¡Ups!",
            "text" => "Parece que ha ocurrido un error ",
            "icon" => "error"
        ];
    }
}
