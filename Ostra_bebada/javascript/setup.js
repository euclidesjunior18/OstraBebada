var nmm23 = 0;
function ocultarDiv(idDiv){	
	if ((nmm23 % 2)=="0"){
    	document.getElementById(idDiv).style.display = "block";
  	}else{
    	document.getElementById(idDiv).style.display = "none";
  	}
  	nmm23++;
}

function ttVenda(){
	val = document.form.qtde.value;
	val = val * (document.getElementById('valP').innerHTML);
	document.form.total.value = val;
}

function verfCadCompra(){
	camp1 = document.form.cod_p.value;
	camp2 = document.form.quan.value;
	camp3 = document.form.cod_f.value;
    camp4 = document.form.n_nota.value;

    if(camp1 == "" || camp2 == "" || camp3 == "" || camp4 == ""){
    	alert("Os campos não podem ficar em branco!!!");
    }
}

function verfCadVenda(){
	camp1 = document.form.cod_p.value;
	camp2 = document.form.qtde.value;

    if(camp1 == "" || camp2==""){
    	alert("Os campos não podem ficar em branco!!!");
    }
}

function verfCadUser(){
	camp1 = document.form.nome.value;
	camp2 = document.form.senha.value;

    if(camp1 == "" || camp2==""){
    	alert("Os campos não podem ficar em branco!!!");
    }
}

function verfCadFornecedor(){
	camp1 = document.form.nome.value;
	camp2 = document.form.cnpj.value;

    if(camp1 == "" || camp2==""){
    	alert("Os campos não podem ficar em branco!!!");
    }
}


function verfCadCliente(){
	camp1 = document.form.nome.value;
	camp2 = document.form.cpf.value;

    if(camp1 == "" || camp2==""){
    	alert("Os campos não podem ficar em branco!!!");
    }
}

function verfCadProduto(){
	camp1 = document.form.desc.value;
	camp2 = document.form.qtde.value;
	camp3 = document.form.vl_un.value;

    if(camp1 == "" || camp2 == "" || camp3 == ""){
    	alert("Os campos não podem ficar em branco!!!");
    }
}
