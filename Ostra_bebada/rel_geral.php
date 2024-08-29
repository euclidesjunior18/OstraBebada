<?php 
    include("pro/setup.php");
    require("pro/setup.php");
	
	if($tipo == false){
		header('location:princ2.php'); 
	}
	
	$par1 = "";
	$par2 = "";
	$par3 = "where ficha.situacao = 0";
	$bol = false;
	$resp1 = 0;
	$resp2 = 0;
	$resp3 = 0;
	
	$dIni = $_POST['diaC'];
	$mIni = $_POST['mesC'];
	$aIni = $_POST['anoC'];
	
	if(!isset($dIni)){
		header('location:rel_geral1.php');
	}
	
	if($dIni > 0){
		$par1 = "where day(data_ven) = ".$dIni;
		$par2 = "where day(data_com) = ".$dIni;
		$par3 = $par3." and day(data_fic) = ".$dIni;
		$bol = true;
	}
	
	if($mIni > 0 and $bol == true){
		$par1 = $par1." and month(data_ven) = ".$mIni;
		$par2 = $par2." and month(data_com) = ".$mIni;
		$par3 = $par3." and month(data_fic) = ".$dIni;
		$bol = true;
	}else{
		if($mIni > 0){
			$par1 = "where month(data_ven) = ".$mIni;
			$par2 = "where month(data_com) = ".$mIni;
			$par3 = $par3." and month(data_fic) = ".$mIni;
			$bol = true;
		}
	}
	
	if($bol ==  true){
		$par1 = $par1." and year(data_ven) = ".$aIni;
		$par2 = $par2." and year(data_com) = ".$aIni;
		$par3 = $par3." and year(data_fic) = ".$aIni;
	}else{
		$par1 = "where year(data_ven) = ".$aIni;
		$par2 = "where year(data_com) = ".$aIni;
		$par3 = $par3." and year(data_fic) = ".$aIni;
	}
	
	$result1 = mysql_query("select sum(venda.quantidade * produto.valor) as total from venda
							inner join produto
							on venda.id_produto = produto.id_produto ".$par1);
	$result2 = mysql_query("select sum(quantidade * valor) as total from compra ".$par2);
	$result3 = mysql_query("select sum(venda.quantidade * produto.valor) as total from ficha
							inner join venda 
							on ficha.id_venda = venda.id_venda
							inner join produto
							on venda.id_produto = produto.id_produto ".$par3);
	
	if(mysql_num_rows($result1) > 0){

		while($row = mysql_fetch_array($result1)){ 
			$resp1 = $row['total'];
		}
		
		while($row = mysql_fetch_array($result2)){ 
			$resp2 = $row['total'];
			//number_format($row['tudo'],2,',','.');
		}
		
		while($row = mysql_fetch_array($result3)){ 
			$resp3 = $row['total'];
		}
		
		$resp ='<table id="tblPrin" border="1">';
	
		$resp .= '<tr><th> Total de Vendas </th>';
		$resp .= '<th> Total de Compras </th>';
		$resp .= '<th> Vendas a Receber </th>';
		$resp .= '<th> Vendas Pagas </th>';
		$resp .= '<th> Saldo </th></tr>';
		
		$resp .= '<tr><td>'.number_format($resp1,2,',','.').'</td>';
		$resp .= '<td>'.number_format($resp2,2,',','.').'</td>';
		$resp .= '<td>'.number_format($resp3,2,',','.').'</td>';
		$resp .= '<td>'.number_format(($resp1 - $resp3),2,',','.').'</td>';
		$resp .= '<td>'.number_format((($resp1 - $resp3) - $resp2),2,',','.').'</td></tr>';
		
	}else{
		$resp = "NADA ENCONTRADO PARA OS DADOS INFORMADOS...";
	}
	
	
?>
<html>
<head>
	<title>Relatório Geral:: <?php echo $logado?></title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script language="JavaScript" src="javascript/setup.js"></script>
</head>
<body>
	<div id="cab">
		<div id="logo" onclick="ocultarDiv('opc')" >
		<div id="opc" >
			<a href="sair.php" class="botaoForm">sair</a>
			<a href="opcoes_usuarios.php" class="botaoForm">opçoes</a>
		</div>
		</div>	
	<h1>Conectado como <?php ECHO $_SESSION['user'];?></h1>
	</div>
	<div id="cont">
	<div id="coisa">
	<form method="post" action="" id="form" name="form">
		<h2>Resultado da pesquisa para o mês <?php echo $mIni?> do ano <?php echo $aIni?>:</h2><br />
		<a href="rel_geral1.php" class="botaoForm">Voltar</a>
	</form>
	<div id="conttbl">
	<?php
		echo $resp; 
	?>
	</div>
	</div>
	</div>	
</body>
</html>
