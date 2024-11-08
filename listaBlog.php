<?php
// listaCategoria.php

require_once "lib/Database.php";
require_once "lib/funcoes.php";

// Verificando se o usário está logado e se o é administrador,
// se não for rediciona para a página login
if (!Funcoes::getAdministrador()) {
    $_SESSION['msgError'] = "Usuário não logado ou sem permissão para acessar o recurso";
    return header("Location: index.php");
}

$db = new Database();

$data = $db->dbSelect("SELECT * FROM blog ORDER BY dataPostagem DESC");

?>

<div class="container mt-5">

    <div class="row">
        <div class="col-10">
            <h3>Lista de Postagem (blog)</h3>
        </div>
        <div class="col-2 text-end">
            <a href="index.php?pagina=formBlog&acao=insert" 
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
                <th>Titulo</th>
                <th>Data Postagem</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>

            <?php if (count($data) > 0): ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['titulo'] ?></td>
                        <td><?= date("d/m/Y H:i:s", strtotime($row['dataPostagem'])) ?></td>
                        <td>
                            <a href="index.php?pagina=formBlog&acao=update&id=<?= $row['id'] ?>" class="btn btn-outline-primary btn-sm" title="Alteração">Alterar</a>
                            <a href="index.php?pagina=formBlog&acao=delete&id=<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm" title="Exclusão">Excluir</a>
                            <a href="index.php?pagina=formBlog&acao=view&id=<?= $row['id'] ?>" class="btn btn-outline-secondary btn-sm" title="Visualização">Visualizar</a>
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