<?php

require_once "lib/Database.php";
require_once "lib/funcoes.php";

$db = new Database();
$func = new Funcoes();

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

    <form class="g-3" action="<?= $_GET['acao'] ?>Cardapio.php" method="POST">

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

        </div>

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