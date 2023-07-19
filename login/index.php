<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <style>
        body {
            height: 100vh;
            background-color: #73DCFD;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form {
            width: 350px;
            padding: 30px;
            background-color: #E9F9FA;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
        }

        input {
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin-bottom: 20px;
            margin-top: 5px;
            border-radius: 10px;
            border: solid 0.5px #1905FE;
        }

        h1 {
            color: #1905FE;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: #1905FE;
        }

        button {
            font-size: 16px;
            font-weight: bold;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 10px;
            border-radius: 10px;
            border: solid 1px #222;
            background-color: #2278F9;
            color: whitesmoke;
            cursor: pointer;
        }

        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
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

    <form action="logar.php" method="post">

        <h1>Login</h1>

        <label for="txtUsuario">Usuário</label>
        <input type="text" id="txtUsuario" name="txtUsuario" autocomplete="off">

        <label for="txtSenha">Senha</label>
        <input type="password" id="txtSenha" name="txtSenha">

        <button type="submit">Login</button>

        <a href="conta.php">Criar Conta</a>

    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>