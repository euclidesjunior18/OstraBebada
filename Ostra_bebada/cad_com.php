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
	
	$dt = "20".date("y-m-d");
	$cod_pr = $_POST['cod_p'];
	$cod_fo = $_POST['cod_f'];
	$n_nota = $_POST['n_nota'];
	$qtn = $_POST['quan'];
	$valor = $_POST['valor'];
    
		if(!isset($dt) and !isset($cod_pr) and !isset($cod_fo) and !isset($n_nota) and !isset($qtn)) {      
			ECHO "Dados Digitados estão de alguma forma errado!!!!"; 
		}else{
			mysql_query("insert into compra (data_com, id_produto, id_fornecedor, num_nota, quantidade, valor) values ('$dt', '$cod_pr', '$cod_fo', '$n_nota', '$qtn', '$valor')") or die ("ERRO DE CADASTRO");
			ECHO "Compra dastrada com sucesso!!! <br />";
			
			mysql_query("update produto set quantidade = quantidade + '$qtn' where id_produto = '$cod_pr'") or die ("ERRO NA TENTATIVA DE ATUALIZAR O ESTOQUE");
			ECHO "Estoque do produto atualizado!!! <br />";
		}
?>
<br />
<br /><a href="princ.php" class="botaoForm">VOLTAR</a>
</p>
</form>
</body>
</html>