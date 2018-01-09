<?php
declare(strict_types=1);

namespace BerryForms\Rules;

use BerryForms\UserInputError;

class MinValue extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	public $minValue = 0;
	public $error_message = 'El campo no es válido';
	
	public function __construct($value){
		$this->minValue = $value;
	}
	
	public function validate($value){
		
		if (!($value >= $this->minValue)){
			return new UserInputError('El valor debe ser igual o superior a ' . $this->minValue);
		}
		
		return $value >= $this->minValue;
	}
	
	
}