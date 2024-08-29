<?php 
     error_reporting(E_ERROR | E_WARNING | E_PARSE);//para desativar aquela porra do Notice...
     
	 session_start('login');
        if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['senha']) == true)) { 
                 unset($_SESSION['user']); 
	             unset($_SESSION['senha']);
                 header('location:index.php'); 
        }
     
     $logado = $_SESSION['user'];
	 
	 # Informa qual o conjunto de caracteres será usado.
	 # header('Content-Type: text/html; charset=utf-8');
				 
     $con = mysql_connect("mysql.hostinger.com.br", "u247497129_satan", "123654789") or die ("Sem conexão com o servidor"); 
     $select = mysql_select_db("u247497129_banco") or die ("Sem acesso ao DB"); 
     
	 mysql_query("SET NAMES 'utf8'"); //este e os comandos pra baixo, vai deixar os textos no banco com UTF-8.
 	 mysql_query("SET NAMES 'utf8'");
	 mysql_query('SET character_set_connection=utf8');
	 mysql_query('SET character_set_client=utf8');
	 mysql_query('SET character_set_results=utf8');//até aqui hó...
	 
	 $res = mysql_query("select * from usuario where nome = '$logado'");
	  
	 while($row = mysql_fetch_array($res)){ 
         $cit = $row['cituacao'];
		 $tipo = $row['tipo'];
		 $id = $row['id_usuario'];
        }
	 
	 if($cit == false){
	     session_unset('login');
		 echo "Usuario está bloqueado";
	     header('location:index.php'); 
	    }
?>