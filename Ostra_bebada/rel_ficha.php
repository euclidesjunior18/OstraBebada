<?php 
    include("pro/setup.php");
    require("pro/setup.php");
	
	if($tipo == false){
		header('location:princ2.php'); 
	}
	
	$pagina = $_SERVER['PHP_SELF'];//recebe a pagina atual
	
	$par = "";
    $resp = "";    
	$bol = false;
	$med = false;
		
	$idCli = $_POST['id_cli'];
	$citua = $_POST['citua'];
	
	if(!isset($idCli) and !isset($citua)){
		$idCli = $_GET['idcli'];
		$citua = $_GET['citua'];
	}
	
	if(!isset($idCli)){
		header('location:rel_ficha1.php');
	}
	
	if($idCli > 0){
		$par = "where id_cliente = ".$idCli;
		$bol = true;
		$med = true;
	}
	
	if ($citua == 2 and $bol == true){
		$par = $par." and situacao = true";
		$bol = true;
	}else{
		if($citua == 2){
			$par = "where situacao = true";
			$bol = true;
		}
	}
	if ($citua == 3 and $bol == true){
		$par = $par." and situacao = false";
		$bol = true;
	}else{
		if($citua == 3){
			$par = "where situacao = false";
			$bol = true;
		}
	}

	$par2 = "SELECT * FROM relficha ".$par;
	$result = mysql_query($par2);

	if(mysql_num_rows($result) > 0){
	$resp .= '<table id="tblPrin" border="1">';
		$resp .= '<tr>';
		$resp .= '<th> ID </th>';
		$resp .= '<th> DATA </th>';
		$resp .= '<th> USUARIO </th>';
		$resp .= '<th> DESCRICAO </th>';
		$resp .= '<th> VALOR </th>';
		$resp .= '<th> QTDE </th>';
		$resp .= '<th> TOTAL </th>';
		$resp .= '<th> NOME </th>';
		$resp .= '<th> CITUACAO </th></tr><tr>'; 

		while($row = mysql_fetch_array($result)){ 
			$resp .= '<td>'.$row['id_ficha'].'</td>';
			$resp .= '<td>'.$row['data_fic'].'</td>';
			$resp .= '<td>'.$row['nome_usuario'].'</td>';
			$resp .= '<td>'.$row['descricao'].'</td>';
			$resp .= '<td>'.number_format($row['valor'],2,',','.').'</td>';
			$resp .= '<td>'.$row['quantidade'].'</td>';
			$resp .= '<td>'.number_format($row['total'],2,',','.').'</td>';
			$resp .= '<td>'.$row['nome_cliente'].'</td>';
			$algo = $row['situacao'];
			if($algo == 0){
				$resp .= "<td><a href='pag_fic.php?cod=".$row['id_ficha']."&idcli=".$idCli."&citua=".$citua."&pag=".$pagina."' class='botaoForm2'>ABERTO</a></td>";
			}else{
				$resp .= '<td>PAGO</td>';
			}
			$resp .=  "</tr>";
		}

		$result2 = mysql_query("select sum(total) as tudo from relficha ".$par);
		while($row = mysql_fetch_array($result2)){ 
			$resp .=  "<tr><td colspan='6'>Soma do valor total:</td>";
			$resp .= "<td colspan='2'>".number_format($row['tudo'],2,',','.').'</td>';
			$resp .= "<td><a href='pag_fic.php?cod=0&idcli=".$idCli."&citua=".$citua."&pag=".$pagina."' class='botaoForm2'>RECEBER</a></td>";
			$resp .=  "</tr>";
		}
		
	}else{
		$resp = "NADA ENCONTRADO PARA OS DADOS INFORMADOS...";
	
	}
?>
<html>
<head>
	<title>Relatório de Clientes:: <?php echo $logado?></title>
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
		<h2>Resultado da pesquisa:</h2><br />
		<a href="rel_ficha1.php" class="botaoForm">Voltar</a>
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
