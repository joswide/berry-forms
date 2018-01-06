<?php
declare(strict_types=1);

namespace BerryForms\Rules;

class MinLength extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	public $minLength = 0;
	
	public function __construct($value){
		$this->minLength = $value;
	}
	
	public function validate($value){
		return mb_strlen($value) >= $this->minLength;
	}
	
	
}