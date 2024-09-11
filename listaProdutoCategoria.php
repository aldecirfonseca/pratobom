<?php
// listaCategoria.php

require_once "lib/Database.php";

$db = new Database();

$data = $db->dbSelect("SELECT * FROM produtocategoria");

?>

<div class="container mt-5">

    <div class="row">
        <div class="col-10">
            <h3>Lista de Categoria de Produtos/Serviços</h3>
        </div>
        <div class="col-2 text-end">
            <a href="index.php?pagina=formProdutoCategoria&acao=insert" 
                class="btn btn-outline-secondary btn-sm"
                title="Nova">
                Nova
            </a>
        </div>
    </div>

    <div class="row">
        <!-- mensagens de sucesso ou error -->
    </div>

    <table class="table table-striped table-hover table-bordered table-responsive-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descrição</th>
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
                        <td><?= $row['statusRegistro'] ?></td>
                        <td>
                            <a href="#" class="btn btn-outline-primary btn-sm" title="Alteração">Alterar</a>
                            <a href="#" class="btn btn-outline-danger btn-sm" title="Exclusão">Excluir</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm" title="Visualização">Visualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhum registro encontrado.</td>
                </tr>
            <?php endif; ?>

        </tbody>

    </table>

</div>