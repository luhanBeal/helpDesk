<?php

    // SESSION do usuário (instância no servidos do usuário) <-- sempre primeiro
    session_start();
    // session por default no php dura 3 HORAS!
    // cria instância individuais para cada acesso de index.php <-- COOKIES

// TENTANDO APLICAR BD MYSQL
//    $dsn = 'mysql:host=localhost;dbname=db_help_desk';
//    $usuario = 'root';
//    $senha = '';
//    $conexao = new PDO($dsn, $usuario, $senha);
// -----------------------------------------------------------------//
//
//     parâmetros  pegos pelo servidor apache na requisição com a super global GET
//     $_POST envia os dados dentro do request, tirando os dados da URL

//    print_r($_GET);
//    echo $_GET['email'];
//    echo $_GET['senha'];
//  print_r($_POST);

    // var para autenticar o usuário
    $usuario_autenticado = false;
    // users (mudar para bd depois)
    $usuarios_app = array(
        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'user@teste.com.br', 'senha' => 'abcd')
    );

    foreach ($usuarios_app as $user) {
        if(($user['email'] == $_POST['email']) && ($user['senha'] == $_POST['senha'])) {
            $usuario_autenticado = true;
        }
    }

    if($usuario_autenticado) {
        header('Location: home.php');
        $_SESSION['autenticado'] = 'SIM';
    } else {
        header('Location: index.php?login=erro'); // redireciona para index com parametros após ?
        $_SESSION['autenticado'] = 'NAO';
    }

?>