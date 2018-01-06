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
		
		$length = mb_strlen($value);
		
		return (($length <= $this->maxLength) && ($length >= $this->minLength));
	}
	
	
}