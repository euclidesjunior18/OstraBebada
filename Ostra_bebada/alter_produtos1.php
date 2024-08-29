<?php 
    include("pro/setup.php");
    require("pro/setup.php");
	if($tipo == false){
	     header('location:princ2.php'); 
	}
?>
<html>
<head>
	<title>Alterar Produtos:: <?php echo $logado?></title>
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
	<nav>
		<ul class="menu">
			<li><a href="#"> Clientes </a>
				<ul>
	                  <li><a href="alter_clientes1.php">Alterar Clientes</a></li>
	                  <li><a href="cad_cliente.php">Cadastrar Cliente</a></li>
	                  <li><a href="pesc_cliente.php">Pesquisa de Cliente</a></li>                    
	       		</ul>
			</li>
			<li><a href="#"> Fornecedores </a>
				<ul>
	                  <li><a href="alter_fornecedores1.php">Alterar Fornecedor</a></li>
	                  <li><a href="cad_fornecedor.php">Cadastrar Fornecedor</a></li>                    
	       		</ul>
			</li>
	  		<li><a href="#"> Produtos </a>
	         	<ul>
	                  <li><a href="alter_produtos1.php">Alterar Produtos</a></li>
	                  <li><a href="cad_produto.php">Cadastrar Produtos</a></li>
	                  <li><a href="pesc_produto.php">Pesquisa de Produtos</a></li>                    
	       		</ul>
			</li>
			<li><a href="#"> Operações </a>
				<ul>
	                  <li><a href="cad_venda.php">Venda</a></li>
	                  <li><a href="cad_compra.php">Compra</a></li>                
	       		</ul>
			</li>
			<li><a href="#"> Relatórios </a>
				<ul>
	                  <li><a href="rel_venda1.php">Rel. Vendas</a></li>
	                  <li><a href="rel_compra1.php">Rel. Compras</a></li>
	                  <li><a href="rel_ficha1.php">Rel. Ficha</a></li>
					  <li><a href="rel_est_min.php">Rel. Estoque Minimo</a></li>
					  <li><a href="rel_geral1.php">Rel. Geral</a></li>
	       		</ul>
			</li>
			<li><a href="#"> Usuários </a>
				<ul>
	                  <li><a href="alter_usuarios1.php">Alterar usuário</a></li>
	                  <li><a href="cad_usuario.php">Cadastro de Usuário</a></li>                
	       		</ul>
			</li>
			<li><a href="opcoes_usuarios.php"> Alterar Senha </a></li>
			<li><a href="sair.php"> Sair </a></li>
		</ul>
	</nav>
	<div id="cont">
	<div id="coisa">
	<form method="post" action="alter_produtos.php" id="form" name="form">
		Informe o ID do produto que deseja alterar.<br />
		<br /><p align="center">ID:  
		<input type="text" name="id_pro" />
		<input type="submit" value="ok" class="botaoForm" />
		<a href="princ.php" class="botaoForm" >Voltar</a>
	</form></p>
	<div id="conttbl">
	<?php
		$result = mysql_query('select * from produto'); 

		echo '<table id="tblPrin" border="1">';
		echo '<tr>';
		echo '<th> ID </th>';
		echo '<th> DESCRIÇÃO</th>';
		echo '<th> ESTOQUE MIN</th>';
		echo '<th> QUANTIDADE</th>';
		echo '<th> VALOR</th>';
		echo '<th> UN MEDIDA</th></tr><tr>'; 

		while($row = mysql_fetch_array($result)){ 
			echo '<td>'.$row['id_produto'].'</td>';
			echo '<td>'.$row['descricao'].'</td>';
			echo '<td>'.$row['estoque_min'].'</td>';
			echo '<td>'.$row['quantidade'].'</td>';
			echo '<td>'.number_format($row['valor'],2,',','.').'</td>';
			echo '<td>'.$row['un_medida'].'</td>';			
			echo "</tr>";
		}
	?>
	</div>
	</div>
	</div>
	
</body>
</html>
