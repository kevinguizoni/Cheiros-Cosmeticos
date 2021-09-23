<?php
include_once('conexao.php');
$sqlprod = 'SELECT * FROM produtos '  ;  
    $queryprod = mysqli_query($conexao, $sqlprod); 
    $listadeprodutos = mysqli_fetch_all($queryprod, MYSQLI_ASSOC);
    if($queryprod){
        foreach($listadeprodutos as $keyw => $valorprod){
            print_r(
            
                '<img src="upload/'.$valorprod['arquivo'].'" style="width:100px; height:100px;"/> ' .
            $valorprod['nomedoproduto'].'  <br /> '.
            $valorprod['tamanho'].'  <br /> '.
            $valorprod['data'].' <br /> '


            );
        }
    }



?>