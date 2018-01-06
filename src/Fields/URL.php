<?php
declare(strict_types=1);

namespace BerryForms\Fields;

use \BerryForms\Field;

class URL extends Text{
	
	
	public function __construct($name, $label)
	{
		parent::__construct($name, $label);
		
		$this->setIsURL();
		
	}
	
	
}