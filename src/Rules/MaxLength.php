<?php
declare(strict_types=1);

namespace BerryForms\Rules;

class MaxLength extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	public $maxLength = 0;
	
	public function __construct($value){
		$this->maxLength = $value;
	}
	
	public function validate($value){
		return mb_strlen($value) <= $this->maxLength;
	}
	
	
}