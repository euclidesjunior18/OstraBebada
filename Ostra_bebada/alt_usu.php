<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<form><p align="center">
<?php 
    include("pro/setup.php");
    require("pro/setup.php");
	
	if($tipo == false){
	     header('location:princ2.php'); 
	}
	
	$ids = $_POST['id_usu'];
	$tipos = $_POST['tipo_usu'];
	$citu = $_POST['citu_usu'];
	
	if(isset($ids) and isset($tipos) and isset($citu)){
		if($tipos == 'supe'){
			$tipos = 1;
		}else{
			$tipos = 0;
		}
		if($citu == 'ativ'){
			$citu = 1;
		}else{
			$citu = 0;
		}
		mysql_query("update usuario set tipo = '$tipos', cituacao = '$citu' where id_usuario = '$ids'") or die ("ERRO NA TENTATIVA DE ALTERAR O USUARIO...");
		ECHO "O Usuario foi alterado...";
	}else{
		ECHO 'ERROR!!! AS VARIAVEIS NÂO FORAM INICIADAS...'; 
	}
?>
<br />
<br /><a href="princ.php" class="botaoForm">Voltar</a>
</form>
</p>
</body>
</html>