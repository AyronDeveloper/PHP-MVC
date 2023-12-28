<?php
require_once("./models/producto.php");
class productoController{
    public function index(){
        $producto= new Producto();
        $productos=$producto->getRandom(6);
        require_once("views/producto/destacados.php");
    }

    public function gestion(){
        Utils::isAdmin();
        $producto= new Producto();
        $productos=$producto->getAll();
        require_once("views/producto/gestion.php");
    }

    public function crear(){
        require_once("views/producto/crear.php");
    }

    public function categoria($id_cate){
        $producto= new Producto();
        $producto->setCategoriaId($id_cate);
        $productos=$producto->getProductoCategoria();
        require_once("views/producto/categoria.php");
    }

    public function ver($id){
        $producto= new Producto();
        $producto->setId($id);
        $productos=$producto->show();

        require_once("views/producto/ver.php");
    }

    public function save(){
        date_default_timezone_set('America/Lima');
        Utils::isAdmin();
        if(isset($_POST)){
            $productos= new Producto();
            $productos->setCategoriaId($_POST["categoria"]);
            $productos->setNombre($_POST["nombre"]);
            $productos->setDescripcion($_POST["descripcion"]);
            $productos->setPrecio($_POST["precio"]);
            $productos->setStock($_POST["stock"]);
            $productos->setFecha(date("Y-m-d H:i:s"));

            $file=$_FILES["imagen"];
            $filename=$_FILES["imagen"]["name"];
            $mimetype=$_FILES["imagen"]["type"];
            if($mimetype=="image/jpg" || $mimetype=="image/jpeg" || $mimetype=="image/png"  || $mimetype=="image/gif"){
                if(!is_dir("uploads/images")){
                    mkdir("uploads/images",0777,true);
                }
                move_uploaded_file($_FILES["imagen"]["tmp_name"],"uploads/images/".$filename);
                $productos->setImagen($filename);
            }

            $save=$productos->save();
            if($save){
                $_SESSION["producto"]="completed";
            }else{
                $_SESSION["producto"]="failed";
            }
        }else{
            $_SESSION["producto"]="failed";
        }
        header("Location: ".base_url."producto/gestion");
    }

    public function editar($id){
        Utils::isAdmin();
        if(!empty($id)){
            $productos= new Producto();
            $productos->setId($id);
            $producto=$productos->show();
        }
        require_once("views/producto/editar.php");
    }

    public function update(){
        Utils::isAdmin();
        if(isset($_POST)){

            $producto=new Producto();
            $producto->setId($_POST["id"]);
            $producto->setCategoriaId($_POST["categoria"]);
            $producto->setNombre($_POST["nombre"]);
            $producto->setDescripcion($_POST["descripcion"]);
            $producto->setPrecio($_POST["precio"]);
            $producto->setStock($_POST["stock"]);
    
            $update=$producto->update();
            if($update){
                $_SESSION["producto"]="completed";
            }else{
                $_SESSION["producto"]="failed";
            }
        }else{
            $_SESSION["producto"]="failed";
        }
        header("Location: ".base_url."producto/gestion");

    }

    public function delete($id){
        Utils::isAdmin();
        if(!empty($id)){
            $productos=new Producto();
            $productos->setId($id);

            $delete=$productos->delete();
            if($delete){
                $_SESSION["delete"]="completed";
            }else{
                $_SESSION["delete"]="failed";
            }
        }else{
            $_SESSION["delete"]="failed"; 
        }
        header("Location: ".base_url."producto/gestion");
    }
}