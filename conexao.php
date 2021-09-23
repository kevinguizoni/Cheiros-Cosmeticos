<?php

	define('HOST', 'localhost');
	define('USUARIO', 'admin');
	define('SENHA', 'Admin123@');
	define('DB', 'cheiros-cosmeticos');

	$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die("Não foi possivel conectar");
