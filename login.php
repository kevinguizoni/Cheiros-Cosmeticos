<?php
session_start();
include('conexao.php');

if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: minhaconta.php');
	exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select email from usuarios where email = '{$email}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($email == 'admin@admin.com' && $senha == 'admin123' ){
	$_SESSION['adm'] = $email;
	header('Location: painel.php');
	exit();
}

if($row == 1) {
	$_SESSION['email'] = $email;
	header('Location: home.php');
	exit();
} else {
	header('Location: minhaconta.php');
	exit();
}

?>