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
	
	$fone = $_POST['fone'];
	$cnpj = $_POST['cnpj'];
	$nome = $_POST['nome'];
    
	$result = mysql_query("select * from fornecedor where cnpj = '$cnpj'");
    
		if(mysql_num_rows ($result) > 0 ) {      
			ECHO "Um usuario com este CNPJ já  está cadastrado"; 
		}else{
			if(isset($fone) and isset($cnpj) and isset($nome)){
				mysql_query("insert into fornecedor (nome, fone, cnpj) values ('$nome', '$fone', '$cnpj')") or die ("ERRO DE CADASTRO");
				ECHO "O fornecedor <b>".$nome."</b> foi cadastrado...";
				ECHO "<br />Numero do telefone: ".$fone;
				ECHO "<br />CNPJ: ".$cnpj;
				
				$result = mysql_query("select * from fornecedor where cnpj = '$cnpj'");
				while($row = mysql_fetch_array($result)){
					ECHO "<br />ID DO FORNECEDOR: ".$row['id_fornecedor'];
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