<?php


	include("classeCabecalho.php");
	
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	$tabela[]="CATEGORIA_LIVRO";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_CATEGORIA_LIVRO as 'Cod Categoria'";
	$coluna[]= "NUM_MAX_DIAS_EMP as 'Maximo Dias de Emprestimo'";
	$coluna[]= "DESCRICAO_CATEGORIA as 'Descrição'";


	$condicao = null;
	$ordenacao = null;
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"CATEGORIA_LIVRO",true);
	
	$t->exibe();

?>