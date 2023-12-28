<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="<?=base_url?>asset/css/style.css">
</head>
<body>
    <div id="container">
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>asset/img/camiseta.png" alt="">
                <a href="./">Tienda Online</a>
            </div>
        </header>
        <?php $categorias=Utils::showCategorias()?>
        <nav id="menu">
            <ul>
                <li><a href="<?=base_url?>">Inicio</a></li>
                <?php while($cate=$categorias->fetch_object()):?>
                    <li><a href="<?=base_url?>producto/categoria/<?=$cate->id?>"><?=$cate->nombre?></a></li>
                <?php endwhile;?>
            </ul>
        </nav>
        <div id="content">