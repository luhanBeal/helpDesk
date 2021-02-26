<?php
// remover índices do array de sessão
// unset($_SESSION['autenticado']); // remove o índice apenas se existir

// destruír a varuável de sessãp
// session_destroy(); // será destruída, mas somente depois de acabar a sessão
// -> após forçar o redirecionamento

session_destroy();
header('Location: index.php');

?>
