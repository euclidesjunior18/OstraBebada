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
	
	$id_for = $_POST['id_for'];
	$fone = $_POST['fone'];
	$citu = $_POST['cit_for'];
	$nome = $_POST['nome'];
	
	if(isset($id_for) and isset($nome) and isset($citu) and isset($fone)){
		
		if($citu == 'ativ'){
			$citu = 1;
		}else{
			$citu = 0;
		}
		mysql_query("update fornecedor set fone = '$fone', cituacao = '$citu', nome = '$nome' where id_fornecedor = '$id_for'") or die ("ERRO NA TENTATIVA DE ALTERAR O FORNECEDOR...");
		ECHO "O fornecedor foi alterado...";
	}else{
		ECHO 'ERROR!!! AS VARIAVEIS NÂO FORAM INICIADAS...'; 
		ECHO $id_for." ".$fone." ".$citu." ".$nome;
	}
?>
<br />
<br /><a href="alter_fornecedores1.php" class="botaoForm">Voltar</a>
</form>
</p>
</body>
</html>