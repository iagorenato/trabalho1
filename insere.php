<?php

	include("classeCabecalho.php");
	include("classeBancoDeDados.php");
	
	
	
	
	$operacao = new BancoDeDados($conexao);
	$operacao->insercao($_GET["tabela"],$_POST);
	
	
	echo $_GET["tabela"]." cadastrado(a) com sucesso.";


?>