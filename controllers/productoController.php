<?php

  require_once("models/productoModel.php");
  require_once("models/categoriaModel.php");
  if( isset($_GET['accion']) ){

    switch($_GET['accion']){

      case 'crearproducto':
        $categorias = new CategoriaModel();
        $datos['categorias'] = $categorias->getCategorias();

        require("views/producto/form_crearproducto_view.phtml");
        break;

      case 'guardarnuevoproducto':
        $producto = new ProductoModel();
        $producto->saveNewProducto($_POST);

        $datos=$producto->getProductos();
        require_once("views/producto/productos_view.phtml");
        break;

      case 'verproducto':

        $producto = new ProductoModel();
        $datos = $producto->getProducto($_GET['idproducto']);

        require_once("views/producto/producto_view.phtml");

        break;

      case 'borrarproducto':
        $producto = new ProductoModel();
        $datos = $producto->deleteProducto($_GET['idproducto']);

        $datos=$producto->getProductos();
        require_once("views/producto/productos_view.phtml");
        break;

      case 'actualizarproducto':
        $producto = new ProductoModel();
        $datos['producto'] = $producto->getProducto($_GET['idproducto']);

        $categorias = new CategoriaModel();
        $datos['categorias'] = $categorias->getCategorias();
        
        require("views/producto/form_actualizarproducto_view.phtml");
        break;

      case "guardaractializacionproducto":

        $producto = new ProductoModel();

        $producto->guardarActualizacionProducto($_POST);

        $datos=$producto->getProductos();
        require_once("views/producto/productos_view.phtml");
        break;

    }


  }else{

    $per=new productoModel();

    $datos=$per->getProductos();

    //Llamada a la vista
    require_once("views/producto/productos_view.phtml");

  }



?>
