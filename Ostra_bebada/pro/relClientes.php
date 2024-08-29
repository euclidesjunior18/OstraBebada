<?php 
    include("setup.php");
    require("setup.php"); 
if (isset($_GET["txtnome"])) { 

$nome = $_GET["txtnome"]; 
 
if (empty($nome)) { 
	$sql = "SELECT * FROM cliente"; 
} else { 
	$nome = "%".$nome."%"; 
	$sql = "SELECT * FROM cliente WHERE nome like '$nome'"; 
} 
sleep(1); 

$result = mysql_query($sql);  

// Verifica se a consulta retornou linhas 
if (mysql_num_rows ($result) > 0) {
 // Atribui o código HTML para montar uma tabela 
	$tabela = "<table border='1'> <thead> <tr> <th>COD.</th> <th>NOME</th> <th>FONE</th> <th>ENDERECO</th> <th>CPF</th> <th>CITUACAO</th> </tr> </thead> <tbody> <tr>"; 
	$return = "$tabela"; 

// Captura os dados da consulta e inseri na tabela HTML 
	while ($linha = mysql_fetch_array($result)) { 
		$return.= "<td>" . utf8_encode($linha["id_cliente"]) . "</td>"; 
		$return.= "<td>" . utf8_encode($linha["nome"]) . "</td>"; 
		$return.= "<td>" . utf8_encode($linha["fone"]) . "</td>"; 
		$return.= "<td>" . utf8_encode($linha["endereco"]) . "</td>"; 
		$return.= "<td>" . utf8_encode($linha["cpf"]) . "</td>"; 
		$algo = $linha["cituacao"];
		if($algo == 1){
			$return.= "<td>ATIVO</td>";
		}else{
			$return.= "<td>BLOQUEADO</td>";
		} 
		$return.= "</tr>"; 
	} 
	echo $return.="</tbody></table>"; 
} else { 
// Se a consulta não retornar nenhum valor, exibi mensagem para o usuário 
	echo "Não foram encontrados registros!"; 
} 
} 

?>
