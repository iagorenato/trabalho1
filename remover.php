<?php

	include("classeCabecalho.php");
	include("classeBancoDeDados.php");
	
	$operacao = new BancoDeDados($conexao);
	
	$operacao->remocao($_GET["tabela"],$_GET["id"]);
	
	
	echo $_GET["tabela"]." removido(a) com sucesso.";


?>