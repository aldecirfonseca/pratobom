<?php

require_once "lib/Database.php";
require_once "lib/funcoes.php";

$db = new Database();
$func = new Funcoes();

$dados = [];

if ($_GET['acao'] != 'insert') {
    $dados = $db->dbSelect(
        "SELECT * FROM blog WHERE id = ?",
        'first',
        [$_GET['id']]
    );
}

?>

<div class="container mt-5">

    <div class="row">
        <div class="col-10">
            <h3>Blog<?= $func->subTitulo($_GET['acao']) ?></h3>
        </div>
        <div class="col-2 text-end">
            <a href="index.php?pagina=listaBlog" 
                class="btn btn-outline-secondary btn-sm">
                Voltar
            </a>
        </div>
    </div>

    <?= "DATA: " . date("d/m/Y") . "   HORA: " . date("H:i:s") ?>

    <form class="g-3" action="<?= $_GET['acao'] ?>Blog.php" method="POST">

        <input type="hidden" name="id" id="id" value="<?= Funcoes::setValue($dados, "id") ?>">

        <div class="row">

            <div class="col-9">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" 
                        class="form-control" 
                        id="titulo" 
                        name="titulo" 
                        placeholder="Titulo da postagem"
                        required
                        autofocus
                        value="<?= Funcoes::setValue($dados, 'titulo') ?>">
            </div>
            <div class="col-3">
                <label for="dataPostagem" class="form-label">Data Postagem</label>
                <input type="datetime-local" 
                        class="form-control" 
                        id="dataPostagem" 
                        name="dataPostagem" 
                        placeholder="Data Postagem"
                        required
                        value="<?= Funcoes::setValue($dados, 'dataPostagem') ?>">
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-12">
                <a href="index.php?pagina=listaCategoria" 
                    class="btn btn-outline-secondary btn-sm">
                    Voltar
                </a>

                <?php if ($_GET['acao'] != 'view'): ?>
                    <button type="submit" class="btn btn-primary btn-sm">Confirmar</button>
                <?php endif; ?>
            </div>
        </div>

    </form>
</div>