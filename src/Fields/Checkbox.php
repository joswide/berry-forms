<?php
declare(strict_types=1);

namespace BerryForms\Fields;

use \BerryForms\Field;

class Checkbox extends Field{
	
	
	public function __construct($name, $label)
	{
		$this->type = 'checkbox';
		
		parent::__construct($name, $label);
	}
	
	
}