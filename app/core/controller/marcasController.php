<?php
if ($peticionAjax) {
    require_once "../../app/core/model/marcasModel.php";
} else {
    require_once "./app/core/model/marcasModel.php";
}
class MarcaController extends MarcasModel
{
    public function consultarMarcasControlller($categoria)
    {
        switch ($categoria) {
            case 'Maquinaria':
                $lista = self::obtenerJsonMarcasMaquinaria();
                break;
            case 'Agricola':
                $lista = self::obtenerJsonMarcaAgricola();
                break;
            case 'Veterinaria':
                $lista = self::obtenerJsonMarcasVeterinaria();
                break;
            default:
                $lista = self::obtenerJsonTodasLasMarcas();
                break;
        }
        $json = self::crearJSonTemplateMarca($lista);
        return $json;
    }
}