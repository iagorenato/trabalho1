<?php

	abstract class cadastroPessoa {
		
		private $nome;
		private $endereco;
		private $telefone;
		private $data_nasc;
		private $cidade;
		private $estado;
		
		public function __construct($nome,$endereco,$telefone,$data_nasc,$cidade,$estado){			
				$this->nome = $nome;
				$this->endereco = $endereco;
				$this->telefone = $telefone;
				$this->data_nasc = $data_nasc;
				$this->cidade = $cidade;
				$this->estado = $estado;
	}
		
		
?>	