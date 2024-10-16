<?php

require_once "lib/Database.php";
require_once "lib/funcoes.php";

$db = new Database();
$func = new Funcoes();

//

$aCategoria = $db->dbSelect("SELECT * FROM categoria ORDER BY descricao");

//

$dados = [];

if ($_GET['acao'] != 'insert') {
    $dados = $db->dbSelect(
        "SELECT * FROM cardapio WHERE id = ?",
        'first',
        [$_GET['id']]
    );
}

?>

<div class="container mt-5">

    <div class="row">
        <div class="col-10">
            <h3>Cardápio<?= $func->subTitulo($_GET['acao']) ?></h3>
        </div>
        <div class="col-2 text-end">
            <a href="index.php?pagina=listaCardapio" 
                class="btn btn-outline-secondary btn-sm">
                Voltar
            </a>
        </div>
    </div>

    <form class="g-3" action="<?= $_GET['acao'] ?>Cardapio.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" id="id" value="<?= Funcoes::setValue($dados, "id") ?>">

        <div class="row">

            <div class="col-9">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" 
                        class="form-control" 
                        id="descricao" 
                        name="descricao" 
                        placeholder="Descrição da Cardápio"
                        required
                        autofocus
                        value="<?= Funcoes::setValue($dados, 'descricao') ?>">
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
                <label for="composicao" class="form-label">Composição</label>
                <textarea name="composicao" id="composicao"><?= Funcoes::setValue($dados, 'composicao') ?></textarea>
            </div>

            <div class="col-6">

                <label for="categoria_id" class="form-label">Categoria</label>
                <select class="form-control" id="categoria_id" name="categoria_id" required>
                    <option value=""  <?= Funcoes::setValue($dados, 'categoria_id') == ""  ? 'selected' : '' ?>>...</option>

                    <?php foreach ($aCategoria as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= Funcoes::setValue($dados, 'categoria_id') == $cat['id'] ? 'selected' : '' ?>><?= $cat['descricao'] ?></option>
                    <?php endforeach; ?>
                    
                </select>
            </div>

            <div class="col-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" required dir="rtl"
                        value="<?= Funcoes::setValue($dados, 'preco') ?>">
            </div>

            <div class="col-3">
                <label for="emDestaque" class="form-label">Em Destaque</label>
                <select class="form-control" id="emDestaque" name="emDestaque" required>
                        <option value=""  <?= Funcoes::setValue($dados, 'emDestaque') == ""  ? 'selected' : '' ?>>...</option>
                        <option value="1" <?= Funcoes::setValue($dados, 'emDestaque') == "1" ? 'selected' : '' ?>>Sim</option>
                        <option value="2" <?= Funcoes::setValue($dados, 'emDestaque') == "2" ? 'selected' : '' ?>>Não</option>
                </select>
            </div>

        </div>

        <h5 class="mt-3 mb-3">Imagem do Prato/Produto</h5>

        <?php if ($_GET['acao'] != "insert"): ?>
            <div class="row">
                <div class="form-group col-12">
                    <img src="uploads/cardapio/<?= Funcoes::setValue($dados, 'imagem') ?>" alt="..." class="img-thumbnail" width="200" height="200">
                </div>
            </div>
        <?php endif; ?>

        <?php if (in_array($_GET['acao'], ["insert", "update"])): ?>
            <div class="row mt-3">
                <div class="form-group col-12 col-md-4">
                    <label for="imagem" class="form-label font-weight-bold">Imagem<span class="text-danger">*</span></label>
                    <input type="file" class="form-control-file" name='imagem' id="imagem" accept="image/png, image/jpeg, image/jpg" <?= $_GET['acao'] == 'insert' ? 'required' : '' ?>>
                </div>
            </div>
        <?php endif; ?>

        <input type="hidden" name="excluirImagem" id="excluirImagem" value="<?= Funcoes::setValue($dados, 'imagem') ?>">

        <div class="row mt-3">
            <div class="col-12">
                <a href="index.php?pagina=listaCardapio" 
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

    $(document).ready( function() { 
        $('#preco').mask('##.###.###.##0,00', {reverse: true});
    })

    ClassicEditor
        .create(document.querySelector('#composicao'))
        .catch( error => {
            console.error(error);
        });

</script>