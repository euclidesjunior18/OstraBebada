<?php	
	include("setup.php");
    require("setup.php");
	
if (isset($_GET["cod_p"])) { 

$id_pr = $_GET["cod_p"]; 
 
// Verifica se a variável está vazia 

if (!empty($id_pr)) { 
	$result = mysql_query ("SELECT descricao FROM produto WHERE id_produto = '$id_pr'"); 
 
// Verifica se a consulta retornou linhas 
if (mysql_num_rows ($result) > 0) {
// Captura os dados da consulta e inseri na tabela HTML 
	while ($linha = mysql_fetch_array($result)) { 
		ECHO ($linha["descricao"]);  
	}  
} else { 
// Se a consulta não retornar nenhum valor, exibi mensagem para o usuário 
	echo "Sem Registro"; 
}

} 
} 

	
	
?>