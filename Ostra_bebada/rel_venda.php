<?php 
    include("pro/setup.php");
    require("pro/setup.php");
	
	$par = "";
    $resp = "";    
	$bol = false;
	
	$dIni = $_POST['diaC'];
	$mIni = $_POST['mesC'];
	$aIni = $_POST['anoC'];
	
	$idUsu = $_POST['id_usu'];
	$idPro = $_POST['id_pro'];
	
	if(!isset($dIni)){
		header('location:rel_venda1.php');
	}
	
	if($idUsu > 0){
		$par = "where id_usuario = ".$idUsu;
		$bol = true;
	}
	
	if ($idPro > 0 and $bol == true){
		$par = $par." and id_produto = ".$idPro;
		$bol = true;
	}else{
		if($idPro > 0){
			$par = "where id_produto = ".$idPro;
			$bol = true;
		}
	}
	
	if($dIni > 0 and $bol == true){
		$par = $par." and day(data_ven) = ".$dIni;
		$bol = true;
	}else{
		if($dIni > 0){
			$par = "where day(data_ven) = ".$dIni;
			$bol = true;
		}
	}
	
	if($mIni > 0 and $bol == true){
		$par = $par." and month(data_ven) = ".$mIni;
		$bol = true;
	}else{
		if($mIni > 0){
			$par = "where month(data_ven) = ".$mIni;
			$bol = true;
		}
	}
	
	if($bol ==  true){
		$par = $par." and year(data_ven) = ".$aIni;
	}else{
		$par = "where year(data_ven) = ".$aIni;
	}
	
	$par2 = "SELECT * FROM relvenda ".$par;
	$result = mysql_query($par2);
	$par3 = "SELECT sum(total) as tudo FROM relvenda ".$par;
	$result2 = mysql_query($par3);
	
	if(mysql_num_rows($result) > 0){
	$resp .= '<table id="tblPrin" border="1">';
		$resp .= '<tr>';
		$resp .= '<th> DATA </th>';
		$resp .= '<th> USUARIO </th>';
		$resp .= '<th> PRODUTO </th>';
		$resp .= '<th> VL. UNT. </th>';
		$resp .= '<th> QTN </th>';
		$resp .= '<th> TOTAL </th></tr><tr>'; 

		while($row = mysql_fetch_array($result)){ 
			$resp .= '<td>'.$row['data_ven'].'</td>';
			$resp .= '<td>'.$row['nome'].'</td>';
			$resp .= '<td>'.$row['descricao'].'</td>';
			$resp .= '<td>'.number_format($row['valor'],2,',','.').'</td>';
			$resp .= '<td>'.$row['quantidade'].'</td>';
			$resp .= '<td>'.number_format($row['total'],2,',','.').'</td>';
			$resp .=  "</tr>";
		}
		
		while($row = mysql_fetch_array($result2)){ 
			$resp .= '<td colspan="4">Soma do valor Total:</td>';
			$resp .= '<td colspan="2">'.number_format($row['tudo'],2,',','.').'</td>';
		}
		
	}else{
		$resp = "NADA ENCONTRADO PARA OS DADOS INFORMADOS...";
	
	}
?>
<html>
<head>
	<title>Relat�rio de Vendas:: <?php echo $logado?></title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script language="JavaScript" src="javascript/setup.js"></script>
</head>
<body>
	<div id="cab">
		<div id="logo" onclick="ocultarDiv('opc')" >
		<div id="opc" >
			<a href="sair.php" class="botaoForm">sair</a>
			<a href="opcoes_usuarios.php" class="botaoForm">op�oes</a>
		</div>
		</div>	
	<h1>Conectado como <?php ECHO $_SESSION['user'];?></h1>
	</div>
	<div id="cont">
	<div id="coisa">
	<form method="post" action="" id="form" name="form">
		<h2>Resultado da pesquisa de vendas, <?php echo mysql_num_rows($result);?> linhas:</h2><br />
		<a href="rel_venda1.php" class="botaoForm">Voltar</a>
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
