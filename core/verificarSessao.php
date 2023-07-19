<?php

    # Inicia a sessão para poder manipulá-la
    session_start();

    # Importa a conexão com o Banco de Dados
    require_once 'conexao.php';

    # Verifica se o usuário está logado
    if (!isset($_SESSION['usuario_id']) and !isset($_SESSION['usuario_nome'])) {
        
        # Se ele não estiver logado, redireciona para a página de login
        header('Location: ../login/');
        
    }