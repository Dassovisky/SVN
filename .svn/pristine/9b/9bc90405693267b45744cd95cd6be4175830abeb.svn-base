<?php
include('../../model/model_usuario.php');
include('../../model/model_validacao.php');




function ValidaUsuario($usuario){
		$v = new validacao;
        
       echo $v->validarCampo("nome",$usuario->GetNome(), "99", "10");
       echo $v->validarEmail($usuario->getEmail());
       echo $v->validarCpf($usuario->getCpf());
       echo $v->validarCampo("senha",$usuario->GetSenha(), "99", "6");
       echo $v->ValidarCPFExistente($usuario->getCpf());
       echo $v->ValidarEmailExistente($usuario->getEmail());

         return $v;

}
function limpaCPF_CNPJ($valor){
 $valor = trim($valor);
 $valor = str_replace(".", "", $valor);
 $valor = str_replace(",", "", $valor);
 $valor = str_replace("-", "", $valor);
 $valor = str_replace("/", "", $valor);
 return $valor;
}

function LogarUsuario($usuario){
 
 $validate = new validacao;

  echo $validate->ValidarLoginUsuario($usuario->getEmail(),$usuario->getSenha());

  
  if($validate->verifica()){

    $conexao = new Conexao();

   $cmdsql = "select * from Usuario where email ='{$usuario->getEmail()}' and senha ='{$usuario->getSenha()}'";
    
  $exec = mysqli_query($conexao->getConexao(), $cmdsql);
  
   $resultado = mysqli_fetch_assoc($exec);

   $usuariologado = new usuario;

    $usuariologado ->setId($resultado['ID_Usuario']);
    $usuariologado ->setNome($resultado['Nome']);
    $usuariologado ->setEmail($resultado['Email']);
    $usuariologado ->setSenha($resultado['Senha']);
    $usuariologado ->setCpf($resultado['Cpf']);

   session_start();

  $_SESSION['usuarionome'] = $usuariologado->getNome();
  $_SESSION['usuarioid'] = $usuariologado->getId();
  $_SESSION['usuarioemail'] = $usuariologado->getEmail();
  $_SESSION['usuariosenha'] = $usuariologado->getEmail();
  $_SESSION['usuariocpf']  = $usuariologado ->getCpf();
    
    $conexao->FechaConexao($conexao->getConexao());

    echo "<script>window.location.href = '../../views/default/inicio.php'</script>;";
    

  }

return;
}

function InsereUsuario($usuario){

    
   $conexao = new Conexao();

    $usuario->setCpf(limpaCPF_CNPJ($usuario->getCpf()));
   
      $validate = ValidaUsuario($usuario);

   if($validate->verifica()){
   	$cmdsql = "insert into usuario (nome,email,senha,cpf) values ('".$usuario->getNome()."','".$usuario->getEmail()."','".$usuario->getSenha()."','".$usuario->getCpf()."')";
    
    mysqli_query($conexao->getConexao(),$cmdsql);
    
    $conexao->FechaConexao($conexao->getConexao());

    echo "<script>
$(document).ready(function() {
var notification = document.querySelector('.mdl-js-snackbar');
var data = {
  message: 'Cadastrado Com Sucesso!',
  actionText: 'Undo',
  timeout: 2000
};
notification.MaterialSnackbar.showSnackbar(data);
})
</script>";
    
    
}


return;
}






?>