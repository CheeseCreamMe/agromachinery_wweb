<?php
if($peticionAjax)
{
    require_once "../../app/model/maquinariaModelo.php";
}
else
{
    require_once "./app/model/maquinariaModelo.php";
}
class maquinariaController extends maquinariaModel
{
    public function consultarMaquinariaController()
    {

        try {
            $jsonCtaegorias = self::obtenerJsonMaquinaria(); //code...

        } catch (\Throwable $th) {
            $jsonCtaegorias = "no hay categorias registradas"; //throw $th;
        }
        return $jsonCtaegorias;
    }


}