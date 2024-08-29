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
	
	$id_pro = $_POST['id_pro'];
	$desc = $_POST['desc'];
	$qtde = $_POST['qtde'];
	$valor = $_POST['valor'];
	$un_med = $_POST['un_med'];
	$est_min = $_POST['est_min'];
	
	if(isset($id_pro) and isset($desc) and isset($qtde) and isset($valor) and isset($un_med) and isset($est_min)){
		
		mysql_query("update produto set descricao = '$desc', quantidade = '$qtde', valor = '$valor', un_medida = '$un_med', estoque_min = '$est_min' where id_produto = '$id_pro'") or die ("ERRO NA TENTATIVA DE ALTERAR O produto...");
		ECHO "O produto foi alterado...";
	}else{
		ECHO 'ERROR!!! AS VARIAVEIS NÂO FORAM INICIADAS...'; 
		ECHO $id_pro." ".$valor." ".$qtde." ".$desc;
	}
?>
<br />
<br /><a href="alter_produtos1.php" class="botaoForm">Voltar</a>
</form>
</p>
</body>
</html>