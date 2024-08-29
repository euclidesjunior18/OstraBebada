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
	
	if($tipo == false){
	     header('location:princ2.php'); 
	}
	
	$id_cli = $_POST['id_cli'];
	$fone = $_POST['fone'];
	$citu = $_POST['cit_cli'];
	$ender = $_POST['ender'];
	
	if(isset($id_cli) and isset($fone) and isset($citu) and isset($ender)){
		
		if($citu == 'ativ'){
			$citu = 1;
		}else{
			$citu = 0;
		}
		mysql_query("update cliente set fone = '$fone', cituacao = '$citu', endereco = '$ender' where id_cliente = '$id_cli'") or die ("ERRO NA TENTATIVA DE ALTERAR O CLIENTE...");
		ECHO "O Cliente foi alterado...";
	}else{
		ECHO 'ERROR!!! AS VARIAVEIS NÂO FORAM INICIADAS...'; 
		ECHO $id_cli." ".$fone." ".$citu." ".$ender;
	}
?>
<br/>
<br /><a href="alter_clientes1.php" class="botaoForm">Voltar</a>
</form>
</p>
</body>
</html>