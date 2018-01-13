<?php
namespace BerryForms;

class FormError{
	
	public $message = '';
	
	public function __construct($message){
		$this->message = $message;
	}
	
	public function __toString()
	{
		return $this->message;
	}
}