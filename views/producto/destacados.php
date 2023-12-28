<h1>Algunos de nuestro productos</h1>
<?php while($prod=$productos->fetch_object()):?>
    <div class="product">
        <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" alt="">
        <h2><?=$prod->nombre?></h2>
        <p>S/. <?=$prod->precio?></p>
        <a href="" class="button">Comprar</a>
    </div>
<?php endwhile;?>
</div>