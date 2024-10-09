<?php
// listaCategoria.php

require_once "lib/Database.php";
require_once "lib/funcoes.php";

$db = new Database();

$data = $db->dbSelect("SELECT c.*, cat.descricao AS categoriaDescricao 
                        FROM cardapio as c 
                        INNER JOIN categoria as cat ON cat.id = c.categoria_id 
                        ORDER BY descricao");

?>

<div class="container mt-5">

    <div class="row">
        <div class="col-10">
            <h3>Lista de Cardápio</h3>
        </div>
        <div class="col-2 text-end">
            <a href="index.php?pagina=formCardapio&acao=insert" 
                class="btn btn-outline-secondary btn-sm"
                title="Nova">
                Nova
            </a>
        </div>
    </div>
    
    <?= Funcoes::mensagem() ?>

    <table class="table table-striped table-hover table-bordered table-responsive-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Destaque</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>

            <?php if (count($data) > 0): ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['descricao'] ?></td>
                        <td><?= $row['descricaoCategoria'] ?></td>
                        <td><?= Funcoes::valorBr($row['preco']) ?></td>
                        <td><?= ($row['emDestaque'] == 1 ? "Sim" : "Não") ?></td>
                        <td><?= Funcoes::getStatusRegistro($row['statusRegistro']) ?></td>
                        <td>
                            <a href="index.php?pagina=formCardapio&acao=update&id=<?= $row['id'] ?>" class="btn btn-outline-primary btn-sm" title="Alteração">Alterar</a>
                            <a href="index.php?pagina=formCardapio&acao=delete&id=<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm" title="Exclusão">Excluir</a>
                            <a href="index.php?pagina=formCardapio&acao=view&id=<?= $row['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Visualização">Visualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Nenhum registro encontrado.</td>
                </tr>
            <?php endif; ?>

        </tbody>

    </table>

</div>