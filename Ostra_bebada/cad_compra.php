<?php 
    include("pro/setup.php");
    require("pro/setup.php");
	if($tipo == false){
		header('location:princ2.php'); 
	}
	
	function getData(){
		$presente = "20".date("y/m/d");
		return $presente;
	}	
?>
<html>
<head>
	<title>Cadastro Compras:: <?php echo $logado?></title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script language="JavaScript" src="javascript/setup.js"></script>
	<script type="text/javascript" src="javascript/ajax.js"></script>
</head>
<body>
    <div id="cab" >
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
		<form method="post" action="cad_com.php" id="form" name="form">
			<h3>CADASTRO DE COMPRAS:</h3>
			<table>
			<tr>
			<td>Data:</td>
			<td><input type="text" name="data" id="data" value="<?php ECHO getData()?>" readonly /><br /></td>
			</tr>
			<tr><td>Cod. produto:</td>
			<td><input type="text" name="cod_p" id="cod_p"  onkeyup="getNomePro()" /><br /></td>
			</tr>
			<tr>
			<td>Desc.:</td>
			<td id="desc_p"><input type="text" readonly /></td>
			</tr>
			<tr><td>Quantidade:</td>
			<td><input type="text" name="quan" id="quan" /></td>
			</tr>
			<tr>
			<td>Valor unt:</td>
			<td><input type="text" name="valor" id="valor" /><br /></td>
			</tr>
			<tr>
			<td>Cod. fornecedor:</td>
			<td><input type="text" name="cod_f" id="cod_f" onkeyup="getNomeFor()" width="5"/><br /><td>
			</tr>
			<tr>
			<td>For.:</td><td id="desc_f"><input type="text" readonly /></td>
			</tr>
			<tr>
			<td>Num. Nota:</td>
			<td><input type="text" name="n_nota" id="n_nota" /><br /></td>						
			</tr>
			<td colspan="2">
			<p align="center"><input type="submit" value="Cadastrar" class="botaoForm" onmouseover="verfCadCompra();" />
			<a href="princ.php" class="botaoForm" >Voltar</a></p>
			</tr>
			</table>
		</form>
    </div>
	</div>    
</body>
</html>
