<?php
declare(strict_types=1);

namespace BerryForms;

class Rule{
	
	public $error_message = 'El campo no es válido';
	
	
	
	public function setErrorMessage($message){
		if ($message){
			$this->error_message = $message;
		}
		
		return $this;	
	}
	
	public function getErrorMessage(){
		return $this->error_message;
	}
	public function resetErrorMessage(){
		$this->error_message = 'El campo no es válido';
	}
	
	final public function getValidation($value){
		
		$validation = $this->validate($value);
		
	
		if (is_bool($validation)){
			
			if ($validation){
				return true;
				
			}else{
				
				return new UserInputError('El valor no es válido');
				
			}
			
		}elseif($validation instanceof UserInputError){
			return $validation;
		}
		
		
		
	}
	//abstract public function validate($value);
}