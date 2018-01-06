<?php
declare(strict_types=1);

namespace BerryForms\Fields;

use \BerryForms\Field;

class Select extends Field{
	
	public $options = [];
	
	
	public function __construct($name, $label, $options)
	{
		parent::__construct($name, $label);
		
		$this->type = 'select';
		$this->initOptions();
		
		$this->addOptions($options);
	}
	
	public function addOption($name, $value){
		$this->options[$name] = $value;
		
		return $this;
	}
	
	public function addOptions($options){
		foreach($options as $name => $value){
			$this->addOption($name, $value);
		}
		
		return $this;
	}
	
	public function initOptions(){
		$this->options = [];
		
		return $this;
	}
	
	public function resetOptions(){
		$this->initOptions();
		
		return $this;
	}
	
	public function removeOption($name){
		if (isset($this->options[$name])){
			unset($this->options[$name]);
		}
		
		return $this;
	}
	
	
	
}