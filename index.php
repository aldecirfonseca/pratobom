<?php
    session_start();

    ob_start();

    date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Prato Bom - Home</title>
        
        <link rel="icon" href="assets/img/Fevicon.png" type="image/png">
        
        <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/themify-icons/themify-icons.">
        <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css">
        <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/vendors/Magnific-Popup/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/style_fasm.css">

        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/jqueryMask.js"></script>
        <script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/vendors/nice-select/jquery.nice-select.min.js"></script>
        <script src="assets/vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="assets/js/mail-script.js"></script>
        <script src="assets/js/main.js"></script>        
    <body>
        
        <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container box_1620">
                        <a class="navbar-brand logo_h" href="index.php"><h3 style="color: red; font-weight: bold;">Prato Bom</h3></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav justify-content-end">
                                <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li> 
                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=quemsomos">Quem somos</a></li> 
                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=cardapio">Cardápio</a>
                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=chef">Chef</a>
                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=reserva">Reserva</a>
                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=blog">Blog</a>
                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=faleconosco">Fale Conosco</a></li>
                                
                                <?php
                                if (!isset($_SESSION['userId'])) {
                                    ?>
                                    <li class="nav-item"><a class="nav-link" href="index.php?pagina=loginView">Área restrita</a></li>
                                    <?php
                                } else {
                                    ?>

                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                            aria-expanded="false"><?= substr($_SESSION['userName'], 0, 15) ?></a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>

                                            <?php if ($_SESSION['userNivel'] == 1): ?>
                                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=listaQuemSomos">Quem somos</a></li>
                                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=listaCategoria">Categoria</a></li>
                                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=listaCardapio">Cardápio</a></li>
                                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=listaCargo">Cargo</a></li>
                                                <li class="nav-item"><a class="nav-link" href="listaChef">Chef</a></li>
                                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=listaBlog">Blog</a></li>
                                                <li class="nav-item"><a class="nav-link" href="listaReserva">Reserva</a></li>
                                                <li class="nav-item"><a class="nav-link" href="index.php?pagina=listaUsuario">Usuários</a></li>
                                            <?php endif; ?>

                                            <li class="nav-item"><a class="nav-link" href="index.php?pagina=trocarSenhaView">Trocar a Senha</a></li>
                                        </ul>
                                    </li>
                                    <?php
                                    
                                }
                                ?>
                            </ul>
                        </div> 
                    </div>
                </nav>
            </div>
        </header>        
        
        <main>

            <div class="container">
                <?php 
                    require_once "lib/funcoes.php";

                    echo Funcoes::mensagem();
                ?>
            </div>

            <?php

                $pagina = 'home';

                if (isset($_GET['pagina'])) {
                    $pagina = $_GET['pagina'];
                }

                require_once $pagina . '.php';

            ?>

        </main>

        <footer class="footer-area section-gap">
            <div class="container">
            
                <div class="footer-bottom row align-items-center text-center text-lg-left">
                    
                    <p class="footer-text m-0 col-lg-8 col-md-12">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados para 
                        <a href="index.php">Prato Bom</a>
                    </p>
                    
                    <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-dribbble"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </footer>

    </body>

</html>