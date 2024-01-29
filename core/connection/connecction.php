<?php
if ($peticionAjax) {
    require_once "../connection/bdValues.php";
} else {
    require_once "./core/connection/bdValues.php";
}
class connection
{

    protected function Cn()
    {
        $enlace = new PDO(SGBD, USER, PASSWORD);
        return $enlace;
    }


    protected function limpiarCadena($cadena)
    {
        $valores_elimiar = array(
            "<scipt>",
            "</script>",
            "select * from",
            "SELECT * FROM",
            "INSERT INTO",
            "insert into",
            "DELETE FROM",
            "delete from",
            '"',
            "'",
            "<script type",
            "<script src"
        );
        $cadena = trim($cadena);
        $cadena = preg_replace($valores_elimiar, "", $cadena);
        return $cadena;
    }

    public function consultarTodo($tabla)
    {
        $respuesta = self::Cn()->prepare("SELECT * FROM " . $tabla);
        $respuesta->execute();
        return $respuesta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function consultaPerzonlaizada($sql)
    {
        $respuesta = self::Cn()->prepare($sql);
        $respuesta->execute();
        return $respuesta->fetchAll(PDO::FETCH_ASSOC);
    }

}
