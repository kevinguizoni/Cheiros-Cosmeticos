<?php

session_start();

include_once('inc/header.php');
?>




<div class="container aa">
  <div class="row">
    <div class="col-sm">
      <form method="POST" action="login.php">
        <h2>Login</h2>


        <div class="form-group">
          <label for="exampleInputEmail1">Endereço de email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">
          <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
        </div>
        
        <button type="submit" class="btn btn-primary">Logar</button>

        <!--  Cadastro  -->

      </form>
    </div>
    <div class="col-sm">

    </div>
    <div class="col-sm">
      <form action="cadastrar.php" method="POST">
        <h2>Faça seu Cadastro</h2>
        <label for="inputnome">Nome Completo</label>
        <div class="form-row">

          <div class="form-group col">
            <input name="nome" type="text" class="form-control" placeholder="Nome">
          </div>
          <div class="col">
            <input name="sobrenome" type="text" class="form-control" placeholder="Sobrenome">
          </div>
        </div>



        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Senha</label>
            <input name="senha" type="password" class="form-control" id="inputPassword4" placeholder="Senha">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Endereço</label>
          <input name="endereco" type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Cidade</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-4">
          <label for="inputCEP">CEP</label>
            <input name="cep" type="text" class="form-control" id="inputCEP">
          </div>
          </div>
          <div class="form-group col-md-2">
            
        </div>
        <div class="form-group">
          <?php
          if (isset($_SESSION['status_cadastro'])) :

          ?>
            <div class="notification is-success">
              <p>Cadastro efetuado </p>
              <p> <-------- Faça login informando o seu email e senha</p>
            </div>
          <?php
          endif;
          unset($_SESSION['status_cadastro']);
          ?>

          <?php
          if (isset($_SESSION['email_existe'])) :
          ?>

            <div class="notification is-info">
              <p>o email escolhido já existe. Informe outro e tente novamente.</p>
            </div>


          <?php
          endif;
          unset($_SESSION['email_existe']);
          ?>

        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
      </form>
      <p class="text-center text-danger">
      </p>
    </div>
  </div>
</div>

<?php include_once('inc/footer.php'); ?>