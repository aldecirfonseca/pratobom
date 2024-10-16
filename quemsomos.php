<?php

// listaCategoria.php

require_once "lib/Database.php";
require_once "lib/funcoes.php";

$db = new Database();

$data = $db->dbSelect("SELECT * FROM quemsomos", 'first');

?>

<section class="about section-margin pb-xl-70">
    
    <div class="container">

        <div class="section-intro mb-lg-4">
            <h4 class="intro-title">Quem somos?</h4>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-xl-6 mb-5 mb-md-0 pb-5 pb-md-0">
                <div class="img-styleBox">
                    <div class="styleBox-border">
                        <img class="styleBox-img1 img-fluid" style="max-height: 414px; max-width: 390px;" 
                            src="uploads/quemsomos/<?= $data['imagem1'] ?>"  alt="">
                    </div>
                    <img class="styleBox-img2 img-fluid" style="max-height: 294px; max-width: 261px;"
                        src="uploads/quemsomos/<?= $data['imagem2'] ?>" alt="">
                </div>
            </div>
            <div class="col-md-6 pl-md-5 pl-xl-0 offset-xl-1 col-xl-5">
                <div class="section-intro mb-lg-4">
                    <h2><?= $data['titulo'] ?></h2>
                </div>
                <?= $data['texto'] ?>
            </div>
        </div>
    </div>
</section>
