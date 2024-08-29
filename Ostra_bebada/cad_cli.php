<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<form>
<p align="center">
<?php
	include("pro/setup.php");
    require("pro/setup.php");
	
	$fone = $_POST['fone'];
	$ender = $_POST['ender'];
	$cpf = $_POST['cpf'];
	$nome = $_POST['nome'];
    
	$result = mysql_query("select * from cliente where cpf = '$cpf'");
    
	if(mysql_num_rows ($result) > 0 ) {      
		ECHO "Um cliente com este CPF já está cadastrado."; 
	}else{
	
		if(isset($fone) and isset($ender) and isset($cpf) and isset($nome)){
			mysql_query("insert into cliente (nome, fone, endereco, cpf) values ('$nome', '$fone', '$ender', '$cpf')") or die ("ERRO DE CADASTRO");
			ECHO "O Cliente <b>".$nome."</b> foi cadastrado...";
			ECHO "<br />Numero do telefone: ".$fone;
			ECHO "<br />Endereço: ".$ender;
			ECHO "<br />CPF: ".$cpf;
			
			$result = mysql_query("select * from cliente where cpf = '$cpf'");
			while($row = mysql_fetch_array($result)){
				ECHO "<br />ID DO CLIENTE: ".$row['id_cliente'];
			}
		}else{
			header('location:princ.php');
		}
	}
?>
<br />
<br /><a href="princ.php" class="botaoForm">VOLTAR</a>
</form>
</p>
</body>
</html>
