<?php	
	include("setup.php");
    require("setup.php");
	
if (isset($_GET["cod_f"])) { 

$id_fo = $_GET["cod_f"]; 
 
// Verifica se a vari�vel est� vazia 

if (!empty($id_fo)) { 
	$result = mysql_query ("SELECT nome FROM fornecedor WHERE id_fornecedor = '$id_fo'"); 
 
// Verifica se a consulta retornou linhas 
if (mysql_num_rows ($result) > 0) {
// Captura os dados da consulta e inseri na tabela HTML 
	while ($linha = mysql_fetch_array($result)) { 
		ECHO ($linha["nome"]);  
	}  
} else { 
// Se a consulta n�o retornar nenhum valor, exibi mensagem para o usu�rio 
	echo "Sem Registro"; 
}

} 
} 

	
	
?>