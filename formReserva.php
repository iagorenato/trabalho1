<?php
	include("classeCabecalho.php");
	include("classeForm.php");
	include("conexao.php");
	
	
	$parametros = null;
	$parametros["action"] = "insere.php?tabela=reserva";
	$parametros["method"] = "post";
	
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "data_reserva";
	$parametros["type"] = "date";
	$parametros["label"] = "Data da Reserva";
    $f->add_input($parametros);
    
	$parametros = null;
	$parametros["name"] = "data_devolucao";
	$parametros["type"] = "date";
	$parametros["label"] = "Data da Devolução";
	$f->add_input($parametros);


	$consulta = "SELECT ID_CLIENTE as value, CONCAT(NOME,'(',ID_CLIENTE,')') as label FROM CLIENTE ORDER BY NOME";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$clientes[] = $linha;
	}	
	$f->add_select("ID_CLIENTE",$clientes,"Selecione o Cliente");


	$consulta = "SELECT ID_FUNCIONARIO as value, CONCAT(NOME,'(',ID_FUNCIONARIO,')') as label FROM FUNCIONARIO ORDER BY NOME";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$funcionarios[] = $linha;
	}	
	$f->add_select("ID_FUNCIONARIO",$funcionarios,"Selecione o Funcionario");


	$consulta = "SELECT ID_LIVRO as value, CONCAT(TITULO,'(',EDITORA,')','(',ID_LIVRO,')') as label FROM LIVRO ORDER BY TITULO";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$livros[] = $linha;
	}	
	$f->add_select("ID_LIVRO",$livros,"Selecione o Livro");
	
	$parametros = "Enviar";
	$f->add_button($parametros);
	
	
	$f->exibe();
	
?>
