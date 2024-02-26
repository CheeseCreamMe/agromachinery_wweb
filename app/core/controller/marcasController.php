<?php
if ($peticionAjax) {
    require_once "../../app/core/model/marcasModel.php";
} else {
    require_once "./app/core/model/marcasModel.php";
}
class MarcaController extends MarcasModel
{
    public function agregarMarcaServidor()
    {

        $nombre = self::limpiarCadena($_POST['nombre']);
        $imagen = $_POST['imagen'];
        $categorias = $_POST['categorias'];

        sort($categorias);

        $bd_response = self::agregarMarcaModel($nombre,$imagen, $categorias);

        if($bd_response) {
            return "se ha agregado una nueva marca con nombre : {$nombre} y se han asignado las categorías correctamente.";
        }
        else {
            return "no se ha agregado la marca con nombre: {$nombre} ni se ha agregado los datos asignados a ella.";
        }
    }
    public function consultarMarcasControlller($categoria)
    {
        try{
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
    catch (\Throwable $th) {
        return "Error al obtener las marcas";
    }
    }

    public function eliminarMarcaServidor()
    {
        try {
            $id = $_POST['id'];
            $respuesta = self::eliminarMarcaModelo($id);
        } catch (\Throwable $th) {
            $respuesta = array(
                "title" => "¡Ups!",
                "text" => "Parece que no se ha podido eliminar el producto." . $th,
                "icon" => "error"
            );
        }
        return $respuesta;
    }
}