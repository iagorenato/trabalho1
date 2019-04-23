<?php

	include("conexao.php");

	class BancoDeDados{
		
		private $conexao;
		
		
		public function __construct(PDO $conexao){
			$this->conexao = $conexao;
		}
		
		public function remocao($tabela,$id){
			
			$remocao = "DELETE FROM $tabela
						WHERE 
						ID_$tabela=:id_$tabela";
			
			try{
				$stmt = $this->conexao->prepare($remocao);
				$stmt->bindValue(":id_".$tabela,$id);
				//print_r($stmt->errorInfo())
				$stmt->execute()or die ( $tabela . " não pode ser removido(a) pois existe um relacionamento para este registro." );
			}
			catch(Exception $e){
				echo $e;
			}
					
		}
		
		
		
		public function insercao($tabela,$colunas){
			
			$insert = "INSERT INTO $tabela (";
			$cont=0;
			foreach($colunas as $i=>$v){
				if($cont==1){
					$insert .= ",";
				}
				$insert .= $i;
				$cont=1;
			}
			
			$insert .= ") VALUES (";
			
			$cont=0;
			foreach($colunas as $i=>$v){
				if($cont==1){
					$insert .= ",";
				}
				$insert .= ":".$i;
				$cont=1;
			}
			
			$insert .=")";
			
			$stmt = $this->conexao->prepare($insert);
			
			
			foreach($colunas as $i=>$v){
				$stmt->bindValue(":".$i,$v);
			}
			
			$stmt->execute() 
				or die(print_r($stmt->errorInfo()));
		}
		
		
		
		
		
		
		
		
		public function select($tabela, $coluna, $condicao, $ordenacao){
			
			$consulta = "SELECT ";
			
			foreach($coluna as $i=>$c){
				if($i>0){
					$consulta .=", ";
				}
				$consulta .= $c;
			}
			
			
			$consulta .= " FROM ";
			
			foreach($tabela as $i=>$t){
				
				if($i>0){
					$consulta .= " INNER JOIN ";
				}
				
				$consulta .= $t;

				if($i>0){
					$consulta .= " ON ".
								 $tabela[$i-1].".cod_".$t."=".
								 $t.".id_".$t;
				}
				
			}
			
			
			if($condicao !=null){
				$consulta .= " WHERE ";
				foreach($condicao as $i=>$c){
					if($i>0){
						$consulta .= " AND ";
					}
					$consulta.= $c;
				}
			}
			
			if($ordenacao!=null){
				$consulta.= " ORDER BY ".$ordenacao;
			}
			
			
			$stmt = $this->conexao->prepare($consulta);
			try{	
				$stmt->execute();
				
				
				$matriz = null;
				while($linha=$stmt->fetch()){
					$matriz[] = $linha;
				}
						
				return($matriz);
			}
			catch(Exception $e){
				echo "Erro";
			}			
		}
		
		
	}



?>