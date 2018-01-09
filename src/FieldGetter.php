<?php
namespace BerryForms;

class FieldGetter{
	
	private $form;
	
	public function __construct($form){
		$this->form = $form;
	}
	
	
	public function __isset($fieldName){
		if ($this->form->getFields()->getByFieldName($fieldName)){
			return true;
		}
		
		return false;
	}
	
	public function __get($fieldName){
		return $this->form->getFields()->getByFieldName($fieldName);
	}
	
}