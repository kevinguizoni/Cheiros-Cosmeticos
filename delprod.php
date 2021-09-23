<?php
include_once('conexao.php');
$del = $_POST['delprod'];

echo $del;

$sql = "DELETE FROM `produtos` WHERE `produtos`.`codigo` = '$del';";
$query = mysqli_query($conexao, $sql);
if ($query){
header('location:painel.php');
}

?>