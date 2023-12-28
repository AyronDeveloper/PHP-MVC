<h1>Editar Producto</h1>
<div class="form_container">
    <form action="<?=base_url?>producto/update" method="post" enctype="multipart/form-data">
    <?php while($prod=$producto->fetch_object()):?>
        <input type="hidden" name="id" value="<?=$prod->id?>" >
        <label for="nombre">Nombre producto</label>
        <input type="text" name="nombre" value="<?=$prod->nombre?>">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="" cols="30" rows="10"><?=$prod->descripcion?></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="<?=$prod->precio?>">

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=$prod->stock?>">

        <label for="categoria">Categoria</label>
        <?php $categorias=Utils::showCategorias()?>
        <select name="categoria">
            <option value="<?=$prod->categoria_id?>" selected><?=$prod->nombreCategoria?></option>
            <?php while($cate=$categorias->fetch_object()):?>
                <option value="<?=$cate->id?>"><?=$cate->nombre?></option>
            <?php endwhile;?>
        </select>

        <label for="imagen">Imagen</label>
        <img class="thumb" src="<?=base_url?>uploads/images/<?=$prod->imagen?>" alt="no hay imagen">
        <input type="file" name="imagen">
    <?php endwhile;?>
        <button class="button">Editar</button>
    </form>
</div>