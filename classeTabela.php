<?php

	class Tabela implements Exibicao{
		
		private $matriz;
		private $alterar;
		private $remover;
		private $tabela;
		
		public function __construct($matriz,$tabela,$remover){			
				$this->matriz = $matriz;
				$this->remover = $remover;
				$this->tabela = $tabela;
		}
		
		
		public function exibe(){
			
			echo "<table border='1'>";	
			
					try{
					foreach($this->matriz as $i=>$linha){		
						
						if($i==0){
							
							echo "
							<thead>
							<tr>";
							foreach($linha as $j=>$valor){					
								if(!is_numeric($j)){
									echo "<th>$j</th>";
								}
							}
							
							if($this->remover!=null){
								echo "<th>Ação</th>";
							}
							
							echo "</tr>
								  </thead>
								  <tbody>";
						}
						
						echo "<tr>";
						foreach($linha as $j=>$valor){					
							if(!is_numeric($j)){
								echo "<td>$valor</td>";
							}
						}
						if($this->remover!=null){
							echo "<th>";				
								echo "<a href='remover.php?tabela=$this->tabela&id=$linha[0]'>Remover</a>";
							echo "</th>";							
						}
						echo "</tr>";					
					}
					}
					catch(Exception $e){
						print_r($e);
					}
			
			
			echo "</tbody></table>";
		}
		
		
	}


?>