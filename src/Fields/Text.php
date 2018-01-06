<?php
declare(strict_types=1);

namespace BerryForms\Fields;

use \BerryForms\Field;

class Text extends Field{
	
	
	public function __construct($name, $label)
	{
		$this->type = 'text';
		
		parent::__construct($name, $label);
	}
	
	
}