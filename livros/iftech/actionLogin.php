<?php
session_start();
include("conexaoBD.php");

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $emailUsuario = mysqli_real_escape_string($conn, $_POST["emailUsuario"]);
    $senhaUsuario = mysqli_real_escape_string($conn, $_POST["senhaUsuario"]);

    // Consulta segura (ainda com MD5 - se puder mudar, melhor)
    $sql = "SELECT * FROM usuarios WHERE emailUsuario = '$emailUsuario' AND senhaUsuario = md5('$senhaUsuario')";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        $registro = mysqli_fetch_assoc($resultado);

        // Cria variáveis de sessão com dados importantes
        $_SESSION["emailUsuario"] = $registro["emailUsuario"];
        $_SESSION["nomeUsuario"] = $registro["nome"];

        // Redireciona para a página inicial (ou perfil)
        header("Location: index.php");
        exit();
    } else {
        // Login inválido: redireciona com erro
        header("Location: formLogin.php?erroLogin=dadosInvalidos");
        exit();
    }
} else {
    // Caso acesse esse arquivo direto via GET, redireciona para login
    header("Location: formLogin.php");
    exit();
}
?>
