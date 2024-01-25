<?php
if ($peticionAjax) {
    require_once "../../app/model/categoriasModelo.php";
} else {
    require_once "./app/model/categoriasModelo.php";
}
class categoriaController extends categoriasModel
{
    public function consultarCategoriasController()
    {

        try {
            $jsonCtaegorias = self::obtenerJsonCategorias(); //code...
        } catch (\Throwable $th) {
            $jsonCtaegorias[] = array(
                'codigo' => '0',
                'nombre' => 'parece no hay categorias registradas',
            ); //throw $th;
        }

        return $jsonCtaegorias;
    }


}