<?php
	
declare(strict_types=1);

namespace BerryForms;

class Field{
	
	public $type;
	
	public $name = '';
	
	public $label = '';
	public $hint = '';
	
	public $required = false;
	public $defaultValue = null;
	public $placeholder = '';
	
	public $rules = [];
	
	public function __construct($name, $label){
		
		// initialize
		$this->setName($name);
		$this->setLabel($label);
		
		$this->rules = [];
	}
	
	/* setters */
	public function setName($name){
		$this->name = $name;
		return $this;
	}
	public function setLabel($label){
		$this->label = $label;
		return $this;
	}
	public function setIsRequired($isRequired){
		$this->required = (bool) $isRequired;
		return $this;
	}
	public function setHint($hint){
		$this->hint = $hint;
		return $this;
	}
	
	/* getter */
	public function getName(){
		return $this->name;
	}
	public function getLabel(){
		return $this->label;
	}
	public function getIsRequired(){
		return $this->required;
	}
	public function getHint(){
		return $this->hint;
	}
	
	public function getUserValue(){
		
	}
	
	public function setUserValue(){
		
	}
	
	public function addRule($rule){
		if ($rule instanceof Rule){
			$this->rules[] = $rule;
		}
		
		return $this;

	}
	
	public function addRules($rule, $message){

	}
	public function validateRules(){
		
	}
	
	
	public function setIsEmail($message = null){
		$this->addRule(new \BerryForms\Rules\Email(), $message);
		
		return $this;
	}
	
	public function setIsURL($message = null){
		$this->addRule(new \BerryForms\Rules\URL(), $message);
		
		return $this;
	}
	
	public function setIsIP($message = null){
		$this->addRule(new \BerryForms\Rules\IP(), $message);
		
		return $this;
	}
	
	public function setIsInteger($message = null){
		$this->addRule(new \BerryForms\Rules\IsInteger(), $message);
		
		return $this;
	}
	
	
	
	
	/* values min|max|ranges */
	public function setMinValue($value, $message = null){
		$this->addRule(new \BerryForms\Rules\MinValue($value), $message);
		
		return $this;
	}
	public function setMaxValue($value, $message = null){
		$this->addRule(new \BerryForms\Rules\MaxValue($value), $message);
		
		return $this;
	}
	
	public function setRangeValue($min, $max, $message = null){
		$this->addRule(new \BerryForms\Rules\RangeValue($min, $max), $message);
		
		return $this;
	}
	
	/* length min|max|range */
	public function setMinLength($value, $message = null){
		$this->addRule(new \BerryForms\Rules\MinLength($value), $message);
		
		return $this;
	}
	public function setMaxLength($value, $message = null){
		$this->addRule(new \BerryForms\Rules\MaxLength($value), $message);
		
		return $this;
	}
	public function setRangeLength($min, $max, $message = null){
		$this->addRule(new \BerryForms\Rules\RangeLength($min, $max), $message);
		
		return $this;
	}
	
}