<h1>Registrarse</h1>

<?php 
if(isset($_SESSION["register"]) && $_SESSION["register"]=="Completed"):?>
    <strong>Registro completado correctamente</strong>
<?php elseif(isset($_SESSION["register"]) && $_SESSION["register"]=="Failed"):?>
    <strong>Registro fallido, introduce bien los datos</strong>
<?php endif;?>
<?php Utils::deleteSession("register")?>
<form action="<?=base_url?>usuario/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos">
    <label for="email">Correo Electronico</label>
    <input type="email" name="email">
    <label for="password">Contraseña</label>
    <input type="password" name="password">
    <input type="submit" value="Registrarse">
</form>