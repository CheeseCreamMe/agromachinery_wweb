<?php
if ($peticionAjax) {
    require_once "../../app/model/maquinariaModelo.php";
} else {
    require_once "./app/model/maquinariaModelo.php";
}
class maquinariaController extends maquinariaModel
{
    public function consultarMaquinariaController()
    {

        try {
            $jsonMaquinaria = self::obtenerJsonMaquinaria(); //code...

        } catch (\Throwable $th) {
            $jsonMaquinaria[] = array(
                'codigo' => '000',
                'nombre' => 'no hay nada aqui',
                'precio' => '00',
                'descripcion' => 'no hay productos registrados',
                'imagen' => './public/images/productos/default.png',
            );
        }
        return $jsonMaquinaria;
    }

    public function buscarPorMarca($valor)
    {
        try {
            $jsonMaquinaria = self::buscarProductoPorMarcaJson($valor);
        } catch (\Throwable $th) {
            $jsonMaquinaria[] = array(
                'codigo' => '000',
                'nombre' => 'Ocurrio un error',
                'precio' => '00',
                'descripcion' => 'no hay productos rque coincidan',
                'imagen' => './public/images/productos/default.png',
            ); //throw $th;
        }
    
        if (empty($jsonMaquinaria[0])) {
            // Agregar objeto con imagen por defecto si el arreglo está vacío
            $jsonMaquinaria[] = array(

                    
                    'codigo' => '000',
                    'nombre' => 'no hay coincidencias',
                    'precio' => '00',
                    'descripcion' => 'no hay productos rque coincidan',
                    'imagen' => './public/images/productos/default.png'
            );
        }
    
        return $jsonMaquinaria;
    }
}