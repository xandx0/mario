<?php

    # Inicia a sessão para poder manipulá-la
    session_start();

    # Importa a conexão com o banco de dados
    require_once '../core/conexao.php';

    # Cria uma variável com um array vazio, para armazenar 
    # os erros dessa página
    $erros = array();

    try {
        
        # Prepara um comando SELECT para buscar na tabela de usuários
        $select = $pdo->prepare('SELECT * FROM func WHERE usuario = :usuario');
       
        # Vincula ao parâmetro :usuario os dados do campo txtUsuario do form de login
        $select->bindValue(':usuario',$_POST['txtUsuario']);

        # Executa o comando
        $select->execute();

        # Recebe os dados do usuário encontrado
        $usuario = $select->fetch();

        # Variável que armazena a quantidade de usuários encontrados
        $usuariosEncontrados = $select->rowCount();

        # se a quantidade de usuários encontrada for maior que zero
        if ($usuariosEncontrados > 0) {

            # Verifica se a senha digitada bate com a senha armazenada no banco de dados
            if (password_verify($_POST['txtSenha'].$usuario->salt, $usuario->senha)) {

                # Registra os dados do usuário na sessão (ou seja, loga o usuário)
                $_SESSION['usuario_id'] = $usuario->id;
                $_SESSION['usuario_nome'] = $usuario->nome;

                # Redireciona para a página do dashboard
                header('Location: ../dashboard/');

            } else {
                
                # Armazena a mensagem de erro na variável $erros
                array_push($erros,'Dados de acesso incorretos!');
                
                # Destrói a sessão
                session_destroy();

            }

        } else {

            # Armazena uma mensagem de erro, caso o usuário não seja encontrado no BD
            array_push($erros,'Usuário não encontrado!');

            # Destrói a sessão
            session_destroy();

        }

    } catch (PDOException $e) {
        
        # usa a função array_push para inserir na variável $erros uma mensagem de erro
        array_push($erros,"<strong>Erro ao buscar dados do USUÁRIO no Banco de Dados:</strong> ".$e->getMessage());
        
        # destói a sessão
        session_destroy();
        
    }    
    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logando no Sistema...</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    

    <style>
        body {
            height: 100vh;
            background-color: #Fbb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        main {
            width: 350px;
            padding: 30px;
            background-color: whitesmoke;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
        }

        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
            color: #FE4343;
        }

        p {
            font-size: 14px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: center;
            color: #F00;
        }

        a {
            font-size: 18px;
            font-weight: bold;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <main>

        <h1>Erro</h1>

        <!-- Comando de repetição para mostrar as mensagens de erro que possam ter acontecido -->
        <?php foreach ($erros as $erro) { ?>

            <p>- <?php echo $erro;?></p>

        <?php } ?>

        <a href="index.php"><< Voltar</a>
        
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>