<?php
require_once("./models/producto.php");
class carritoController{

    public function index(){
        if(isset($_SESSION["carrito"])){
            $carrito=$_SESSION["carrito"];
        }
        require_once("views/carrito/index.php");
    }

    public function add($id){
        if(isset($_SESSION["carrito"])){
            $counter=0;
            foreach($_SESSION["carrito"] as $indice=>$elemento){
                if($elemento["id_producto"]==$id){
                    $_SESSION["carrito"][$indice]["unidades"]++;
                    $counter++;
                }
            }
        }

        if(!isset($counter) || $counter==0){
            $producto = new Producto();
            $producto->setId($id);
            $producto = $producto->show();
            var_dump($producto);

            if(is_object($producto)){
                while($prod=$producto->fetch_object()){
                    $_SESSION["carrito"][] = array(
                        "id_producto" => $prod->id,
                        "precio" => $prod->precio,
                        "unidades" => 1,
                        "producto" =>$prod
                    );
                }
            }
        }
            
        header("Location: ".base_url."carrito/index");
    }

    public function remove($indice=null){
        if($indice!=null){
            unset($_SESSION["carrito"][$indice]);
        }
        header("Location: ".base_url."carrito/index");
    }

    public function less($indice=null){
        if($indice!=null){
            $_SESSION["carrito"][$indice]["unidades"]--;
            if($_SESSION["carrito"][$indice]["unidades"]==0){
                unset($_SESSION["carrito"][$indice]);
            }
        }
        header("Location: ".base_url."carrito/index");
    }

    public function more($indice=null){
        if($indice!=null){
            $_SESSION["carrito"][$indice]["unidades"]++;
        }
        header("Location: ".base_url."carrito/index");
    }

    public function deleteAll(){
        unset($_SESSION["carrito"]);
        header("Location: ".base_url."carrito/index");
    }
}
