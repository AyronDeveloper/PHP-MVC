<?php if(isset($_SESSION["identity"])):?>
    <h1>Realizar pedido</h1>
    <a href="<?=base_url?>carrito/index">Ver carrito</a>
    <h3>Direccion para el envio</h3>
    <form action="<?=base_url?>pedido/add" method="post">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia">

        <label for="localidad">Localidad</label>
        <input type="text" name="localidad">

        <label for="direccion">Direcccion</label>
        <input type="text" name="direccion">
        <button class="button">Confirmar</button>
    </form>

<?php else:?>
    <h1>Inicia session para continuar con el pedido</h1>
<?php endif;?>