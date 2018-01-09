<?php
declare(strict_types=1);

namespace BerryForms\Rules;

class Regex extends \BerryForms\Rule implements \BerryForms\RuleInterface{
	
	public $regex;
	
	public function __construct($regex){
		$this->regex = $regex;
	}
	
	public function validate($value){
		
		if (!(strlen($this->regex) > 0)){
			return true;
		}
		
		$isValid = filter_var($value, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=> $this->regex)));
		

		return $isValid;
		
		
		//jgdebug($isValid);
		
		// Warning: filter_var(): Delimiter must not be alphanumeric or backslash in /Users/joswide/Sites/Repositorios/BerryForms/src/Rules/Regex.php on line 20
		
		return filter_var($value, FILTER_VALIDATE_REGEXP);
	}
	
	
}