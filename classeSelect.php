<?php

	include("classeOption.php");

	class Select implements Exibicao{

		private $name;
		private $options;
		private $label;
		
		public function __construct($name,$options,$label){
			$this->name=$name;
			$this->label=$label;

			foreach($options as $i=>$o){
				$this->options[] = new Option($o);
			}	
		}
		
		public function exibe(){
			echo "<select name='$this->name'>";
			echo "<option value='0'>::$this->label::</option>";
			
			foreach($this->options as $i=>$o){
				$o->exibe();
			}
			
			echo "</select> <br />";
		}
		
		
	}


?>