<?php

  class productoModel{

    private $con;

    public function __construct(){

      $this->con=Conexion::getConexion();

    }

    public function getProductos(){

      $stmt=$this->con->prepare("select p.*, c.nombre as nombrecategoria
                                from producto as p
                                inner join categoria as c
                                on c.idcategoria = p.categoria_idcategoria;"
                                );
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getProducto($id){

      $stmt=$this->con->prepare("select p.*, c.nombre as nombrecategoria
                                from producto  as p
                                inner join categoria as c
                                on c.idcategoria = p.categoria_idcategoria
                                where p.idproducto = ?");
      $stmt->bindParam(1,$id);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function deleteProducto($id){
      try{
        $stmt=$this->con->prepare("delete from producto where idproducto = ?");
        $stmt->bindParam(1,$id);
        $stmt->execute();
        return ;

      }catch (PDOException $e){

        echo $e->getMessage();

      }

    }


    public function saveNewProducto($datos){
      try {

        $stmt=$this->con->prepare("insert into producto (nombre, referencia , precio, stock, categoria_idcategoria) values ( ?,?,?,?,?)");

        $stmt->bindParam(1, $datos['nombre']);
        $stmt->bindParam(2, $datos['referencia']);
        $stmt->bindParam(3, $datos['precio']);
        $stmt->bindParam(4, $datos['stock']);
        $stmt->bindParam(5, $datos['categoria_idcategoria']);

        $stmt->execute();

      } catch (PDOException $e) {
        echo $e->getMessage();

      }

    }

    public function guardarActualizacionProducto($datos){

      try {

        $stmt=$this->con->prepare("update producto set nombre = ?,  referencia =?, precio = ?, stock = ?, categoria_idcategoria = ? where idproducto = ?");

        $stmt->bindParam(1, $datos['nombre']);
        $stmt->bindParam(2, $datos['referencia']);
        $stmt->bindParam(3, $datos['precio']);
        $stmt->bindParam(4, $datos['stock']);
        $stmt->bindParam(5, $datos['categoria_idcategoria']);
        $stmt->bindParam(6, $datos['idproducto']);

        $stmt->execute();


      } catch (PDOException $e) {
        echo $e->getMessage();
      }

    }

    public function updateProductoStock($datos){
      try {

        $stmt=$this->con->prepare("update producto set stock = ?, fechaultimaventa = now() where idproducto = ?");

        $stmt->bindParam(1, $datos['stock']);
        $stmt->bindParam(2, $datos['idproducto']);
        $stmt->execute();

      } catch (PDOException $e) {
        echo $e->getMessage();

      }

    }

  }
?>
