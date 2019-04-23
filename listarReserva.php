<?php


	include("classeCabecalho.php");
	
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	$tabela[]="RESERVA";

	$bd = new BancoDeDados($conexao);
	
	$coluna[]= "ID_RESERVA as 'Cod Reserva'";
	$coluna[]= "DATA_RESERVA as 'Data Reserva'";
	$coluna[]= "DATA_DEVOLUCAO as 'Data Devolução'";
    $coluna[]= "ID_CLIENTE as 'Cod Cliente'";
    $coluna[]= "ID_FUNCIONARIO as 'Cod Funcionario'";
	$coluna[]= "ID_LIVRO as 'Cod Livro'";



	$condicao = null;
	$ordenacao = "DATA_RESERVA";
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);


	$t = new Tabela($m,"RESERVA",true);
	
	$t->exibe();

?>