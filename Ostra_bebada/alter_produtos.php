<?php 
    include("pro/setup.php");
    require("pro/setup.php");
	
	if($tipo == false){
	     header('location:princ2.php'); 
	}
	
	$id_pro = $_POST['id_pro'];
	
	if(isset($id_pro)){ 
        $result = mysql_query("select * from produto where id_produto = '$id_pro'");
        
		if(mysql_num_rows ($result) == 0){
			header('location:alter_produtos1.php');
		}
		
		while($row = mysql_fetch_array($result)){ 
			$desc = $row['descricao'];
			$est_min = $row['estoque_min'];
			$qtde = $row['quantidade'];
			$valor = $row['valor'];
			$un_med = $row['un_medida'];
        }
		
	}else{
		header('location:alter_produtos1.php'); 
	}
?>
<html>
<head>
	<title>Dados Produto :: <?php echo $desc?></title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script language="JavaScript" src="javascript/setup.js"></script>
</head>
<body>
	<div id="cab">
		<div id="logo" onclick="ocultarDiv('opc')">
		<div id="opc"  >
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
	<p>DADOS DO PRODUTO<br/>
	ID: <?php echo $id_pro?> <br/>
	Descrição: <?php echo $desc?> <br/>
	Estoque minimo: <?php echo $est_min?> <br/>
	Quantidade: <?php echo $qtde?> <br/>
	Valor unitário: <?php echo $valor?> <br/>
	Unidade de medida: <?php echo $un_med?> <br/></p>

	<form method="post" action="alt_pro.php" id="form" name="form">
		ALTERAR PRODUTO<br />
		ID:
		<input type="text" value="<?php echo $id_pro?>" name="id_pro" readonly  size="5px"/>
		Descrição:
		<input type="text" value="<?php echo $desc?>" name="desc" readonly />
		Quantidade:
		<input type="text" value="<?php echo $qtde?>" name="qtde" />
		Valor:
		<input type="text" name="valor"  value="<?php echo $valor?>" />
		Unidade de medida:
		<select name="un_med">
			<option value="un">Unitário</option>
			<option value="kg">Kilo</option>
			<option value="l">Litro</option>
		</select>
		Estoque minimo:	 
		<select name="est_min">
			<option value="0">00</option>
			<option value="1">01</option>
			<option value="2">02</option>
			<option value="3">03</option>
			<option value="4">04</option>
			<option value="5">05</option>
			<option value="6">06</option>
			<option value="7">07</option>
			<option value="8">08</option>
			<option value="9">09</option>
		</select>
		<input type="submit" value="Alterar" class="botaoForm" />
		<a href="alter_usuarios1.php" class="botaoForm">Voltar</a>
	</form>
	</div>
	</div>
</body>
</html>
