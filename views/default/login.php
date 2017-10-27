<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/material_icon.css">    
    <link rel="stylesheet" href="../../css/material.min.css">    
    <link rel="stylesheet" href="../../css/login.css">
      
  </head>
  <body>

    <div class="back_1"></div>               

    <div class="mdl-layout mdl-layout__content">
        <div class="mdl-grid">
            
            <div class="mdl-cell mdl-cell--4-col"></div>
            <div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet">
                
                <div class="logo_top">
                    <img src="../../images/art/logo.png">
                </div>
                
                <div class="login_container">
                    <form action="" class="form_login" id="form_login" method="post">
                        <input class="mdl-textfield__input input" type="text" id="email" name="email" placeholder="E-mail" required="">
                        <input class="mdl-textfield__input input" type="password" id="senha" name="senha" placeholder="Senha" required="">
                        <button class="mdl-button mdl-js-ripple-effect button_login" type="submit" id="button_logar" name="button_logar"> Entrar </button>
                    </form>
                    
                    <form action="" class="form_cadastro" id="form_cadastro" name="form_cadastro" method="post">
                        <h4>Faça seu Cadastro!</h4>
                        <input class="mdl-textfield__input input" type="text" id="nome" name="nome" placeholder="Nome" required="">
                        <input class="mdl-textfield__input input" type="email" id="email" name="email" placeholder="E-mail" required="">
                        <input class="mdl-textfield__input input" id="senha" name="senha" type="password" placeholder="Senha" required="">
                        <input class="mdl-textfield__input input" type="text" name="cpf" id="cpf" placeholder="CPF" required="">
                        <button class="mdl-button mdl-js-ripple-effect button_login" type="submit" id="button_cadastrar" name="button_cadastrar"> Cadastrar </button>
                        <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
                          <div class="mdl-snackbar__text"></div>
                          <button class="mdl-snackbar__action" type="button"></button>
                        </div>
                    </form>
                </div>
                
                <div class="toggle_container">
                    <div class="toggle_form">
                        <label for="switch1" class="mdl-switch mdl-js-switch mdl-js-ripple-effect">
                            <input type="checkbox" id="switch1" class="mdl-switch__input">
                            <span class="mdl-switch__label">Login / Cadastro</span>
                        </label>
                    </div>
                </div>
                
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--3-col mdl-cell--2-col-tablet mdl-cell--2-col-phone">
                        <a href="">
                            <div class="social face">
                                <img src="../../images/icon/facebook-app-logo.svg">
                            </div>
                        <a/>
                    </div>
                    <div class="mdl-cell mdl-cell--3-col mdl-cell--2-col-tablet mdl-cell--2-col-phone">
                        <a href="">
                            <div class="social instagram">
                                <img src="../../images/icon/instagram-logo.svg">
                            </div>
                        <a/>
                    </div>
                    <div class="mdl-cell mdl-cell--3-col mdl-cell--2-col-tablet mdl-cell--2-col-phone">
                        <a href="">
                            <div class="social linkdin">
                                <img src="../../images/icon/linkedin.svg">
                            </div>
                        <a/>
                    </div>
                    <div class="mdl-cell mdl-cell--3-col mdl-cell--2-col-tablet mdl-cell--2-col-phone">
                        <a href="">
                            <div class="social youtube">
                                <img src="../../images/icon/youtube-play-button.svg">
                            </div>
                        <a/>
                    </div>
                </div>
            </div>
                        
        </div>
    </div>
                    
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/material.min.js"></script>
    <script src="../../js/jquery.maskedinput.js"></script>
    <script src="../../js/default/default_login.js"></script>
    <script src="../../js/jquery.validate.min.js"></script>
  </body>
</html>

<?php
include ('../../DAO/UsuarioDAO.php');

if(isset($_POST['button_cadastrar'])){

  $usuario = new usuario();
  $usuario->SetNome($_POST['nome']);
  $usuario->SetEmail($_POST['email']);
  $usuario->SetSenha($_POST['senha']);
  $usuario->SetCpf($_POST['cpf']);
  InsereUsuario($usuario);

echo "<script>
$(document).ready(function() {

 $('#form_cadastro').slideToggle();
  $('#form_login').slideToggle();

})
</script>";

}
if (isset($_POST['button_logar'])) {
    
  $usuario = new usuario();
   $usuario->SetEmail($_POST['email']);
  $usuario->SetSenha($_POST['senha']);

  LogarUsuario($usuario);

  echo "<script>
$(document).ready(function() {

 $('#form_cadastro').slideToggle();
  $('#form_login').slideToggle();

})
</script>";


}


?>
