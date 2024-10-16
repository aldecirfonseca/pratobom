<?php
    require_once "lib/Database.php";
    require_once "lib/Funcoes.php";

    if (isset($_POST['titulo'])) {

        $db = new Database();

        try {

            $imagem1 = $_POST['excluirImagem1'];
            $imagem2 = $_POST['excluirImagem2'];
            $upload  = true;

            for ($xyx = 1; $xyx <= 2; $xyx++) {

                if ( $_POST['excluirImagem' . $xyx] != $_FILES['imagem' . $xyx]['name'] and $_FILES['imagem' . $xyx]['name'] != "") {
            
                    //lista de tipos de arquivos permitidos
                    $tiposPermitidos =  array('image/gif', 'image/jpeg', 'image/jpg', 'image/png');
                    
                    $tamanhoPermitido   = 1024 * 1024 * 5;                                          // 5mb //tamanho máximo (em bytes)
                    $imagem             = Funcoes::gerarNomeAleatorio($_FILES['imagem'. $xyx]['name']);   // nome original do arquivo no computador do usuario
                    $imagemType         = $_FILES['imagem' . $xyx]['type'];                                // o tipo do arquivo
                    $imagemSize         = $_FILES['imagem' . $xyx]['size'];                                // o tamanho do arquivo
                    $imagemTemp         = $_FILES['imagem' . $xyx]['tmp_name'];                            // o nome temporario do arquivo
                    $imagemError        = $_FILES['imagem' . $xyx]['error'];                               // codigos de possiveis erros na imagem
                    $msgError           = "";
    
                    if ($imagemError === 0) {
    
                        $upload = false;
    
                        //veririca o tipo de arquivo enviado
                        if (array_search($imagemType, $tiposPermitidos) === false) {
                            $msgError = "O tipo de arquivo enviado é inválido!";
                        } else if ($imagemSize > $tamanhoPermitido) { //veririca o tamanho doa rquivo enviado
                            $msgError = "O tamanho do arquivo enviado é inválido!";
                        } else { // não houve error, move o arquivo
    
                            $imagem = Funcoes::gerarNomeAleatorio($imagem);
                            $upload = move_uploaded_file($imagemTemp, 'uploads/quemsomos/' . $imagem);
    
                            if (!$upload) {
                                $msgError = "Houve uma falha ao realizar o uploud da imagem!";
                            } else {
                                // unlink, ele excluí a imagem fisicamente no servidor
                                if (file_exists('uploads/quemsomos/' . $_POST['excluirImagem' . $xyx])) {
                                    unlink('uploads/quemsomos/' . $_POST['excluirImagem' . $xyx]);
                                }
                            }

                            if ($xyx == 1) {
                                $imagem1 = $imagem;
                            } else {
                                $imagem2 = $imagem;
                            }
                        }
                    }
                }
            }

            if ($upload) {

                $result = $db->dbUpdate("UPDATE quemsomos
                                        SET titulo = ?, texto = ?, imagem1 = ?, imagem2 = ?, statusRegistro = ?
                                        WHERE id = ?",
                                        [
                                            $_POST['titulo'],
                                            $_POST['texto'],
                                            $imagem1,
                                            $imagem2,
                                            $_POST['statusRegistro'],
                                            $_POST['id']
                                        ]);
                
                if ($result) {
                    $_SESSION['msgSuccess'] = "Registro alterado com sucesso.";
                }

            } else {
                $_SESSION['msgSuccess'] = "ERROR: ". $msgError;
            }

        } catch (Exception $ex) {
            $_SESSION['msgSuccess'] = '<p style="color: red;">ERROR: '. $ex->getMessage(). "</p>";
        }

    }

    return header("Location: index.php?pagina=listaQuemSomos");