<?php
	include("classeCabecalho.php");
	include("classeForm.php");
	include("conexao.php");
	
	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=categoria_livro";
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "num_max_dias_emp";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Numero max de dias de emprestimo...";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "descricao_categoria";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Descrição da categoria...";	
    $f->add_input($parametros);	
	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
