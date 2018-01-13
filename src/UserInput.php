<?php
declare(strict_types=1);

namespace BerryForms;

class UserInput{
	public $method = 'post';

	/*
	 *	Constructor
	 *
	 *	Init 
	 *
	 */
	public function __construct($method = 'post'){
		$this->method = $method;
		$this->init();
	}
	
	public function init(){
		if ('get' == $this->method){
			$this->vars = $_GET;
			
			return true;
		}
		
		elseif ('post' == $this->method){
			$this->vars = $_POST;
			
			return true;
		}
		
		// $_POST by default
		$this->vars = $_POST;
		
		return true;
	}
	
	public function getVarKeys(){
		return array_keys($this->vars);
	}
	
	public function getVarValue($name){
		if ($this->isVarIsset($name)){
			return $this->vars[$name];
		}
		
		return null;
	}
	
	
	public function isVarIsset($name){
		return isset($this->vars[$name]);
	}
	

	public function getCountVars(){
		return count($this->vars);
	}
	
	

	
}