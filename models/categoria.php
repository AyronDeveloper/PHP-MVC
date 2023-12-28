<?php
class Categoria{
    private $id;
    private $nombre;
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

    function setNombre($nombre){
        $this->nombre=$this->db->real_escape_string($nombre);
    }
    function getNombre(){
        return $this->nombre;
    }

    function setImagen($imagen){
        $this->imagen=$imagen;
    }
    function getImagen(){
        return $this->imagen;
    }

    public function getAll(){
        $categorias=$this->db->query("SELECT * FROM tb_categorias ORDER BY id desc");
        return $categorias;
    }

    public function save(){
        $sql = "INSERT INTO tb_categorias VAlUES(null,'{$this->getNombre()}','null'); ";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result=true;
        }
        return $result;
    }

}