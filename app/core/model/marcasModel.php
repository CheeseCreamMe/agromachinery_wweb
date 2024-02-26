<?php
if ($peticionAjax) {
    require_once "../../app/connection/connection.php";
} else {
    require_once "./app/connection/connecction.php";
}
class marcasModel extends connection
{
    protected function agregarMarcaModel($nombreMarca, $imagenMarca, $categorias)
    {
        $conexion = self::connect();
        try {
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->beginTransaction();
            
            $stmtMarca = $conexion->prepare("INSERT INTO marca (nombre, imagen) VALUES (?, ?)");
            $stmtMarca->execute([$nombreMarca, $imagenMarca]);
            
            $marcaId = $conexion->lastInsertId();
            
            $stmtRelacion = $conexion->prepare("INSERT INTO marca_categoria (marca_id, categoria_id) VALUES (?, ?)");
            foreach ($categorias as $categoria) {
                $stmtRelacion->execute([$marcaId, $categoria]);
            }
    
            $conexion->commit();
            
            $conexion = null;
    
            return array('success' => true, 'message' => 'Marca agregada exitosamente'); // Éxito
        } catch (PDOException $e) {
            $conexion->rollBack();
            $conexion = null;
            return array('success' => false, 'message' => 'Error al agregar la marca: ' . $e->getMessage()); // Error
        }
    }
    
    protected function obtenerJsonTodasLasMarcas()
    {
        //todas las marcas
        $tabla = 'marca';
        $datosTabla = self::ejecutarSelectTemplate($tabla);
        return $datosTabla;
    }

    protected function obtenerJsonMarcaAgricola(){
        $sql = "SELECT marca.id, marca.nombre, marca.imagen
        FROM marca
        INNER JOIN marca_categoria ON marca.id = marca_categoria.marca_id
        INNER JOIN categoria ON marca_categoria.categoria_id = categoria.id
        WHERE categoria.id = 2;
        ";
        $lista = self::ejecutarConsultaSimple($sql);
        return $lista;
    }

    protected function obtenerJsonMarcasMaquinaria(){
        $sql = "SELECT marca.id, marca.nombre, marca.imagen
        FROM marca
        INNER JOIN marca_categoria ON marca.id = marca_categoria.marca_id
        INNER JOIN categoria ON marca_categoria.categoria_id = categoria.id
        WHERE categoria.id = 1;
        ";
        $lista = self::ejecutarConsultaSimple($sql);
        return $lista;
    }

    protected function obtenerJsonMarcasVeterinaria(){
        $sql = "SELECT marca.id, marca.nombre, marca.imagen
        FROM marca
        INNER JOIN marca_categoria ON marca.id = marca_categoria.marca_id
        INNER JOIN categoria ON marca_categoria.categoria_id = categoria.id
        WHERE categoria.id = 3;
        ";
        $lista = self::ejecutarConsultaSimple($sql);
        return $lista;
    }

    protected function eliminarMarcaModelo($id)
{
    $brandId = self::limpiarCadena($id);

    try {
        $conexion = self::connect();
        $conexion->beginTransaction();

        $stmt_relaciones = $conexion->prepare("DELETE FROM marca_categoria WHERE marca_id = ?");
        $stmt_relaciones->execute([$brandId]);

        $stmt_marca = $conexion->prepare("DELETE FROM marca WHERE id = ?");
        $stmt_marca->execute([$brandId]);

        $conexion->commit();

        return array(
            "title" => "Eliminado",
            "text" => "Se eliminó correctamente la marca con ID: " . $brandId,
            "icon" => "success"
        );
    } catch (PDOException $e) {
        // Si ocurre algún error, revertir la transacción
        $conexion->rollBack();
        return array(
            "title" => "Error",
            "text" => "No fue posible eliminar la marca con ID: " . $brandId . ". Error: " . $e->getMessage(),
            "icon" => "error"
        );
    }
}

}