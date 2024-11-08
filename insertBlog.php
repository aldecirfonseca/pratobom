<?php 

session_start();

if (isset($_POST['titulo'])) {

    // Carrega lib do banco de dados
    require_once "lib/Database.php";

    // criar o objeto do banco e dados
    $db = new Database();

    try {
        $result = $db->dbInsert("INSERT INTO blog
                                (titulo, dataPostagem)
                                VALUES (?, ?)"
                                ,[
                                    $_POST['titulo'],
                                    $_POST['dataPostagem']
                                ]);
        
        if ($result > 0) {      // sucesso
            $_SESSION['msgSuccess'] = "Registro inserido com sucesso.";
        }

    } catch (Exception $e) {
        $_SESSION['msgError'] = "ERROR: " . $e->getMessage();
    }
} 

return header("Location: index.php?pagina=listaBlog");