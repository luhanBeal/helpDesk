<?php
    session_start();
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') { // if not set or diff than SIM
        header('Location: index.php?login=erro2');
    }
?>
