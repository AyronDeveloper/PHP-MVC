<h1>Gestionar Categorias</h1>
<a href="<?=base_url?>categoria/crear" class="button button-small">Crear Categoria</a>
<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>
    <?php while($cate=$categorias->fetch_object()):?>
        <tr>
            <td><?=$cate->id?></td>
            <td><?=$cate->nombre?></td>
        </tr>
    <?php endwhile;?>
</table>