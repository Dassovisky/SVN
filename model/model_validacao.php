<?php

/**
 * Classe para validação de dados
 * author faael
 * copyright 2008
 */
	require_once('../../DAO/conexao.php');
class validacao {
	var $campo;
	var $valor;
	var $msg = array();


	
	// Mensagens de erro
	function mensagens($num, $campo, $max, $min) {
		
		$this->msg[0] = "<script>
$(document).ready(function() {
var notification = document.querySelector('.mdl-js-snackbar');
var data = {
  message: 'Email invalido',
  actionText: 'Undo',
  timeout: 2000
};
notification.MaterialSnackbar.showSnackbar(data);
})
</script>"; // EMAIL
		$this->msg[1] = "CEP com formato inválido (Ex: XXXXX-XXX) <br />"; // CEP
		$this->msg[2] = "Data em formato inválido (Ex: DD/MM/AAAA) <br />"; // DATA
		$this->msg[3] = "Telefone inválido (Ex: 01433333333) <br />"; // TELEFONE
		$this->msg[4] = "<script>
$(document).ready(function() {
var notification = document.querySelector('.mdl-js-snackbar');
var data = {
  message: 'CPF Invalido',
  actionText: 'Undo',
  timeout: 2000
};
notification.MaterialSnackbar.showSnackbar(data);
})
</script>"; // CPF
		$this->msg[5] = "IP inválido (Ex: 192.168.10.1) <br />"; // IP
		$this->msg[6] = "Preencha o campo ".$campo." com numeros <br />"; // APENAS NUMEROS
		$this->msg[7] = "URL especificada é inválida (Ex: http://www.google.com) <br />"; // URL
		$this->msg[8] = "<script>
$(document).ready(function() {
var notification = document.querySelector('.mdl-js-snackbar');
var data = {
  message: 'Preencha o campo corretamente',
  actionText: 'Undo',
  timeout: 2000
};
notification.MaterialSnackbar.showSnackbar(data);
})
</script>"; // CAMPO VAZIO
		$this->msg[9] = "O ".$campo." deve ter no máximo ".$max." caracteres <br />"; // MÁXIMO DE CARACTERES
		$this->msg[10] = "O ".$campo." deve ter no mínimo ".$min." caracteres <br />"; // MÍNIMO DE CARACTERES
		$this->msg[11] = "<script>
$(document).ready(function() {
var notification = document.querySelector('.mdl-js-snackbar');
var data = {
  message: 'CPF Ja Existe',
  actionText: 'Undo',
  timeout: 2000
};
notification.MaterialSnackbar.showSnackbar(data);
})
</script>";
		$this->msg[12] = "<script>
$(document).ready(function() {
var notification = document.querySelector('.mdl-js-snackbar');
var data = {
  message: 'Email ja Existe',
  actionText: 'Undo',
  timeout: 2000
};
notification.MaterialSnackbar.showSnackbar(data);
})
</script>";
$this->msg[13] = "<script>
$(document).ready(function() {
var notification = document.querySelector('.mdl-js-snackbar');
var data = {
  message: 'Login/Senha invalidos',
  actionText: 'Undo',
  timeout: 2000
};
notification.MaterialSnackbar.showSnackbar(data);
})
</script>";
		return $this->msg[$num];
	}
	
	// Validar Email
	function validarEmail($email) {
		if (!eregi("^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$", $email)) {
			return $this->mensagens(0, 'email', null, null);
		}
	}
	
    // Validar CEP (xxxxx-xxx)
	function validarCep($cep) {
		if (!eregi("^[0-9]{5}-[0-9]{3}$", $cep)) { 
			return $this->mensagens(1, 'cep', null, null);
		}
	}
	
	// Validar Datas (DD/MM/AAAA)
	function validarData($data) {
		if (!eregi("^[0-9]{2}/[0-9]{2}/[0-9]{4}$", $data)) { 
			return $this->mensagens(2, 'data', null, null);
		}
	}
	
	// Validar Telefone (01432363810)
	function validarTelefone($telefone) {
		if (!eregi("^[0-9]{11}$", $telefone)) { 
			return $this->mensagens(3, 'telefone', null, null);
		}
	}
	
	// Validar CPF (111111111111)
	function validarCpf($cpf) {
		
 		if(!is_numeric($cpf)) {
  			$status = false;
		} else {
   			# Pega o digito verificador
  			$dv_informado = substr($cpf, 9,2);

   			for($i=0; $i<=8; $i++) {
   				$digito[$i] = substr($cpf, $i,1);
   			}
   			# Calcula o valor do 10° digito de verificação
   			$posicao = 10;
   			$soma = 0;

  			for($i=0; $i<=8; $i++) {
    			$soma = $soma + $digito[$i] * $posicao;
    			$posicao = $posicao - 1;
   			}

   			$digito[9] = $soma % 11;

   				if($digito[9] < 2) {
    				$digito[9] = 0;
   				} else {
    				$digito[9] = 11 - $digito[9];
   				} 
   				
   			# Calcula o valor do 11° digito de verificação
   			$posicao = 11;
   			$soma = 0;

   			for ($i=0; $i<=9; $i++) {
    			$soma = $soma + $digito[$i] * $posicao;
    			$posicao = $posicao - 1;
   			}

   			$digito[10] = $soma % 11;

   				if ($digito[10] < 2) {
    				$digito[10] = 0;
   				} else {
    				$digito[10] = 11 - $digito[10];
   				}
   				
  			# Verifica de o dv é igual ao informado
 			$dv = $digito[9] * 10 + $digito[10];
  			
			 	if ($dv != $dv_informado) {
   					$status = false;
  				} else
   					$status = true;
  				}
  
  		  # Se houver erro
 				if (!$status) {
					return $this->mensagens(4, 'cpf', null, null);
				}

	}
	
	// Validar IP (200.200.200.200)
	function validarIp($ip) {
		if (!eregi("^([0-9]){1,3}.([0-9]){1,3}.([0-9]){1,3}.([0-9]){1,3}$", $ip)) {
			return $this->mensagens(5, 'ip', null, null);
		}
	}
	
	
	// Validar Numero
	function validarNumero($campo,$numero) {
		if(!is_numeric($numero)) {
			return $this->mensagens(6, $campo, null, null);
		}
	}
	
	// Validar URL
	function validarUrl($url) {
		if (!preg_match('|^http(s)?://[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url)) {
			return $this->mensagens(7, $campo, null, null);
		}
}

	// Verificação simples (Campo vazio, maximo/minimo de caracteres)
	function validarCampo($campo, $valor, $max, $min) {
		$this->campo = $campo;
			if ($valor == "") {
				return $this->mensagens(8, $campo, $max, $min);
			} 
			elseif (strlen($valor) > $max) {
				return $this->mensagens(9, $campo, $max, $min);
			} 
			elseif (strlen($valor) < $min) {
				return $this->mensagens(10, $campo, $max, $min);	
			}
	}
   function ValidarCPFExistente($cpf){
   	$conexao = new Conexao();
    
  $cmdsql = "select * from Usuario where cpf ='{$cpf}'";
    
  $resultado = mysqli_query($conexao->getConexao(), $cmdsql);
    
   $cont = mysqli_num_rows($resultado);

   if($cont >0){
   	return $this->mensagens(11,'Cpf',null,null);

   }
   $conexao->FechaConexao($conexao->getConexao());
}
 function ValidarEmailExistente($email){
   	$conexao = new Conexao();
    
  $cmdsql = "select * from Usuario where email ='{$email}'";
    
  $resultado = mysqli_query($conexao->getConexao(), $cmdsql);
    
   $cont = mysqli_num_rows($resultado);

   if($cont >0){
   	return $this->mensagens(12,'Email',null,null);

   }
   $conexao->FechaConexao($conexao->getConexao());
}
function ValidarLoginUsuario($email,$senha){
   	$conexao = new Conexao();
    
  $cmdsql = "select * from Usuario where email ='{$email}' and senha ='{$senha}'";
    
  $resultado = mysqli_query($conexao->getConexao(), $cmdsql);
    
   $cont = mysqli_num_rows($resultado);


   if($cont == 0){
   	return $this->mensagens(13,'Login/senha',null,null);

   }

   $conexao->FechaConexao($conexao->getConexao());
}

function ValidaSessao($sessao){

 if($sessao == null){

 	session_destroy();
 	echo "<script>window.location.href = '../../views/default/login.php'</script>;";
 }

return;

}
	
	
	// Verifica se há erros
	function verifica() {
		if (sizeof($this->msg) == 0) {
			return true;
		} else {
			return false;
		}
	}
}

?>