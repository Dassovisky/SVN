<?php
ini_set('display_errors', 0);
include ('../../model/model_validacao.php');
include ('../../model/model_usuario.php');
$valida = new validacao;
$usuario = new usuario;
session_start();

$valida->ValidaSessao($_SESSION['usuarioid']);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Postar Noticías</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <link rel="stylesheet" href="../../css/material_icon.css">    
    <link rel="stylesheet" href="../../css/material.min.css">    
    <link rel="stylesheet" href="../../css/bootstrap.min.css">    
    <link rel="stylesheet" href="../../css/add_noticias.css">
    <link rel="stylesheet" href="../../css/menu_fixo.css">
  </head>
  <body>
  
   <?php include("../../views/includes/menu_fixo.php");?>
      
   <main class="mdl-layout__content">
        <div class="page-content">
            <div class="container">
                
                <form action="#" class="add_noticias">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="sample3">
                    <label class="mdl-textfield__label" for="sample3">Titulo...</label>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield">
                    <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" ></textarea>
                    <label class="mdl-textfield__label" for="sample5">Texto Noticia</label>
                  </div>
                  <div class="upload-btn-wrapper">
                    <button class="btn">Background</button>
                    <input class="btn" type="file" name="myfile" />
                  </div>
                  <div class="upload-btn-wrapper">
                    <button class="btn">Principal</button>
                    <input class="btn" type="file" name="myfile" />
                  </div>
                  <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon button_add" type="submit">
                      <i class="material-icons" role="presentation">check</i>
                      <span class="visuallyhidden">add comment</span>
                  </button>
                  <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon button_erase" type="reset">
                      <i class="material-icons" role="presentation">close</i>
                      <span class="visuallyhidden">add comment</span>
                  </button>
                </form>
                
            </div>
        </div>
    </main>
            
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/material.min.js"></script>
    <script src="../../js/default/default_inicio.js"></script>
  </body>
</html>