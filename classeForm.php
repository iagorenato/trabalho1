<?php
		
	include("classeInputOpcoes.php");
	include("classeSelect.php");
	include("classeButton.php");

	class Form implements Exibicao{
		
		private $action;
		private $method;		
		public $entradas;
		
		public function __construct($parametros){
			
			$this->action = $parametros["action"];
			$this->method = $parametros["method"];
			
		}

		public function add_button($parametros){
			$this->entradas[] = new Button($parametros);
		}
		
		public function add_input($parametros){
			$this->entradas[] = new Input($parametros);
		}
		
		public function add_inputOpcoes($parametros){
			$this->entradas[] = new InputOpcoes($parametros);
		}		
		
		public function add_select($name,$options,$label){
			$this->entradas[] = new Select($name,$options,$label);
		}
		
		
		public function exibe(){
			
			echo "<form method='$this->method' action='$this->action'>";
						
			
			foreach($this->entradas as $i=>$e){
				$e->exibe();
			}
				
			echo "</form>";
		}
		
		
	}


?>