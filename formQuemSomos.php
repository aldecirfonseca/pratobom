<?php

require_once "lib/Database.php";
require_once "lib/funcoes.php";

$db = new Database();
$func = new Funcoes();

$dados = [];

if ($_GET['acao'] != 'insert') {
    $dados = $db->dbSelect(
        "SELECT * FROM quemsomos WHERE id = ?",
        'first',
        [$_GET['id']]
    );
}

?>

<div class="container mt-5">

    <div class="row">
        <div class="col-10">
            <h3>Quem Somos<?= $func->subTitulo($_GET['acao']) ?></h3>
        </div>
        <div class="col-2 text-end">
            <a href="index.php?pagina=listaQuemSomos" 
                class="btn btn-outline-secondary btn-sm">
                Voltar
            </a>
        </div>
    </div>

    <form class="g-3" action="<?= $_GET['acao'] ?>QuemSomos.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" id="id" value="<?= Funcoes::setValue($dados, "id") ?>">

        <div class="row">

            <div class="col-9">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" 
                        class="form-control" 
                        id="titulo" 
                        name="titulo" 
                        placeholder="Titulo"
                        required
                        autofocus
                        value="<?= Funcoes::setValue($dados, 'titulo') ?>">
            </div>

            <div class="col-3">
                <label for="statusRegistro" class="form-label">Status</label>
                <select 
                    class="form-control" 
                    id="statusRegistro" 
                    name="statusRegistro"
                    required>
                        <option value=""  <?= Funcoes::setValue($dados, 'statusRegistro') == ""  ? 'selected' : '' ?>>...</option>
                        <option value="1" <?= Funcoes::setValue($dados, 'statusRegistro') == "1" ? 'selected' : '' ?>>Ativo</option>
                        <option value="2" <?= Funcoes::setValue($dados, 'statusRegistro') == "2" ? 'selected' : '' ?>>Inativo</option>
                </select>
            </div>

            <div class="col-12 mt-3 mb-3">
                <label for="texto" class="form-label">Texto</label>
                <textarea name="texto" id="texto"><?= Funcoes::setValue($dados, 'texto') ?></textarea>
            </div>

        </div>

        <h5 class="mt-3 mb-3">Imagens</h5>

        <?php if ($_GET['acao'] != "insert"): ?>
            <div class="row">
                <div class="form-group col-4">
                    <img src="uploads/quemsomos/<?= Funcoes::setValue($dados, 'imagem1') ?>" alt="..." class="img-thumbnail" width="200" height="200">
                </div>
                <div class="form-group col-4">
                    <img src="uploads/quemsomos/<?= Funcoes::setValue($dados, 'imagem2') ?>" alt="..." class="img-thumbnail" width="200" height="200">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($_GET['acao'], ["insert", "update"])): ?>

            <div class="row mt-3">
                <div class="form-group col-12 col-md-4">
                    <label for="imagem1" class="form-label font-weight-bold">Imagem 1<span class="text-danger">*</span></label>
                    <input type="file" class="form-control-file" name='imagem1' id="imagem1" accept="image/png, image/jpeg, image/jpg" <?= $_GET['acao'] == 'insert' ? 'required' : '' ?>>
                </div>
            </div>

            <div class="row mt-3">
                <div class="form-group col-12 col-md-4">
                    <label for="imagem2" class="form-label font-weight-bold">Imagem 2<span class="text-danger">*</span></label>
                    <input type="file" class="form-control-file" name='imagem2' id="imagem2" accept="image/png, image/jpeg, image/jpg" <?= $_GET['acao'] == 'insert' ? 'required' : '' ?>>
                </div>
            </div>

        <?php endif; ?>

        <input type="hidden" name="excluirImagem1" id="excluirImagem1" value="<?= Funcoes::setValue($dados, 'imagem1') ?>">
        <input type="hidden" name="excluirImagem2" id="excluirImagem2" value="<?= Funcoes::setValue($dados, 'imagem2') ?>">

        <div class="row mt-3">
            <div class="col-12">
                <a href="index.php?pagina=listaQuemSomos" 
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

<script src="assets/ckeditor5/ckeditor5-build-classic/ckeditor.js"></script>

<script type="text/javascript">

    ClassicEditor
        .create(document.querySelector('#texto'))
        .catch( error => {
            console.error(error);
        });

</script>