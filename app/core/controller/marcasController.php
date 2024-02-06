<?php
if ($peticionAjax) {
    require_once "../../app/core/model/marcasModel.php";
} else {
    require_once "./app/core/model/marcasModel.php";
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
                'nombre' => $th,
            ); //throw $th;
        }
        return $jsonCtaegorias;
    }


}