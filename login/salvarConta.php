<?php

require_once '../core/conexao.php';


// Array para guardar as mensagens de erro
$erros = array();


// Verifica se o método utilizado no envio do formulário foi o POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['txtNomeFun']) and !empty($_POST['txtNomeFun'])) {
            //Retirei todas as tags primeiro
            $txtNomeFun = strip_tags($_POST['txtNomeFun']);
            //Depois filtrei com o filtro de caracteres especiais
            $txtNomeFun = filter_var($txtNomeFun, FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            array_push($erros, 'Preencha o campo USUÁRIO');
        }

        if (isset($_POST['txtCpfFun']) and !empty($_POST['txtCpfFun'])) {
            //Retirei todas as tags primeiro
            $txtCpfFun = strip_tags($_POST['txtCpfFun']);
            //Depois filtrei com o filtro de caracteres especiais
            $txtCpfFun = filter_var($txtCpfFun, FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            array_push($erros, 'Preencha o campo USUÁRIO');
        }

        if (isset($_POST['txtTelefoneFun']) and !empty($_POST['txtTelefoneFun'])) {
            //Retirei todas as tags primeiro
            $txtTelefoneFun = strip_tags($_POST['txtTelefoneFun']);
            //Depois filtrei com o filtro de caracteres especiais
            $txtTelefoneFun = filter_var($txtTelefoneFun, FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            array_push($erros, 'Preencha o campo USUÁRIO');
        }

        if (isset($_POST['txtCargo']) and !empty($_POST['txtCargo'])) {
            //Retirei todas as tags primeiro
            $txtCargo = strip_tags($_POST['txtCargo']);
            //Depois filtrei com o filtro de caracteres especiais
            $txtCargo = filter_var($txtCargo, FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            array_push($erros, 'Preencha o campo USUÁRIO');
        }
    // Sanitiza e Valida campo txtNOME *****************************************************

        if (isset($_POST['txtUsuario']) and !empty($_POST['txtUsuario'])) {
            //Retirei todas as tags primeiro
            $txtUsuario = strip_tags($_POST['txtUsuario']);
            //Depois filtrei com o filtro de caracteres especiais
            $txtUsuario = filter_var($txtUsuario, FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            array_push($erros, 'Preencha o campo USUÁRIO');
        }

    // **************************************************************************************




    // Sanitiza e Valida campo txtSenha *****************************************************
        if (isset($_POST['txtSenha']) and !empty($_POST['txtSenha'])) {
            
            $txtSenha = filter_input(INPUT_POST, 'txtSenha', FILTER_SANITIZE_SPECIAL_CHARS);

            if (strlen($txtSenha) < 6) {
                array_push($erros, 'A SENHA deve ter no mínimo 6 caracteres');
            } else {
                $salt = uniqid();
                $txtSenha = password_hash($txtSenha . $salt, PASSWORD_DEFAULT);
            }

        } else {
            array_push($erros, 'Preencha o campo SENHA');
        }
    // **************************************************************************************




    // Se a sanitização e validação não tiveram erros  **************************************
        if (count($erros) == 0) {
            
            // Realiza a operação de INSERT no BD *******************************************
                try {
                    
                    $insert = $pdo->prepare('INSERT INTO func (nomeFun, cpfFun, telefoneFun, cargo, usuario, senha, salt) VALUES (:nomeFun, :cpfFun, :telefoneFun, :cargo, :usuario, :senha, :salt)');
                                                           
                    $insert->bindValue(':nomeFun',$txtNomeFun);
                    $insert->bindValue(':cpfFun',$txtCpfFun); 
                    $insert->bindValue(':telefoneFun',$txtTelefoneFun);
                    $insert->bindValue(':cargo',$txtCargo);
                    $insert->bindValue(':usuario',$txtUsuario);
                    $insert->bindValue(':senha',$txtSenha);
                    $insert->bindValue(':salt',$salt);
                    
                    if ($insert->execute()) {
                        header('Location:index.php');
                    }

                } catch (PDOException $e) {
                    array_push($erros,"<strong>Erro ao inserir o USUÁRIO no Banco de Dados:</strong> ".$e->getMessage());
                }
            // ******************************************************************************
                 
        }
    // **************************************************************************************
    
} else {
    array_push($erros,'Requisição Inválida!');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Salvar Conta</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body class="d-flex justify-content-center">

<div class="col-6 my-5 bg-body-secondary rounded text-danger p-3">
    <h5>Erro:</h5>
    <hr>

    <?php foreach ($erros as $erro) { ?>

        <p>- <?php echo $erro;?></p>

    <?php } ?>

    <a href="conta.php"><< Voltar</a>
    
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>