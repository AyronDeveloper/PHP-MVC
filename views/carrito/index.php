<h1>Listado de carrito</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Eliminar</th>
    </tr>
    <?php if(isset($carrito)):?>
    <?php foreach($carrito as $indice=>$elemento):
        $producto=$elemento["producto"]?>
        <tr>
            <td>
                <img class="img_carrito" src="<?=base_url?>/uploads/images/<?=$producto->imagen?>" alt="">
            </td>
            <td><?=$producto->nombre?></td>
            <td>S/. <?=$elemento["precio"]?></td>
            <td>
                <?=$elemento["unidades"]?>
                <div class="updown-unidades">
                    <a href="<?=base_url?>carrito/less/<?=$indice?>" class="button">-</a>
                    <a href="<?=base_url?>carrito/more/<?=$indice?>" class="button">+</a>
                </div>
            </td>
            <td>
                <a href="<?=base_url?>carrito/remove/<?=$indice?>" class="button button-red">Eliminar</a>
            </td>
        </tr>
    <?php endforeach;?>
    <?php endif;?>
</table>
    <a href="<?=base_url?>carrito/deleteAll" class="button button-pedido button-red">Eliminar carrito</a>
<div class="total-carrito">
    <?php $stats=Utils::statsCarrito()?>
    <h3>Precio total: S/. <?=number_format($stats["total"],2) ?></h3>
    <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Realizar pedido</a>
</div>
