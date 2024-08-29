<?php 
    include("setup.php");
    require("setup.php"); 
if (isset($_GET["txtnome"])) { 

$nome = $_GET["txtnome"]; 
 
if (empty($nome)) { 
	$sql = "SELECT * FROM produto"; 
} else { 
	$nome = "%".$nome."%"; 
	$sql = "SELECT * FROM produto WHERE descricao like '$nome'"; 
} 
sleep(1); 

$result = mysql_query($sql);  

// Verifica se a consulta retornou linhas 
if (mysql_num_rows ($result) > 0) {
 // Atribui o código HTML para montar uma tabela 
	$tabela = "<table border='1'> <thead> <tr> <th>COD.</th> <th>DESC.</th> <th>EST. MIN.</th> <th>ESTOQUE</th> <th>VALOR</th> <th>UN. MEDIDA</th> </tr> </thead> <tbody> <tr>"; 
	$return = "$tabela"; 

// Captura os dados da consulta e inseri na tabela HTML 
	while ($linha = mysql_fetch_array($result)) { 
		$return.= "<td>" . utf8_encode($linha["id_produto"]) . "</td>"; 
		$return.= "<td>" . utf8_encode($linha["descricao"]) . "</td>"; 
		$return.= "<td>" . utf8_encode($linha["estoque_min"]) . "</td>"; 
		$return.= "<td>" . utf8_encode($linha["quantidade"]) . "</td>"; 
		$return.= "<td>" . number_format($linha['valor'],2,',','.')."</td>"; 
		$return.= "<td>" . utf8_encode($linha["un_medida"]) . "</td>";
		$return.= "</tr>"; 
	} 
	echo $return.="</tbody></table>"; 
} else { 
// Se a consulta não retornar nenhum valor, exibi mensagem para o usuário 
	echo "Não foram encontrados registros!"; 
} 
} 

?>
