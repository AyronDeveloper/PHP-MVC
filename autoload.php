<?php 
function controller_autoload($classname){
    include "controller/".$classname.".php";
}
spl_autoload_register("controller_autoload");
?>