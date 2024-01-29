<?php
if ($peticionAjax) {
    require_once "../../app/model/marcaModelo.php";
} else {
    require_once "./app/model/marcaModelo.php";
}
class MarcaController extends MarcasModel
{
    public function consultarMarcasController()
    {

        try {
            $jsonCtaegorias = self::obtenerJsonMarcas(); //code...
        } catch (\Throwable $th) {
            $jsonCtaegorias[] = array(
                'codigo' => '0',
                'nombre' => 'parece no hay categorias registradas',
            ); //throw $th;
        }

        return $jsonCtaegorias;
    }


}