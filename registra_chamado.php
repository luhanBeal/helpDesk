<?php

    // montagem do texto
    // para nao ocorrer o problema de o texto haver ###
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    //separar por #
        // outra solução seria com implodee('#', $_POST);
    $texto = $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL; // PHP_EndOfLine!!

    // abrindo
    $arquivo = fopen('arquivo.hd', 'a'); // dois parametros('nome.extension', 'ler/escrever/hover...');
    // consultar a documentação p ver os parametros
    // escrevendo
    fwrite($arquivo, $texto); // 2 par ('qual_arq', "oq_escrever");
    // fechando
    fclose($arquivo);
?>
