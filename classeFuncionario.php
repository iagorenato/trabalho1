<?php

    include("classePessoa.php");

    class funcionario extends cadastroPessoa {
        private $periodo_trabalho;

        public function __construct($nome,$endereco,$telefone,$data_nasc,$cidade,$estado,$periodo_trabalho){			
            $this->nome = $nome;
            $this->endereco = $endereco;
            $this->telefone = $telefone;
            $this->data_nasc = $data_nasc;
            $this->cidade = $cidade;
            $this->estado = $estado;
            $this->periodo_trabalho = $periodo_trabalho;


    }

?>