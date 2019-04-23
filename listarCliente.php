<?php


	include("classeCabecalho.php");
	
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	$tabela[]="CLIENTE";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_CLIENTE as ID";
	$coluna[]= "NOME as Nome";
	$coluna[]= "ENDERECO as Endereco";
    $coluna[]= "TELEFONE as Telefone";
    $coluna[]= "DATA_NASC as 'Data de Nascimento'";
	$coluna[]= "CIDADE as Cidade";
	$coluna[]= "ESTADO as Estado";



	$condicao = null;
	$ordenacao = "nome";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"CLIENTE",true);
	
	$t->exibe();

?>