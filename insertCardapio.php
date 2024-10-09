<?php 

session_start();

if (isset($_POST['descricao'])) {

    // Carrega lib do banco de dados
    require_once "lib/Database.php";
    //
    require_once "lib/funcoes.php";

    // criar o objeto do banco e dados
    $db = new Database();

    try {
        $result = $db->dbInsert("INSERT INTO cardapio
                                (descricao, composicao, preco, categoria_id, imagem, emDestaque, statusRegistro)
                                VALUES (?, ?, ?, ?, ?, ?, ?)"
                                ,[
                                    $_POST['descricao'],
                                    $_POST['composicao'],
                                    Funcoes::strDecimais($_POST['preco']),
                                    $_POST['categoria_id'],
                                    $_POST['imagem'],
                                    $_POST['emDestaque'],
                                    $_POST['statusRegistro']
                                ]);
        
        if ($result > 0) {      // sucesso
            $_SESSION['msgSuccess'] = "Registro inserido com sucesso.";
        }

    } catch (Exception $e) {
        $_SESSION['msgError'] = "ERROR: " . $e->getMessage();
    }
} 

return header("Location: index.php?pagina=listaCategoria");