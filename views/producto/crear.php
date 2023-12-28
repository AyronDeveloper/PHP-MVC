<h1>Crear nuevo producto</h1>
<div class="form_container">
    <form action="<?=base_url?>producto/save" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre producto</label>
        <input type="text" name="nombre">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="" cols="30" rows="10"></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio">

        <label for="stock">Stock</label>
        <input type="number" name="stock">

        <label for="categoria">Categoria</label>
        <?php $categorias=Utils::showCategorias()?>
        <select name="categoria">
            <option selected>---</option>
            <?php while($cate=$categorias->fetch_object()):?>
                <option value="<?=$cate->id?>"><?=$cate->nombre?></option>
            <?php endwhile;?>
        </select>

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen">
        <button class="button">Agregar</button>
    </form>
</div>