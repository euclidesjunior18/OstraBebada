<?php	
	include("setup.php");
    require("setup.php");
	
if (isset($_GET["cod_p"])) { 

$id_pr = $_GET["cod_p"]; 
 
// Verifica se a vari�vel est� vazia 

if (!empty($id_pr)) { 
	$result = mysql_query ("SELECT descricao FROM produto WHERE id_produto = '$id_pr'"); 
 
// Verifica se a consulta retornou linhas 
if (mysql_num_rows ($result) > 0) {
// Captura os dados da consulta e inseri na tabela HTML 
	while ($linha = mysql_fetch_array($result)) { 
		ECHO ($linha["descricao"]);  
	}  
} else { 
// Se a consulta n�o retornar nenhum valor, exibi mensagem para o usu�rio 
	echo "Sem Registro"; 
}

} 
} 

	
	
?>