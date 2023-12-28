<?php
require_once("./models/pedido.php");
class pedidoController{
    public function hacer(){
        require_once("views/pedido/hacer.php");
    }

    public function add(){
        date_default_timezone_set('America/Lima');
        //var_dump($_SESSION["identity"]);
        //var_dump($_POST);
        $stats=Utils::statsCarrito();
        if(isset($_SESSION["identity"])){
            $pedido=new Pedido();
            $pedido->setUsuarioId($_SESSION["identity"]->id);
            $pedido->setProvincia($_POST["provincia"]);
            $pedido->setLocalidad($_POST["localidad"]);
            $pedido->setDireccion($_POST["direccion"]);
            $pedido->setCoste($stats["total"]);
            $pedido->setFecha(date("Y-m-d"));
            $pedido->setHora(date("H:i:s"));
            
            $save=$pedido->save();
            $saveLinea=$pedido->saveLinea();
            if($save && $saveLinea){
                $_SESSION["pedido"]="completed";
            }else{
                $_SESSION["pedido"]="failed";
            }

            header("Location: ".base_url."pedido/confirmado");

        }else{
            header("Location: ".base_url);
        }
    }

    public function confirmado(){
        if(isset($_SESSION["identity"])){
            $identity=$_SESSION["identity"];

            $pedido= new Pedido();
            $pedido->setUsuarioId($identity->id);
            $pedido=$pedido->showUser()->fetch_object();

            $pedidoProducto=new Pedido();
            $pedidoProducto=$pedidoProducto->showProductoPedidos($pedido->id);
        }
        require_once("views/pedido/confirmado.php");
    }

    public function misPedidos(){
        Utils::isIdentity();
        $usuario_id=$_SESSION["identity"]->id;

        $pedido=new Pedido();
        $pedido->setUsuarioId($usuario_id);
        $pedidos=$pedido->showAllUser();

        require_once("views/pedido/misPedidos.php");
    }

    public function detalle($id=null){
        Utils::isIdentity();
        if($id==null){
            header("Location: ".base_url."pedido/misPedidos");
        }
        $pedido=new Pedido();
        $pedido->setId($id);
        $pedido=$pedido->show()->fetch_object();

        $pedidoProducto=new Pedido();
        $pedidoProductos=$pedidoProducto->showProductoPedidos($pedido->id);

        require_once("views/pedido/detalle.php");
    }

    public function gestion(){
        Utils::isAdmin();
        $gestion=true;
        $pedido=new Pedido();
        $pedidos=$pedido->showAll();
        require_once("./views/pedido/misPedidos.php");
    }

    public function estado(){
        Utils::isAdmin();
        if(isset($_POST)){
            var_dump($_POST);
            $id=$_POST["pedido_id"];
            $pedido= new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($_POST["estado"]);

            $pedido->updateEstado();
            header("Location:".base_url."pedido/detalle/$id");
        }else{
            header("Location: ".base_url);
        }
    }
}