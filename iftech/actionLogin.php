<?php

    include("conexaoBD.php");
    session_start(); //Inicia uma sessão

    $emailUsuario = mysqli_real_escape_string($conn, $_POST['emailUsuario']);
    $senhalUsuario = mysqli_real_escape_string($conn, $_POST['senhaUsuario']);
    $quantidadeLogin = 0; //Inicia a variável que contabilizaeá a quantidade de login esncontrados
    
    $buscarLogin = "SELECT *
                    FROM usuarios
                    WHERE emailUsuario = '{$emailUsuario}'
                    AND senhaUsuario   =  md5('{$senhaUsuario}')";
    
    
    $efetuarLogin = mysqli_query($conn, $buscarLogin);

    if($registro = mysqli_fetch_assoc($efetuarLogin)){
        $quantidadeLogin = mysqli_num_rows($efetuarLogin);

        //Criar variáveis PHP para armazenar registros encontrados pela QUERY
        $idUsuario      = $registro['idUsuario'];
        $emailUsuario   = $registro['emaiUsuario'];
        $nomeUsuario    = $registro['nomeUsuario'];

        //Criar variáveis de SESSÂO para armazenr registros das variáveis PHP
        $_SESSION['idUsuario']      = $idUsuario;
        $_SESSION['emailUsuario']   = $emailUsuario;
        $_SESSION['nomeUsuario']    = $nomeUsuario;

        $_SESSION['logado']         = true; //Variávelde controle de sessão

        header('location:index.php'); //Redireciona para a página inicial
    }
    elseif(empty($_POST['emailUsuario']) || empty($_POST['senhaUsuario']) || $quantidadeLogin == 0){
        header ('location:formLogin.php?erroLogin=dadosInvalidos');

    }


?>