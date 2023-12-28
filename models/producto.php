<?php
class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;

    public function __construct(){
        $this->db=Database::connect();
    }

    function setId($id){
        $this->id=$id;
    }
    function getId(){
        return $this->id;
    }

    function setCategoriaId($categoria_id){
        $this->categoria_id=$this->db->real_escape_string($categoria_id);
    }
    function getCategoriaId(){
        return $this->categoria_id;
    }

    function setNombre($nombre){
        $this->nombre=$this->db->real_escape_string($nombre);
    }
    function getNombre(){
        return $this->nombre;
    }

    function setDescripcion($descripcion){
        $this->descripcion=$this->db->real_escape_string($descripcion);
    }
    function getDescripcion(){
        return $this->descripcion;
    }

    function setPrecio($precio){
        $this->precio=$this->db->real_escape_string($precio);
    }
    function getPrecio(){
        return $this->precio;
    }

    function setStock($stock){
        $this->stock=$this->db->real_escape_string($stock);
    }
    function getStock(){
        return $this->stock;
    }

    function setOferta($oferta){
        $this->oferta=$this->db->real_escape_string($oferta);
    }
    function getOferta(){
        return $this->oferta;
    }

    function setFecha($fecha){
        $this->fecha=$fecha;
    }
    function getFecha(){
        return $this->fecha;
    }

    function setImagen($imagen){
        $this->imagen=$imagen;
    }
    function getImagen(){
        return $this->imagen;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM tb_productos ORDER BY id DESC ");
        return $productos; 
    }

    public function getProductoCategoria(){
        $productos=$this->db->query("SELECT tb_productos.*, tb_categorias.nombre AS nombreCategoria 
        FROM tb_productos 
        JOIN tb_categorias ON tb_productos.categoria_id=tb_categorias.id
        WHERE tb_productos.categoria_id={$this->getCategoriaId()}");
        return $productos;
    }

    public function getRandom($limit){
        $productos=$this->db->query("SELECT * FROM tb_productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function save(){
        $sql="INSERT INTO tb_productos VALUES (null,'{$this->getCategoriaId()}','{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},'no','{$this->getFecha()}','{$this->getImagen()}')";
        $save=$this->db->query($sql);

        $result=false;
        if($save){
            $result=true;
        }
        return $result;
    }

    public function show(){
        $producto=$this->db->query("SELECT tb_productos.*, tb_categorias.nombre AS nombreCategoria 
        FROM tb_productos 
        JOIN tb_categorias ON tb_productos.categoria_id=tb_categorias.id
        WHERE tb_productos.id={$this->getId()}");
        return $producto;
    }

    public function update(){
        $sql="UPDATE tb_productos SET categoria_id={$this->getCategoriaId()},nombre='{$this->getNombre()}',descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()} WHERE id={$this->getId()}";
        $update=$this->db->query($sql);

        $result=false;
        if($update){
            $result=true;
        }
        return $result;
    }

    public function delete(){
        $sql="DELETE FROM tb_productos WHERE id={$this->getId()}";
        $delete=$this->db->query($sql);

        $result=false;
        if($delete){
            $result=true;
        }
        return $result;
    }
}