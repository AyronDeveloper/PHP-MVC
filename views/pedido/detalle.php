<h1>Detalle del Pedido</h1>
<?php if(isset($pedido)):?>
    <?php if(isset($_SESSION["admin"])):?>
        <h3>Cambiar estado  del pedido</h3>
        <form action="<?=base_url?>pedido/estado" method="post">
        <input type="hidden" name="pedido_id" value="<?=$pedido->id?>">
            <select name="estado">
                <option value="confirm" <?=$pedido->estado=="confirm"?"selected":""?>>Pendiente</option>
                <option value="preparation" <?=$pedido->estado=="preparation"?"selected":""?>>En Preparacion</option>
                <option value="ready" <?=$pedido->estado=="ready"?"selected":""?>>Preparado para enviar</option>
                <option value="sended" <?=$pedido->estado=="sended"?"selected":""?>>Enviado</option>
            </select>
            <button class="butto">Cambiar estado</button>
        </form><br>
    <?php endif;?>


    <h3>Direccion de envio</h3>
    <div>Provincia: <?= $pedido->provincia ?></div>
    <div>Localidad: <?= $pedido->localidad ?></div>
    <div>Direccion: <?= $pedido->direccion ?></div><br>


    <h3>Datos del pedido</h3>
    <div>Numero: <?= $pedido->id ?></div>
    <div>Estado: <?= Utils::showEstado($pedido->estado)?></div>
    <div>Total a pagar: <?= $pedido->coste ?></div>
    <div>
        Productos:
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
            <?php while($PP = $pedidoProductos->fetch_object()):?>
                <tr>
                    <td>
                        <img class="img_carrito" src="<?= base_url ?>/uploads/images/<?= $PP->imagen ?>" alt="">
                    </td>
                    <td><?= $PP->nombre ?></td>
                    <td>S/. <?= $PP->precio ?></td>
                    <td><?= $PP->unidades ?></td>
                </tr>
            <?php endwhile;?>
        </table>
        </ul>
    </div>
<?php endif;?>