<?php

declare(strict_types=1);

namespace BerryForms;

class Form{
	
	use FieldsManagerTrait;
	
	public $userInput;
	
	public $method = 'post'; // get, post
	
	public $fields = [];
	public $field = null;
	
	
	public function __construct($params = null){
		
		$this->initWithParams($params);
		
		$this->userInput = new UserInput($this->getMethod());
		
		$this->fields = new Fields();
		$this->field = new FieldGetter($this);
		
	}
	
	public function initWithParams($params = []){
		$this->setMethod($params['method'] ?? 'post');
	}
	
	
	public function readInput(){
		
		//foreach($this->getFields() as $field){
		foreach($this->getFields()->getItems() as $field){
			$fieldName = $field->getName();
			
			$value = $this->userInput->getVarValue($fieldName);
			
			$field->setUserValue($value);
			
			// Valida regla
			
			$isValid = $field->validateRules($value);
			
			//jgdebug($isValid);
			
			
			//echo $fieldName . ":" . $value; echo "<br>";
			
		}
		
		
		//echo "+++++++++++++";
	}
	
	public function addField($field){
		return $this->fields->add($field);
	}
	
	public function removeField($fieldName){
		$this->fields->removeByFieldName($fieldName);
	}
	
	public function getField($fieldName){
		return $this->fields->getByFieldName($fieldName);
	}
	
	public function getFields(){
		return $this->fields;
	}
	
	public function isSubmitted(){
		
	}
	public function isSuccess(){
		
		$this->readInput();
		
		
		
		
	}
	public function isError(){
		
	}
	public function getErrors(){
		
	}
	
	/**
	 *	Return user values
	 *
	 */
	public function getValues(){
		
	}
	
	/**
	 *	Return user value
	 *
	 */
	public function getUserValue($name){
		
	}
	
	
	// setters
	public function setMethod($method){
		if (in_array($method, ['get', 'post'])){
			$this->method = $method;
			
			return $this;
		}
		
		// post by default
		$this->method = 'post';
		
		return $this;
	}
	
	// getters
	public function getMethod(){
		return $this->method;
	}
	
	
	
	
}