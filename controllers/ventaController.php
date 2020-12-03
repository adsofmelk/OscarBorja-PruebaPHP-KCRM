<?php

  require_once("models/productoModel.php");

  if( isset($_GET['accion']) ){

    switch($_GET['accion']){

      case 'nuevaventa':
        $producto = new ProductoModel();
        $datos['productos']=$producto->getProductos();

        require("views/venta/form_nuevaventa_view.phtml");
        break;

      case 'guardarnuevaventa':
        $producto = new ProductoModel();
        $temp = $producto->getProducto($_POST['idproducto']);
        $temp['stock'] -= $_POST['cantidadventa'];

        if($temp['stock'] >=0 ){

          $producto->updateProductoStock($temp);

          header("Location: index.php?controller=producto");

        }else{

          $datos["mensajeerror"] = "No hay stock suficiente para el producto solicitado";
          $datos['productos']=$producto->getProductos();

          require("views/venta/form_nuevaventa_view.phtml");
        }


        break;

    }

  }else{

    header("Location: index.php?controller=producto");

  }



?>
