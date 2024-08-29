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
	
	$desc = $_POST['desc'];
	$est_min = $_POST['est_min'];
	$qtde = $_POST['qtde'];
	$vl_un = $_POST['vl_un'];
	$un_me = $_POST['un_me'];
    
	$result = mysql_query("select * from produto where descricao = '$desc'");
    
		if(mysql_num_rows ($result) > 0 ) {      
			ECHO "Já existe um produto cadastrado com está descrição."; 
		}else{
			if(isset($desc) and isset($est_min) and isset($qtde) and isset($vl_un) and isset($un_me)){
				mysql_query("insert into produto (descricao, estoque_min, quantidade, valor, un_medida) values ('$desc', '$est_min', '$qtde', '$vl_un', '$un_me')") or die ("ERRO DE CADASTRO");
				ECHO "O Produto foi cadastrado:<br />Descrição: ".$desc;
				ECHO "<br />Estoque minimo: ".$est_min;
				ECHO "<br />Quantidade em estoque: ".$qtde;
				ECHO "<br />Valor unitário: ".$vl_un;
				ECHO "<br />Unidade de medida: ".$un_me;
				
				$result = mysql_query("select * from produto where descricao = '$desc'");
				while($row = mysql_fetch_array($result)){
					ECHO "<br />ID do produto:".$row['id_produto'];
				}
			}else{
				header('location:princ.php');
			}		
	
		}
?>
<br />
<br /><a href="princ.php" class="botaoForm" >VOLTAR</a>
</form>
</p>
</body>