<?php
declare(strict_types=1);

namespace BerryForms\Rules;

class MaxValue extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	public $maxValue = 0;
	
	public function validate($value){
		return $value <= $this->maxValue;
	}
	
	
}