<?php
declare(strict_types=1);

namespace BerryForms\Rules;

class RangeValue extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	public $minValue = 0;
	public $maxValue = 0;
	
	public $error_message = 'El número debe estar dentro del intervalo';
	
	
	public function __construct($min, $max){
		$this->minValue = $min;
		$this->maxValue = $max;
	}
	
	public function validate($value){
		
		if (!( $value >= $this->minValue && $value <= $this->maxValue)){
			$message = "La número debe ser superior a $this->minValue e inferior a $this->maxValue";
		
			return new \BerryForms\UserInputError($message);
		}else{
		
		}
		
		return $value >= $this->minValue && $value <= $this->maxValue;
	}
	
	
}