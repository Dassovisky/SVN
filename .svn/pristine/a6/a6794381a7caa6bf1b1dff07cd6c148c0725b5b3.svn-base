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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <link rel="stylesheet" href="../../css/material_icon.css">    
    <link rel="stylesheet" href="../../css/material.min.css">    
    <link rel="stylesheet" href="../../css/bootstrap.min.css">    
    <link rel="stylesheet" href="../../css/inicio.css">
    <link rel="stylesheet" href="../../css/menu_fixo.css">
  </head>
  <body>
  
    <?php include("../../views/includes/menu_fixo.php");?>
      
        <main class="mdl-layout__content">
            <div class="page-content">
                <div class="container-fluid">
                    
                    <?php include("perfil_conteudo.php");?>
                
                </div>
            </div>
        </main>
    <!-- Fim -->
    </div>  
            
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/material.min.js"></script>
    <script src="../../js/default/default_inicio.js"></script>
  </body>
</html>