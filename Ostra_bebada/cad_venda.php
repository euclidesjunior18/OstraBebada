<?php 
    include("pro/setup.php");
    require("pro/setup.php");
	
	function getData(){
		$presente = "20".date("y/m/d");
		return $presente;
	}	
?>
<html>
<head>
	<title>Cadastro de Venda:: <?php echo $logado?></title>
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
		<form method="post" action="cad_ven.php" id="form" name="form">
			<h3>CADASTRO DE VENDA:</h3><br />
			<table>
			<tr>
			<td>Data:</td>
			<td><input type="text" name="data" id="data" value="<?php ECHO getData()?>" readonly /><br /></td>
			</tr>
			<tr>
			<td>Codigo produto:</td>
			<td><input type="text" name="cod_p" id="cod_p"  onkeyup="getNomePro(); getValPro();" /> <a href="pesc_produto.php" target="blank" class="botaoForm">P</a><br /></td>
			</tr>
			<tr>
			<td>Desc.:</td>
			<td id="desc_p"><input type="text" readonly /></td>
			</tr>
			<tr>
			<td>Valor unitário:<br /></td>
			<td id="valP"><input type="text" readonly /></td>
			</tr>
			<tr>
			<td>Quantidade:</td>
			<td><input type="text" name="qtde" id="qtde" onkeyup="ttVenda();" /><br /></td>
			</tr>
			<tr>
			<td>Total:</td>
			<td><input type="text" name="total" id="total" readonly /><br /></td>
			</tr>
			<tr>
			<td>CÓD. CLIENTE:</td>
			<td><input type="text" name="id_cli" id="id_cli" onkeyup="getNomeCli();" /> <a href="pesc_cliente.php" target="blank" class="botaoForm">P</a> <br /></td>
			</tr>
			<tr>
			<td>Nome:</td>
			<td id="desc_c"><input type="text" readonly /></td>
			</tr>
            <tr>
			<td colspan="2"><p align="center"><input type="submit" value="OK" class="botaoForm" onmouseover="verfCadVenda();" /> 
			<a href="princ.php" class="botaoForm" >Voltar</a></p></td>
			<tr></table>
		</form>
    </div>
	</div>    
</body>
</html>
