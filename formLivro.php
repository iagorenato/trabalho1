<?php
	include("classeCabecalho.php");
	include("classeForm.php");
	include("conexao.php");
	
	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=livro";
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "titulo";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o titulo do livro...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "autor";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o autor do livro...";	
    $f->add_input($parametros);	

	$parametros = null;
	$parametros["name"] = "editora";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite a editora...";	
    $f->add_input($parametros);	

	$parametros = null;
	$parametros["name"] = "numero_pagina";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o numero de paginas...";	
    $f->add_input($parametros);	
	
	$consulta = "SELECT ID_CATEGORIA_LIVRO as value, CONCAT(NUM_MAX_DIAS_EMP,'(',DESCRICAO_CATEGORIA	,')','(',ID_CATEGORIA_LIVRO,')') as label FROM categoria_livro ORDER BY ID_CATEGORIA_LIVRO";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$categoria[] = $linha;
	}	
	$f->add_select("ID_CAT_LIVRO",$categoria,'Categoria Livro');


	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
