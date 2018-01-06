<?php

declare(strict_types=1);

namespace BerryForms;

class Form{
	
	use FieldsManagerTrait;
	
	public $userInput;
	
	public $method = 'post'; // get, post
	
	public $fields = [];
	
	
	public function __construct($params = null){
		
		$this->initWithParams($params);
		
		$this->userInput = new UserInput($this->getMethod());
		
		$this->fields = new Fields();
		
		
	}
	
	public function initWithParams($params = []){
		$this->setMethod($params['method'] ?? 'post');
	}
	
	
	public function readInput(){
		
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
		
	}
	
	public function isSubmitted(){
		
	}
	public function isSuccess(){
		
	}
	public function isError(){
		
	}
	public function getErrors(){
		
	}
	
	
	// setters
	public function setMethod($method){
		if (in_array($method, ['get', 'post'])){
			$this->method = $method;
			
			return $this;
		}
		
		// post by default
		$this->method = 'post';
	}
	
	// getters
	public function getMethod(){
		return $this->method;
	}
	
	
	
	
}