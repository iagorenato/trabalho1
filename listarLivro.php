<?php


	include("classeCabecalho.php");
	
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	$tabela[]="livro";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_LIVRO as 'Cod Livro'";
	$coluna[]= "TITULO as 'Titulo Livro'";
	$coluna[]= "AUTOR as Autor";
    $coluna[]= "EDITORA as Editora";
    $coluna[]= "NUMERO_PAGINA as 'Numero de Paginas'";
	$coluna[]= "ID_CAT_LIVRO as 'Cod Categoria Livro'";



	$condicao = null;
	$ordenacao = "TITULO";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"LIVRO",true);
	
	$t->exibe();

?>