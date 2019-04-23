<?php
	include("classeCabecalho.php");
	include("classeForm.php");
	include("conexao.php");
	
	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=funcionario";
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "nome";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o nome do funcionario...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "endereco";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o endereço...";	
    $f->add_input($parametros);	
    
	$parametros = null;
	$parametros["name"] = "telefone";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o telefone...";	
	$f->add_input($parametros);	

	$parametros = null;
	$parametros["name"] = "data_nasc";
	$parametros["type"] = "date";
	$parametros["label"] = "Data de Nascimento";	
    $f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "periodo_trabalho";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o periodo de trabalho (Manhã-Tarde-Noite)...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "cidade";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite a cidade...";	
	$f->add_input($parametros);	    

    $parametros = null;
	$parametros["name"] = "estado";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o estado...";	
	$f->add_input($parametros);	
	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
