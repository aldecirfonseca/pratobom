<?php
/*
 *  Login
 */
?>

<section class="section-margin">
    
    <div class="container">
        
        <div class="section-intro mb-75px">
            <h4 class="intro-title">Área restrita</h4>
        </div>   
        
        <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <form class="form-contact contact_form" action="efetuarLogin" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">

                <div class="col-sm-12">
                    <h4 class="intro-title">Acesso</h4>
                </div>        
                
                <div class="col-sm-12">
                <div class="form-group">
                    <input class="form-control" name="Login" id="Login" 
                        type="text" 
                        placeholder="Informe o login"
                        required>
                </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input class="form-control" name="Senha" id="Senha" 
                            type="password" placeholder="Sua senha" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        Exibir aqui menagem de error
                    </div>
                </div>
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="button button-contactForm">Acessar</button>
            </div>
            </form>

        </div>

    </div>
</section>