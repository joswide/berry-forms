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
	
	public $userValue = null;
	
	public $rules = [];
	
	public $errors = [];
	
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
	public function setHint($hint){
		$this->hint = $hint;
		return $this;
	}
	
	public function setIsRequired(){
		$this->required = true;
		return $this;
	}
	public function setIsNotRequired(){
		$this->required = false;
		return $this;
	}
	public function setDefaultValue($defaultValue){
		$this->defaultValue = $defaultValue;
		return $this;
	}
	public function setPlaceholder($placeholder){
		$this->placeholder = $placeholder;
		return $this;
	}
	
	public function setUserValue($userValue){
		$this->userValue = $userValue;
		return $this;
	}
	
	/* getters */
	public function getName(){
		return $this->name;
	}
	public function getLabel(){
		return $this->label;
	}
	public function getHint(){
		return $this->hint;
	}
	public function getIsRequired(){
		return $this->required;
	}
	public function getDefaultValue(){
		return $this->defaultValue;
	}
	public function getPlaceholder(){
		return $this->placeholder;
	}
	
	public function getUserValue(){
		return $this->userValue;	
	}
	

	
	public function addRule($rule, $message = null){
		
		if ($rule instanceof Rule){
			
			if ($message){
				$rule->setErrorMessage($message);
			}
			
			$this->rules[] = $rule;
		}
		
		return $this;

	}
	
	public function addRules($rule, $message){}
	
	public function getRules(){
		return $this->rules;
	}
	
	public function validateRules($value){
		
		$isRequired = $this->getIsRequired();
		
		if (!$isRequired && is_null($value)){
			$this->errors = [];
			return (0 == count($this->errors));
		}
		
	
		
		if ($isRequired && is_null($value)){
			$this->errors = [];
			$this->errors[] = new UserInputError('El campo es obligatorio');
			
			return (0 == count($this->errors));
		}
		
		$errors = [];
		
		foreach($this->getRules() as $rule){
			//$validation = $rule->validate($value);
			
			$validation = $rule->getValidation($value);
			
			if ($validation instanceof UserInputError){
				$errors[] = $validation;
			}
		}
		
		$this->errors = $errors;
		
		return (0 == count($errors));
		
		return true;
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
	
	public function setIsRegex($value, $message = null){
		$this->addRule(new \BerryForms\Rules\Regex($value), $message);
		
		return $this;
	}
	public function setIsUsername($message = null){
		$this->addRule(new \BerryForms\Rules\Username(), $message);
		
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