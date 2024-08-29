<?php
	include("pro/setup.php");
    require("pro/setup.php");
	
	if($tipo == false){
	     header('location:princ2.php'); 
	}
	
	$senha1 = $_POST['senha1'];
	$senha2 = $_POST['senha2'];
	$tt = $_POST['tipo_usu'];
	$nome = $_POST['nome'];
	
    if($senha1 == $senha2 and isset($nome) and isset($senha1) and isset($tt)){
		
		if($tt == "supe"){
			$tipos = 1;
		}else{
			$tipos = 0;
		}

		$result = mysql_query("select * from usuario where nome = '$nome'");
    
		if(mysql_num_rows ($result) > 0 ) {      
			ECHO "usuario já cadastrado"; 
		}else{
			mysql_query("insert into usuario (nome, senha, tipo) values('$nome', '$senha1', '$tipos')") or die ("ERRO DE CADASTRO");
			ECHO "O usuario ".$nome." foi cadastrado...";
			ECHO "Sua senha é: ".$senha1.".";
			ECHO "Tipo de usuario: ".$tt;
		}
	
	}else{
		header('location:cad_usuario.php'); 
}
?>
<br /><a href="princ.php">VOLTAR</a>