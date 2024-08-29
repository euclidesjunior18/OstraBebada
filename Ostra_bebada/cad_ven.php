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
	
	$dt = "20".date("y-m-d");
	$cod_p = $_POST['cod_p'];
	$qtde = $_POST['qtde'];
	$cli  = $_POST['id_cli'];
	$usu = $id;
	$cit_c = true;
		if($cli > 0){
		$respz = mysql_query("select cituacao from cliente where id_cliente = '$cli'");
			while($row = mysql_fetch_array($respz)){
				$cit_c = $row['cituacao'];
			}
		}
		if($cit_c == true){
		
		if(isset($cod_p) and isset($qtde)) {      
				mysql_query("insert into venda (data_ven, id_produto, id_usuario, quantidade) values ('$dt', '$cod_p', '$usu', '$qtde')") or die ("ERRO DE CADASTRO");
				ECHO "Venda Cadastrada!<br />";
				
				if($cli > 0){
					$resp = mysql_query("select max(id_venda) as ven from venda");
					while($row = mysql_fetch_array($resp)){
						$id_ven = $row['ven'];
					}
					mysql_query("insert into ficha (data_fic, id_venda, id_cliente) values ('$dt', '$id_ven', '$cli')") or die ("ERRO DE CADASTRO");
					ECHO "Cadastro da venda realizado para o cliente!!!<br />";
				}
				mysql_query("update produto set quantidade = quantidade - '$qtde' where id_produto = '$cod_p'") or die ("ERRO DE Atualizar estoque.");
				ECHO "Estoque ATUALIZADO!";
				
		}else{
			//ECHO $dt.", codp ".$cod_p.", quant ".$qtde.", cli ".$cli.", usu ".$usu;
			header('location:cad_venda.php');				
		}
		
		}else{
			ECHO "ESTE CLIENTE ESTÁ BLOQUEADO!!!";
		}
?>
<br />
<br /><a href="cad_venda.php" class="botaoForm">VOLTAR</a>
</form>
</p>
</body>
</html>