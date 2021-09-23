<?php 
  session_start();
    include("conexao.php");

    $nomedoproduto = mysqli_real_escape_string($conexao, trim($_POST['nomedoproduto']));
    $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
    $tamanho = mysqli_real_escape_string($conexao, trim($_POST['tamanho']));
    $arquivo = $_FILES['arquivo'];
   



    $msg = false;

    if(isset($_FILES['arquivo'])){
        

        $extensao = strtolower(substr($arquivo['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "upload/";

        move_uploaded_file($arquivo['tmp_name'], $diretorio.$novo_nome);

        $sql_code = "INSERT INTO produtos (nomedoproduto, descricao, tamanho, codigo, arquivo, `data`) VALUES('$nomedoproduto', '$descricao', '$tamanho', null, '$novo_nome', NOW())";
        $query = mysqli_query($conexao, $sql_code);
        if($query > 0){
        $msg = "Arquivo enviado com sucesso!";
        header('location: painel.php');
        }
        else{
          $msg = "Falha ao enviar arquivo.";
    }
  }



    include_once('inc/header.php'); 
?>