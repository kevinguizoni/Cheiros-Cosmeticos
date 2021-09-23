<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$sobrenome = mysqli_real_escape_string($conexao, trim($_POST['sobrenome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));

$sql = "select cout(*) as total from email where email = '$email'";
$result = mysqli_query($conexao, $sql);

if ($result) {

    $row = mysqli_fetch_assoc($result);


    if ($row == 1) {
        $_SESSION['email_existe'] = true;
        header('Location: minhaconta.php');
        exit();
    }
} else {
    echo 'Não achei, vou cadastrar';
    $sql = "INSERT INTO usuarios (nome, sobrenome, cep, email, senha, niveldeacesso) value ('$nome', '$sobrenome', '$cep', '$email', '$senha', 2)";

    if ($conexao->query($sql) === TRUE) {
        echo 'Cadastrei';
        $_SESSION['status_cadastro'] = true;
    } else {
        echo '<pre>';
        print_r($conexao);
        echo 'Nao consegio =(';
    }
}
$conexao->close();
header('Location: minhaconta.php');
exit;
