<?php 
session_start('login'); 
$user = $_POST['user']; 
$senha = $_POST['senha']; 

$con = mysql_connect("mysql.hostinger.com.br", "u247497129_satan", "123654789") or die ("Sem conexão com o servidor"); 
$select = mysql_select_db("u247497129_banco") or die("Sem acesso ao DB"); 

$result = mysql_query("SELECT * FROM usuario WHERE nome = '$user' AND senha = '$senha'");

if(mysql_num_rows ($result) > 0 ) { 
    $_SESSION['user'] = $user; 
    $_SESSION['senha'] = $senha;
    header('location:princ.php'); 
 }else{ 
    session_destroy();
    unset ($_SESSION['login']); 
	unset ($_SESSION['senha']); 
	header('location:msg.html'); 
} 

?>