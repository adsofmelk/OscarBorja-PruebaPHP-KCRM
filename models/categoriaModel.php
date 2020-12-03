<?php

  class categoriaModel{

    private $con;

    public function __construct(){

      $this->con=Conexion::getConexion();

    }

    public function getCategorias(){

      $stmt=$this->con->prepare("select * from categoria;");
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

  }
?>
