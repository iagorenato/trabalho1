<?php

	include("interfaceExibicao.php");

	class Cabecalho implements Exibicao{
	
		private $charset;
		private $title;
		private $links;
		private $scripts;
		
		public function __construct($parametros){
			$this->charset = $parametros["charset"];
			$this->title = $parametros["title"];
			if(isset($parametros["links"])){
				$this->links = $parametros["links"];
			}
			if(isset($parametros["scripts"])){
				$this->scripts = $parametros["scripts"];
			}
		}
		
		public function exibe(){
			session_start();
			echo "<!DOCTYPE html>
					<html>
					<head>
						<meta charset='$this->charset' />
						 <title>$this->title</title>";
			if($this->links!=null){
					foreach($this->links as $i=>$l){
						echo "<link rel='stylesheet' href='$l' />";
					}
			}			 
			if($this->scripts!=null){
					foreach($this->scripts as $i=>$s){
						echo "<script type='text/javascript' src='$s'></script>";
					}
			}
			echo "
					</head>	
						<body>";
			
			$this->exibe_menu();
		}
		
		public function exibe_menu(){
			
			echo "<div id='menu'>
			
					Listar: 
						<ul>
							<li>
								<a href='listarCliente.php'>
								Clientes
								</a>
							</li>
							<li>
								<a href='listarFuncionario.php'>
								Funcionarios
								</a>
							</li>
							<li>
								<a href='listarCategoriaLivro.php'>
								Categorias Livros
								</a>
							</li>
							<li>
								<a href='listarLivro.php'>
								Livros
								</a>
							</li>
							<li>
								<a href='listarReserva.php'>
								Reservas
								</a>
							</li>							
						</ul>";
						
						
					echo "Cadastrar: 
						<ul>
							<li>
								<a href='formCategoriaLivro.php'>
								Categorias Livros
								</a>
							</li>
							<li>
								<a href='formFuncionario.php'>
								Funcionarios
								</a>
							</li>
							<li>
								<a href='formCliente.php'>
								Cliente
								</a>
							</li>
							<li>
								<a href='formLivro.php'>
								Livros
								</a>
							</li>
							<li>
								<a href='formReserva.php'>
								Reservas
								</a>
							</li>							
						</ul>
				 </div>
				 <hr />";
		}
	
	}
	
	
	$parametros["charset"]="utf-8";
	$parametros["title"]="Biblioteca";
	$parametros["links"][] = "estiloTable.css";

	
	$c = new Cabecalho($parametros);
	$c->exibe();	
	
?>


	