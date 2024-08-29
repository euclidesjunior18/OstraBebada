<?php 
    include("pro/setup.php");
    require("pro/setup.php");
	
?>
<html>
<head>
	<title>Relatório de Itens em Falta:: <?php echo $logado?></title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script language="JavaScript" src="javascript/setup.js"></script>
</head>
<body>
    <div id="cab">
		<div id="logo"  onclick="ocultarDiv('opc')" >
		<div id="opc">
			<a href="sair.php" class="botaoForm">sair</a>
			<a href="opcoes_usuarios.php" class="botaoForm">opçoes</a>
		</div>
		</div>		
	<h1>Conectado como <?php ECHO $_SESSION['user'];?></h1>
	</div>
	<div id="cont">
	<div id="coisa">
		<form method="post" action="" id="form" name="form">
		<h3>Relátorio de itens em falta no estoque, data do acesso: <?php echo date('d/m/20y')?>.</h3> 
		<a href="princ.php" class="botaoForm">Voltar</a>
	</form>
	<div id="conttbl">
	<?php
		$result = mysql_query('select * from produto where quantidade < estoque_min'); 
		if(mysql_num_rows($result) > 0){
		echo '<table id="tblPrin" border="1">';
		echo '<tr>';
		echo '<th> CÓD. </th>';
		echo '<th> DESCRIÇÃO </th>';
		echo '<th> EST. MIN. </th>';
		echo '<th> QTDE </th>';
		echo '<th> VALOR </th></tr><tr>'; 

		while($row = mysql_fetch_array($result)){ 
			echo '<td>'.$row['id_produto'].'</td>';
			echo '<td>'.$row['descricao'].'</td>';
			echo '<td>'.$row['estoque_min'].'</td>';
			echo '<td>'.$row['quantidade'].'</td>';
			echo '<td>'.number_format($row['valor'],2,',','.').'</td>'; 
			echo "</tr>";
		}
		echo '<tr><td colspan="4">Valor total</td>';
		
		$resp = mysql_query('select sum(quantidade * valor) as total from produto where quantidade < estoque_min'); 
		while($row = mysql_fetch_array($resp)){ 
			echo '<td>'.number_format($row['total'],2,',','.').'</td></tr>';
		}
		
		}else{
			echo "Parabéns, não há produtos em falta no estoque!!!";
		}
	?>
	</div>
	</div>
	</div>

</body>
</html>
