<?php if(isset($_SESSION["pedido"])&&$_SESSION["pedido"]=="completed"):?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaria a la cuenta 131366511631 32 con el coste del pedido, sera procesado y enviado</p>
    <?php if(isset($pedido)):?>
        <h3>Datos del: pedido</h3>
        <div>Numero: <?=$pedido->id?></div>
        <div>Total a pagar: <?=$pedido->coste?></div>
        <div>
            Productos:
            <table>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
                <?php while($PP=$pedidoProducto->fetch_object()):?>
                    <tr>
                        <td>
                            <img class="img_carrito" src="<?=base_url?>/uploads/images/<?=$PP->imagen?>" alt="">
                        </td>
                        <td><?=$PP->nombre?></td>
                        <td>S/. <?=$PP->precio?></td>
                        <td><?=$PP->unidades?></td>
                    </tr>
                <?php endwhile;?>
            </table>
            </ul>
        </div>
    <?php endif;?>
<?php elseif(isset($_SESSION["pedido"])&&$_SESSION["pedido"]=="failed"):?>
    <h1>Hubo un error vuelvo a intentarlo</h1>
<?php endif;?>