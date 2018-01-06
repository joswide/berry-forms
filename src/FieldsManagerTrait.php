<?php
namespace BerryForms;


trait FieldsManagerTrait{
	
	public function addSelect($name, $label, $options){
		$field = new Fields\Select($name, $label, $options);
		
		$this->addField($field);
		
		return $field;
	}
	
	public function addCheckbox($name, $label){
		$field = new Fields\Checkbox($name, $label);
		
		$this->addField($field);
		
		return $field;
	}
	
	public function addText($name, $label){
		
		$field = new Fields\Text($name, $label);
		$this->addField($field);
		
		return $field;
	}
	
	public function addEmail($name, $label){
		
		$field = new Fields\Email($name, $label);
		$this->addField($field);
		
		return $field;
	}
	
	public function addURL($name, $label){
		
		$field = new Fields\URL($name, $label);
		$this->addField($field);
		
		return $field;
	}
}