<?php
declare(strict_types=1);

namespace BerryForms\Rules;

class IsRequired extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	
	public function validate($value){
		
		return true;
		
		return filter_var($value, FILTER_VALIDATE_INT);
	}
	
	
}