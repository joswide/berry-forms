<?php
declare(strict_types=1);

namespace BerryForms\Rules;

class MinValue extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	public $minValue = 0;
	
	public function __construct($value){
		$this->minValue = $value;
	}
	
	public function validate($value){
		return $value >= $this->minValue;
	}
	
	
}