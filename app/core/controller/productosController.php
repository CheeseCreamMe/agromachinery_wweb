<?php
if ($peticionAjax) {
    require_once "../../app/core/model/productosModel.php";
} else {
    require_once "./app/core/model/productosModel.php";
}

class productoController extends productosModelo
{
    public function obtenerJsonProductos($categoria)
    {
        switch ($categoria) {
            case 'Maquinaria':
                $datos = $this->obtenerJsonMaquinaria();
                break;
            case 'Agricola':
                $datos = $this->obtenerJsonAgricola();
                break;
        }
        return $datos;
    }
    private function obtenerJsonAgricola()
    {
        try {
            $datos = self::obtenerAgricolaTabla();
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
    private function obtenerJsonMaquinaria()
    {
        try {
            $datos = self::obtenerMaquinariaTabla();
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
}