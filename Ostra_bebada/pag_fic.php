
<?php
	include("pro/setup.php");
    require("pro/setup.php");
	
	// esta pagina deve vir da /Ostra_bebada/rel_ficha.php
	
	$idCli = $_GET['idcli'];
	$citua = $_GET['citua'];
	$cod = $_GET['cod'];
	$pag = $_GET['pag'];
	
	if($pag != "/Ostra_bebada/rel_ficha.php"){
		header('location:princ.php');
	}
	
	if($tipo == false){
		header('location:princ2.php'); 
	}
	
	echo $idCli." ".$citua." ".$cod;
	
	if(!isset($idCli) or !isset($citua) or !isset($cod)){
		header('location:princ.php');
	}else{
		
		if($cod == 0){
			mysql_query("update ficha set situacao = 1 where id_cliente = '$idCli'") or die("ERRO");
			header('location:rel_ficha.php?idcli='.$idCli.'&citua='.$citua);
		}
		
		mysql_query("update ficha set situacao = 1 where id_ficha = '$cod'") or die("ERRO");
		header('location:rel_ficha.php?idcli='.$idCli.'&citua='.$citua);
	}
?>
<br /><a href="rel_ficha.php?<?php echo 'idcli='.$idCli.'&citua='.$citua;?>">VOLTAR</a>