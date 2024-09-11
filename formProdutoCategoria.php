<?php

//listaProdutoCategoria

//formProdutoCategoria.php

require_once "lib/Database.php";
require_once "lib/funcoes.php";

$db = new Database();
$func = new Funcoes();

?>

<div class="container mt-5">

    <div class="row">
        <div class="col-10">
            <h3>Categoria de Produto<?= $func->subTitulo($_GET['acao']) ?></h3>
        </div>
        <div class="col-2 text-end">
            <a href="index.php?pagina=listaProdutoCategoria" 
                class="btn btn-outline-secondary btn-sm">
                Voltar
            </a>
        </div>
    </div>

    <form class="g-3" action="xxxxProdutoCategoria" method="POST">

        <div class="row">

            <div class="col-9">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" 
                        class="form-control" 
                        id="descricao" 
                        name="descricao" 
                        placeholder="Descrição da Categoria de Produto"
                        required
                        autofocus>
            </div>
            <div class="col-3">
                <label for="statusRegistro" class="form-label">Status</label>
                <select 
                    class="form-control" 
                    id="statusRegistro" 
                    name="statusRegistro"
                    required>
                        <option value="">...</option>
                        <option value="1">Ativo</option>
                        <option value="2">Inativo</option>
                </select>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-12">
                <a href="index.php?pagina=listaProdutoCategoria" 
                    class="btn btn-outline-secondary btn-sm">
                    Voltar
                </a>
                <button type="submit" class="btn btn-primary btn-sm">Gravar</button>
            </div>
        </div>

    </form>
</div>