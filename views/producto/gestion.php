<h1>Gestion de Productos</h1>
<a href="<?=base_url?>producto/crear" class="button button-small">Agregar Producto</a>

<?php if(isset($_SESSION["producto"]) && $_SESSION["producto"]=="completed"):?>
    <strong class="alert_green">El producto se agrego correctamente</strong>
<?php elseif(isset($_SESSION["producto"]) && $_SESSION["producto"]=="failed"):?>
    <strong class="alert_red">No se puedo agregar el producto</strong>
<?php endif;?>
<?php Utils::deleteSession("producto")?>

<?php if(isset($_SESSION["delete"]) && $_SESSION["delete"]=="completed"):?>
    <strong class="alert_green">El producto se elimino correctamente</strong>
<?php elseif(isset($_SESSION["delete"]) && $_SESSION["delete"]=="failed"):?>
    <strong class="alert_red">No se puedo eliminar el producto</strong>
<?php endif;?>
<?php Utils::deleteSession("delete")?>
<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
    <?php while($prod=$productos->fetch_object()):?>
        <tr>
            <td><?=$prod->id?></td>
            <td><?=$prod->nombre?></td>
            <td><?=$prod->precio?></td>
            <td><?=$prod->stock?></td>
            <td>
                <a href="<?=base_url?>producto/editar/<?=$prod->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>producto/delete/<?=$prod->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile;?>
</table>