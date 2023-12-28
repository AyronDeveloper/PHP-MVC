<?php while($prod=$productos->fetch_object()):?>
    <h1><?=$prod->nombre?></h1>
    <div id="detail-product">
        <div class="image">
            <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" alt="">
        </div>
        <div class="data">
            <textarea name="" id="" cols="30" rows="10" readonly><?=$prod->descripcion?></textarea>
            <p class="precio">S/. <?=$prod->precio?></p>
            <a href="<?=base_url?>carrito/add/<?=$prod->id?>" class="button">Comprar</a>
        </div>
    </div>
<?php endwhile;?>