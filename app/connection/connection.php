<?php
if ($peticionAjax) {
    require_once "../../app/connection/bdValues.php";

} else {
    require_once "./app/connection/bdValues.php ";
}

class connection
{

    public function connect()
    {
        $enlace = new PDO(SGBD, USER, PASSWORD);
        return $enlace;
    }

    protected function limpiarCadena($cadena)
    {
        $valores_eliminar = array(
            "/<script>/i",
            "/<\/script>/i",
            "/select \* from/i",
            "/insert into/i",
            "/delete from/i",
            '/["\']/',
            "/<script type/i",
            "/<script src/i"
        );
        $cadena = trim($cadena);
        $cadena = preg_replace($valores_eliminar, "", $cadena);
        return $cadena;
    }
    

    protected function ejecutarConsultaSimple($sql)
    {
        $respuesta = self::connect()->prepare($sql);
        $respuesta->execute();
        return $respuesta->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function ejecutarSelectTemplate($tabla)
    {
        $respuesta = self::connect()->prepare("SELECT * FROM " . $tabla);
        $respuesta->execute();
        return $respuesta->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function crearJSonTemplateProductos($datos)
    {

        $json = array();
        foreach ($datos as $elemento) {
            $imagen = $elemento["imagen"] ? $elemento["imagen"] : "./app/resources/images/productos/default-product-image.jpg";

            $json[] = array(
                'codigo' => $elemento['id'],
                'nombre' => $elemento['nombre'],
                'precio' => $elemento['precio'],
                'descuento' => $elemento['precio_descuento'],
                'descripcion' => $elemento['descripcion'],
                'marca' => $elemento['marca'],
                'categoria' => $elemento['categoria'], 
                'imagen' => $imagen,
                'inventario' => $elemento['inventario'] 
            );
        }
        return $json;

    }

    protected function crearJSonTemplateMarca($datos)
    {
        $json = array();
        foreach ($datos as $categoria) {
            $json[] = array(
                'codigo' => $categoria['id'],
                'nombre' => $categoria['nombre'],
                'imagen' => $categoria['imagen'],
            );
        }
        return $json;
    }
    protected function crearJSonTemplateCategoria($datos)
    {
    }

}