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
    $usuario_id = null;

    $perfis = array(1 => 'administrativo', 2 => 'usuario');

    // users (mudar para bd depois)
    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'peril_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => 'abcd', 'peril_id' => 1),
        array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => 'abcd', 'peril_id' => 2),
        array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => 'abcd', 'peril_id' => 2)
    );

    foreach ($usuarios_app as $user) {
        if(($user['email'] == $_POST['email']) && ($user['senha'] == $_POST['senha'])) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_pefil_id = $user['perfil_id'];
        }
    }

    if($usuario_autenticado) {
        header('Location: home.php');
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_pefil_id;
    } else {
        header('Location: index.php?login=erro'); // redireciona para index com parametros após ?
        $_SESSION['autenticado'] = 'NAO';
    }

?>