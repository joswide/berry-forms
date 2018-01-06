<?php
declare(strict_types=1);

namespace BerryForms\Rules;

class URL extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	
	public function validate($value){
		return filter_var($value, FILTER_VALIDATE_URL);
	}
	
	
}