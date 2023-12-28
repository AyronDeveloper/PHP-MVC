<?php
class Pedido{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

        
    public function __construct(){
        $this->db=Database::connect();
    }

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }

    public function setUsuarioId($usuario_id){
        $this->usuario_id=$usuario_id;
    }
    public function getUsuarioId(){
        return $this->usuario_id;
    }

    public function setProvincia($provincia){
        $this->provincia=$this->db->real_escape_string($provincia);
    }
    public function getProvincia(){
        return $this->provincia;
    }

    public function setLocalidad($localidad){
        $this->localidad=$this->db->real_escape_string($localidad);
    }
    public function getLocalidad(){
        return $this->localidad;
    }

    public function setDireccion($direccion){
        $this->direccion=$this->db->real_escape_string($direccion);
    }
    public function getDireccion(){
        return $this->direccion;
    }

    public function setCoste($coste){
        $this->coste=$coste;
    }
    public function getCoste(){
        return $this->coste;
    }

    public function setEstado($estado){
        $this->estado=$estado;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function getFecha(){
        return $this->fecha;
    }

    public function setHora($hora){
        $this->hora=$hora;
    }
    public function getHora(){
        return $this->hora;
    }

    public function save(){
        $sql="INSERT INTO tb_pedidos VALUES (NULL,{$this->getUsuarioId()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirm','{$this->getFecha()}','{$this->getHora()}');";
        $save=$this->db->query($sql);
        
        $result=false;
        if($save){
            $result=true;
        }
        return $result;
    }

    public function saveLinea(){
        $sql="SELECT LAST_INSERT_ID() AS 'pedido';";
        $query=$this->db->query($sql);
        $pedidoId=$query->fetch_object()->pedido;

        foreach($_SESSION["carrito"] as $elemento){
            $producto=$elemento["producto"];
            $insert="INSERT INTO tb_lineas_pedidos VALUES(null,{$pedidoId},{$producto->id},{$elemento['unidades']});";

            $save=$this->db->query($insert);
        }

            $result=false;
            if($save){
                $result=true;
            }
            return $result;
    }

    public function showAll(){
        $pedido=$this->db->query("SELECT * FROM tb_pedidos");
        return $pedido;
    }

    public function show(){
        $pedido=$this->db->query("SELECT * FROM tb_pedidos WHERE id={$this->getId()}");
        return $pedido;
    }

    public function showUser(){
        $sql="SELECT p.id, p.coste
        FROM tb_pedidos p
        WHERE p.usuario_id={$this->getUsuarioId()} ORDER BY id DESC LIMIT 1";

        $pedido=$this->db->query($sql);
        return $pedido;
    }

    public function showProductoPedidos($pedido_id){
        /*$sql="SELECT * FROM tb_productos WHERE id IN
        (SELECT producto_id FROM tb_lineas_pedidos WHERE pedido_id={$pedido_id})";*/

        $sql="SELECT pr.*, lp.unidades FROM tb_productos pr
        JOIN tb_lineas_pedidos lp ON pr.id=lp.producto_id
        WHERE lp.pedido_id={$pedido_id}";
        
        $productos=$this->db->query($sql);
        return $productos;
    }

    public function showAllUser(){
        $sql="SELECT p.* FROM tb_pedidos p WHERE p.usuario_id={$this->getUsuarioId()} ORDER BY id DESC";

        $pedido=$this->db->query($sql);
        return $pedido;
    }
    
    public function updateEstado(){
        $sql="UPDATE tb_pedidos SET estado='{$this->getEstado()}' WHERE id='{$this->getId()}'";
        $update=$this->db->query($sql);

        $result=false;
        if($update){
            $result=true;
        }
        return $result;
    }
}