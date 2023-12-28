<?php $categoria=Utils::showCategorias()?>
<?php while($cate=$categoria->fetch_object()):?>
    <?php if($cate->id==$id_cate):?>
        <h1>Categoria <?=$cate->nombre?></h1>
    <?php endif;?>
<?php endwhile;?>
<?php while($prod=$productos->fetch_object()):?>
    <a href="<?=base_url?>producto/ver/<?=$prod->id?>">
        <div class="product">
            <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" alt="">
            <h2><?=$prod->nombre?></h2>
            <p>S/. <?=$prod->precio?></p>
            <a href="" class="button">Comprar</a>
        </div>
    </a>
<?php endwhile;?>