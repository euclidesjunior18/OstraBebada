<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<form><p align="center">
<?php
	include("pro/setup.php");
    require("pro/setup.php");
       	
$user = $_SESSION['user'];
$senha = $_SESSION['senha'];
$senhad = $_POST['s_atual'];
$senha1 = $_POST['s_nova1'];
$senha2 = $_POST['s_nova2'];

if(($senha1 == $senha2) and isset($user) and isset($senhad) and isset($senha1) and isset($senha2) and isset($senha)){
	 
    $result = mysql_query("select * from usuario where nome = '$user'");
    
	if($senha != $senhad){
		ECHO "Senha digitada está errada";
	}else{
		mysql_query("update usuario set senha = '$senha1' where nome = '$user'") or die ("ERRO NA TENTATIVA DE ALTERAR A SENHA...");
		ECHO "A sua senha foi alterada. Nova senha: ".$senha1;
		$_SESSION['senha'] = $senha1;
	}
}else{
	header('location:princ.php'); 
}
?>
<br />
<br /><a href="princ.php" class="botaoForm">VOLTAR</a>
</form>
</p>
</body>
</html>