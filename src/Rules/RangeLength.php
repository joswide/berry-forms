<?php
declare(strict_types=1);

namespace BerryForms\Rules;

class RangeLength extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	public $minLength = 0;
	public $maxLength = 0;
	
	public function __construct($min, $max){
		$this->minLength = $min;
		$this->maxLength = $max;
	}
	
	public function validate($value){
		
		if (!is_string($value))
		{
			return false;
		}
		// get the string length
		$length = mb_strlen($value);
		
		if (!(($length <= $this->maxLength) && ($length >= $this->minLength))){
			
			$message = "La longitud debe ser superior a $this->minLength e inferior a $this->maxLength";
			
			return new \BerryForms\UserInputError($message);
		}
		
		return (($length <= $this->maxLength) && ($length >= $this->minLength));
	}
	
	
}