<?php


	include("classeCabecalho.php");
	
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	$tabela[]="FUNCIONARIO";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_FUNCIONARIO as ID";
	$coluna[]= "NOME as Nome";
	$coluna[]= "ENDERECO as Endereco";
    $coluna[]= "TELEFONE as Telefone";
    $coluna[]= "DATA_NASC as 'Data de Nascimento'";
    $coluna[]= "PERIODO_TRABALHO as 'Periodo de Trabalho'";
	$coluna[]= "CIDADE as Cidade";
	$coluna[]= "ESTADO as Estado";



	$condicao = null;
	$ordenacao = "nome";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"FUNCIONARIO",true);
	
	$t->exibe();

?>