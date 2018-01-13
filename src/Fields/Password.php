<?php
declare(strict_types=1);

namespace BerryForms\Fields;

use \BerryForms\Field;

class Password extends Text{
	
	
	public function __construct($name, $label)
	{
		$this->type = 'password';
		
		parent::__construct($name, $label);
	}
	
	
}