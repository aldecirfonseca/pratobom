<?php

// listaCategoria.php

require_once "lib/Database.php";
require_once "lib/funcoes.php";

$db = new Database();

$aEmDestaque = $db->dbSelect("SELECT * FROM cardapio WHERE emDestaque = 1");
$aCardapio = $db->dbSelect("SELECT * FROM cardapio ORDER BY descricao");

?>

<section class="section-margin mb-lg-100">
    <div class="container">
        <div class="section-intro mb-75px">
            <h4 class="intro-title">Destaques Food</h4>
            <h3>Sabor fresco e ótimo preço</h3>
        </div>

        <div class="owl-carousel owl-theme featured-carousel">

            <?php foreach ($aEmDestaque as $cardapio): ?>

                <div class="featured-item">
                    <img class="card-img rounded-0" src="uploads/cardapio/<?= $cardapio['imagem'] ?>" alt="">
                    <div class="item-body">
                        <a href="#">
                            <h3><?= $cardapio['descricao'] ?></h3>
                        </a>
                        <p><?= substr($cardapio['composicao'], 0 , 50) ?>...</p>
                        <div class="d-flex justify-content-between">
                            <ul class="rating-star">
                            <li><i class="ti-star"></i></li>
                            <li><i class="ti-star"></i></li>
                            <li><i class="ti-star"></i></li>
                            <li><i class="ti-star"></i></li>
                            <li><i class="ti-star"></i></li>
                            </ul>
                            <h3 class="price-tag">R$ <?= Funcoes::valorBr($cardapio['preco']) ?></h3>
                        </div>
                    </div>
                </div>
            
            <?php endforeach; ?>

        </div>
    </div>

</section>

<!--================Food menu section start =================-->  
<section class="section-margin">
    <div class="container">
        <div class="section-intro mb-75px">
            <h4 class="intro-title">Food Menu</h4>
            <h2>Delicious food</h2>
        </div>

        <div class="row">

            <?php foreach ($aCardapio as $cardapio): ?>

                <div class="col-md-6">
                    <div class="media align-items-center food-card">
                        <img class="mr-3 mr-sm-4" src="uploads/cardapio/<?= $cardapio['imagem'] ?>" alt="" height="80" width="80">
                        <div class="media-body">
                            <div class="d-flex justify-content-between food-card-title">
                                <h4><?= $cardapio['descricao'] ?></h4>
                                <h3 class="price-tag">R$ <?= Funcoes::valorBr($cardapio['preco']) ?></h3>
                            </div>
                            <p><?= substr($cardapio['composicao'], 0 , 50) ?>...</p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>