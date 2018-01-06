<?php
declare(strict_types=1);

namespace BerryForms\Rules;

class RangeValue extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	public $minValue = 0;
	public $maxValue = 0;
	
	
	public function __construct($min, $max){
		$this->minValue = $min;
		$this->maxValue = $max;
	}
	
	public function validate($value){
		return $value >= $this->minValue && $value <= $this->maxValue;
	}
	
	
}