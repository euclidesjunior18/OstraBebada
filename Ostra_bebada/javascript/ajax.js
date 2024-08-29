/** * Fun��o para criar um objeto XMLHTTPRequest */ 
function CriaRequest() { 
	try{ 
		request = new XMLHttpRequest(); 
		}catch (IEAtual){ try{ 
			request = new ActiveXObject("Msxml2.XMLHTTP"); 
		}catch(IEAntigo){ 
			try{ request = new ActiveXObject("Microsoft.XMLHTTP"); 
			}catch(falha){ 
				request = false; 
			} 
		} 
	} 
	
	if (!request) alert("Seu Navegador n�o suporta Ajax!"); 
	else return request; } 

	/** * Fun��o para enviar os dados */ 
function getNomePro() { 
// Declara��o de Vari�veis 
	var id = document.getElementById("cod_p").value; 
	var result = document.getElementById("desc_p"); 
	var xmlreq = CriaRequest(); 
	
// Iniciar uma requisi��o 
	xmlreq.open("GET", "pro/getDescPro.php?cod_p=" + id, true); 
	
// Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado 
	xmlreq.onreadystatechange = function(){ 
	// Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4) 
	if (xmlreq.readyState == 4) { 
		// Verifica se o arquivo foi encontrado com sucesso 
		if (xmlreq.status == 200) { 
			result.innerHTML = xmlreq.responseText; 
		}else{ 
			result.innerHTML = "Erro: " + xmlreq.statusText; 
		} 
	  } 
    };
 xmlreq.send(null); 
 
}

function getNomeFor() { 
// Declara��o de Vari�veis 
	var id = document.getElementById("cod_f").value; 
	var result = document.getElementById("desc_f"); 
	var xmlreq = CriaRequest(); 
	
// Iniciar uma requisi��o 
	xmlreq.open("GET", "pro/getNomeFor.php?cod_f=" + id, true); 
	
// Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado 
	xmlreq.onreadystatechange = function(){ 
	// Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4) 
	if (xmlreq.readyState == 4) { 
		// Verifica se o arquivo foi encontrado com sucesso 
		if (xmlreq.status == 200) { 
			result.innerHTML = xmlreq.responseText; 
		}else{ 
			result.innerHTML = "Erro: " + xmlreq.statusText; 
		} 
	  } 
    };
 xmlreq.send(null); 
 
}

function getValPro() { 
// Declara��o de Vari�veis 
	var id = document.getElementById("cod_p").value; 
	var result = document.getElementById("valP"); 
	var xmlreq = CriaRequest(); 
	
// Iniciar uma requisi��o 
	xmlreq.open("GET", "pro/getValPro.php?cod_p=" + id, true); 
	
// Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado 
	xmlreq.onreadystatechange = function(){ 
	// Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4) 
	if (xmlreq.readyState == 4) { 
		// Verifica se o arquivo foi encontrado com sucesso 
		if (xmlreq.status == 200) { 
			result.innerHTML = xmlreq.responseText; 
		}else{ 
			result.innerHTML = "Erro: " + xmlreq.statusText; 
		} 
	  } 
    };
 xmlreq.send(null); 
 
}

function getNomeCli() { 
// Declara��o de Vari�veis 
	var id = document.getElementById("id_cli").value; 
	var result = document.getElementById("desc_c"); 
	var xmlreq = CriaRequest(); 
	
// Iniciar uma requisi��o 
	xmlreq.open("GET", "pro/getNomeCli.php?cod_p=" + id, true); 
	
// Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado 
	xmlreq.onreadystatechange = function(){ 
	// Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4) 
	if (xmlreq.readyState == 4) { 
		// Verifica se o arquivo foi encontrado com sucesso 
		if (xmlreq.status == 200) { 
			result.innerHTML = xmlreq.responseText; 
		}else{ 
			result.innerHTML = "Erro: " + xmlreq.statusText; 
		} 
	  } 
    };
 xmlreq.send(null); 
 
}

function getClientes() { 
// Declara��o de Vari�veis 
	var nome = document.getElementById("txtnome").value; 
	var result = document.getElementById("Resultado"); 
	var xmlreq = CriaRequest(); 
	
// Iniciar uma requisi��o 
	xmlreq.open("GET", "pro/relClientes.php?txtnome=" + nome, true); 
	
// Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado 
	xmlreq.onreadystatechange = function(){ 
	// Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4) 
	if (xmlreq.readyState == 4) { 
		// Verifica se o arquivo foi encontrado com sucesso 
		if (xmlreq.status == 200) { 
			result.innerHTML = xmlreq.responseText; 
		}else{ 
			result.innerHTML = "Erro: " + xmlreq.statusText; 
		} 
	  } 
    };
 xmlreq.send(null); 
 
}

function getProdutos() { 
// Declara��o de Vari�veis 
	var nome = document.getElementById("txtnome").value; 
	var result = document.getElementById("Resultado"); 
	var xmlreq = CriaRequest(); 
	
// Iniciar uma requisi��o 
	xmlreq.open("GET", "pro/relProdutos.php?txtnome=" + nome, true); 
	
// Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado 
	xmlreq.onreadystatechange = function(){ 
	// Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4) 
	if (xmlreq.readyState == 4) { 
		// Verifica se o arquivo foi encontrado com sucesso 
		if (xmlreq.status == 200) { 
			result.innerHTML = xmlreq.responseText; 
		}else{ 
			result.innerHTML = "Erro: " + xmlreq.statusText; 
		} 
	  } 
    };
 xmlreq.send(null); 
 
}

