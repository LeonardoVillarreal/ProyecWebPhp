<?php
//Incluir la conexion en la base de datos
require "../config/Conexion.php";
 
class Articulos {
    public function __construct() {
        
    }
        
    //Implementar un método para insertar registros
    public function insertar($idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen){
        $sql = "INSERT INTO articulo (idcategoria,codigo,nombre,stock,descripcion,imagen,condicion) "
                . "VALUES('$idcategoria','$codigo','$nombre','$stock','$descripcion','$imagen','1')";
        return ejecutarConsulta($sql);
    }
    
    //Implementar un método para actualizar registros
    public function actualizar($id,$idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen){
        $sql = "UPDATE articulo SET idcategoria='$idcategoria',codigo='$codigo',nombre='$nombre', "
                . "stock='$stock',descripcion='$descripcion',imagen='$imagen' WHERE idarticulo='$id'";
        return ejecutarConsulta($sql);
    }
    
    //Implementar un método para mostrar un registro
    public function mostrar($id){
        $sql = "SELECT * FROM articulo WHERE idarticulo='$id'";
        return ejecutarConsultaSimpleFila($sql);
    }
    
    //Método para desactivar una categoría
    public function desactivar($id){
        $sql = "UPDATE articulo SET condicion='0' WHERE idarticulo='$id'";
        return ejecutarConsulta($sql);
    }
    
    //Método para activar una categoría
    public function activar($id){
        $sql = "UPDATE articulo SET condicion='1' WHERE idarticulo='$id'";
        return ejecutarConsulta($sql);
    }
    
    //Implementar un método para listar todos los registros
    public function listar(){
        $sql = "SELECT a.idarticulo, a.idcategoria,c.nombre as categoria, a.codigo,a.nombre,a.stock,a.descripcion,a.imagen,a.condicion FROM articulo a inner join categoria c on a.idcategoria=c.idcategoria";
        return ejecutarConsulta($sql);
    }
}
