<?php
declare(strict_types=1);

namespace BerryForms\Rules;

use BerryForms\UserInputError;

class SelectValidOption extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	public $allowed_values = 0;
	public $error_message = 'La opción que has marcado no es válida';
	
	public function __construct($allowed_values = []){
		$this->allowed_values = $allowed_values;
	}
	
	public function validate($value){
		
		//if (in_array($value, $this->allowed_values)){
		if (isset($this->allowed_values[$value])){
			return true;
		}
		else{
			return new UserInputError('La opción que has marcado no es válida');
		}

	}
	
	
}