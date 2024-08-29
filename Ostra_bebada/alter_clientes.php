<?php 
    include("pro/setup.php");
    require("pro/setup.php");
	
	if($tipo == false){
	     header('location:princ2.php'); 
	}
	
	$id_cli = $_POST['id_cli'];
	
	if(isset($id_cli)){ 
        $result = mysql_query("select * from cliente where id_cliente = '$id_cli'");
        
		if(mysql_num_rows ($result) == 0){
			header('location:alter_clientes1.php');
		}
		
		while($row = mysql_fetch_array($result)){ 
			$cit = $row['cituacao'];
			$fone = $row['fone'];
			$ender = $row['endereco'];
			$cpf = $row['cpf'];
			$nome = $row['nome'];
			
			if($cit == 1){
				$cit = 'Ativo';
			}else{
				$cit = 'Bloqueado';
			}
        }
		
	}else{
		header('location:alter_clientes1.php'); 
	}
?>
<html>
<head>
	<title>Dados Usuario:: <?php echo $nome?></title>
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
	<p>DADOS DO CLIENTE<br/>
	ID: <?php echo $id_cli?> <br/>
	Nome do cliente: <?php echo $nome?> <br/>
	Telefone: <?php echo $fone?> <br/>
	Endereço: <?php echo $ender?> <br/>
	CPF: <?php echo $cpf?> <br/>
	Cituação: <?php echo $cit?> <br/></p>

	<form method="post" action="alt_cli.php" id="form" name="form">
		ALTERAR CLIENTE<br />
		ID:
		<input type="text" value="<?php echo $id_cli?>" name="id_cli" readonly  size="5px"/>
		Nome:
		<input type="text" value="<?php echo $nome?>" name="nome" readonly />
		CPF:
		<input type="text" value="<?php echo $cpf?>" name="cpf" readonly />
		Fone:
		<input type="text" name="fone"  value="<?php echo $fone?>" />
		Endereço:
		<input type="text" name="ender"  value="<?php echo $ender?>" />
		CITUACÃO:	 
		<select name="cit_cli">
			<option value="ativ">Ativo</option>
			<option value="bloq">Bloqueado</option>
        </select>
		<input type="submit" value="Alterar" class="botaoForm" />
		<a href="alter_clientes1.php" class="botaoForm" >Voltar</a>
	</form>
	</div>
	</div>
</body>
</html>
