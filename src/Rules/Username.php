<?php
declare(strict_types=1);

namespace BerryForms\Rules;

class Username extends \BerryForms\Rules\Regex{
	
	public $error_message = 'El número debe estar dentro del intervalo';
	
	const STANDARD = 1;
	
	public function __construct($type = self::STANDARD){
		
		switch($type){
			case self::STANDARD:
				$regex = "/^[a-z0-9_-]{3,15}$/";
				break;
				
			default:
				$regex = "/^[a-z0-9_-]{3,15}$/";
		}
		
		parent::__construct($regex);
		
	}
	
}