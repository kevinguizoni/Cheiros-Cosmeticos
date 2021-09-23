<?php
include_once('conexao.php');
session_start();
?>

<head>
    <?php
        include_once('inc/header.php');
    ?>
</head>

<body>

    <h2>Olá,
        <?php
        echo $_SESSION['email'];

        $sql = 'SELECT * FROM usuarios ';
        $query = mysqli_query($conexao, $sql);
        $listadeusuarios = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if ($query) {
            foreach ($listadeusuarios as $key => $valor) {
                print_r(

                    $valor['nome'] . '  <br /> ' .
                        $valor['email'] . '  <br /> ' .
                        $valor['endereco'] . ' <br /> '


                );
            }
        }





        ?>
    </h2>

    <div>
        <form action="uploadproduto.php" method="POST" enctype="multipart/form-data">
            <div class="container aa">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nome do produto</label>
                    <input name="nomedoproduto" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Malbec">

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Marca</label>
                    <input name="marca" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Boticario">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Variação</label>
                    <select name="tamanho" class="form-control" id="exampleFormControlSelect1">
                        <option>50ml</option>
                        <option>100ml</option>
                        <option>150ml</option>
                        <option>200ml</option>
                        <option>250ml</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Imagem do Produto</label>
                    <div class="custom-file">

                        <input name="arquivo" type="file" class="custom-file-input" value="Salvar" id="customFile">
                        <label class="custom-file-label" for="customFile">Escolher arquivo</label>
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição do Produto</label>
                    <textarea name="descricao" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Publicar</button>
            </div>
        </form>
    </div>

    <section>
        <?php

        $sqlprod = 'SELECT * FROM produtos ';
        $queryprod = mysqli_query($conexao, $sqlprod);
        $listadeprodutos = mysqli_fetch_all($queryprod, MYSQLI_ASSOC);
        if ($queryprod) {
            foreach ($listadeprodutos as $keyw => $valorprod) {
                print_r(

                    '<img src="upload/' . $valorprod['arquivo'] . '" style="width:100px; height:100px;"/> ' .
                        $valorprod['nomedoproduto'] . '  <br /> ' .
                        $valorprod['tamanho'] . '  <br /> ' .
                        $valorprod['data'] . ' <br /> ' .
                        '
            <form action="delprod.php" method="POST" >
                <input type="text" style="display: none;" name ="delprod" value="' . $valorprod['codigo'] . '">
                <button class="btn btn-primary" type="submit">deletar</button>
            </form>
            '


                );
            }
        }



        ?>
    </section>
    <a href="logout.php">Sair</a></h2>

    <?php
        include_once('inc/footer.php');
    ?>

</body>