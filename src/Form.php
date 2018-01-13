<?php

declare(strict_types=1);

namespace BerryForms;

class Form{
	
	use FieldsManagerTrait;
	
	public $userInput;
	public $is_read = false;
	
	public $method = 'post'; // get, post
	public $action;
	
	public $fields = [];
	public $field = null;
	
	public $validations_total 	= 0;
	public $validations_ok		= 0;
	public $validations_error	= 0;
	
	public $errorMessage;
		
	public $onSuccess 	= [];
	public $onError		= [];
	
	
	
	
	public function __construct($params = null){
		
		$this->initWithParams($params);
		
		$this->userInput = new UserInput($this->getMethod());
		
		$this->fields 	= new Fields();
		$this->field 	= new FieldGetter($this);
		
	}
	
	public function initWithParams($params = []){
		$this->setMethod($params['method'] ?? 'post');
		$this->setAction($params['action'] ?? '#');
	}
	
	
	public function readInput($force = false){
		
		if ($this->is_read){
			if (!$force){
				return true;
			}
		}
		
		$this->is_read = true;
		
		$validations_total 	= 0;
		$validations_ok		= 0;
		$validations_error	= 0;
		
		//foreach($this->getFields() as $field){
		foreach($this->getFields()->getItems() as $field){
			$fieldName = $field->getName();
			
			$value = $this->userInput->getVarValue($fieldName);
			
			$field->setUserValue($value);
			
			// Valida regla
			
			$isValid = $field->validateRules($value);
			
			$validations_total++;
			
			if ($isValid){
				$validations_ok++;
			}else{
				$validations_error++;
			}
			
			//jgdebug($isValid);
			//echo $fieldName . ":" . $value; echo "<br>";
			
		}
		
		
		$this->validations_total	= $validations_total;
		$this->validations_ok		= $validations_ok;
		$this->validations_error	= $validations_error;
		
		
		return true;
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
	
	/*
	 *	Returns Fields
	 *
	 *
	 *
	 */
	public function getFields(){
		return $this->fields;
	}
	
	public function isSubmitted(){
		
		$this->readInput();

		$varsCount = $this->userInput->getCountVars();
		
		return ($varsCount > 0);
	}
	public function isSuccess(){
		
		$this->readInput();
		
		//jgdebug($this);
		
		if ($this->isSubmitted()){
			
			if ($this->validations_error == 0){
				$this->doOnSuccessActions();
				
				return true;
			}else{
				$this->doOnErrorActions();
				
				return false;
			}
			
		}
		
		return false;
		
		
	}
	public function isError(){
		return (! $this->isSuccess() );
	}
	
	
	public function setErrorMessage($msg){
		
		if (is_string($msg)){
			$this->errorMessage = new FormError($msg);
			
		}elseif($msg instanceof FormError){
			$this->errorMessage = $msg;
		}
		
		//$this->errorMessage
	}
	
	public function clearErrorMessage(){
		$this->errorMessage = null;
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
		$field = $this->getField($name);
		
		if ($field){
			return $field->userValue;
		}
		
		return null;
	}
	
	public function addActionOnSuccess($callback){
		$this->onSuccess[] = $callback;
	}
	public function addActionOnError($callback){
		$this->onError[] = $callback;
	}
	
	public function doOnSuccessActions(){
		foreach($this->onSuccess as $callback){
			if (is_callable($callback)){
				call_user_func($callback, $this);
			}
		}
	}
	public function doOnErrorActions(){
		foreach($this->onError as $callback){
			if (is_callable($callback)){
				call_user_func($callback, $this);
			}
		}
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
	
	public function setAction($action){
		$this->action = $action;
	}
	
	
	public function getAction(){
		return $this->action;
	}
	
	
	public function isRead(){
		return $this->is_read;
	}
	
	
}