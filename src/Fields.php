<?php

declare(strict_types=1);

namespace BerryForms;

class Fields implements \Iterator{
	
	/** 
	 * @var Field[]
	 *
	 */
	protected $list = [];
	
	/** 
	 * @var int
	 * 
	 * Iterator interface
	 *
	 */
	public $position = 0;
	
	/*
	 *	Constructor
	 *
	 *	Init fields
	 *
	 */
	public function __construct(){
		$this->list = [];
	}
	
	/*
	 *	Add field to fields container
	 *
	 */
	public function add($field){
	
		if ($field instanceof \BerryForms\Field){
			return ($this->list[] = $field);
		}
		
		return false;
	}
	
	/**
	 *	Search a field by name
	 *
	 *	@return Field|null
	 *
	 */
	public function getByFieldName($name){
		foreach($this->list as $field){
			if ($name == $field->getName()){
				return $field;
			}
		}
		
		return null;
	}
	
	/**
	 *	removeByFieldName
	 *
	 *	@return bool
	 *
	 */
	public function removeByFieldName($name){
		foreach($this->list as $k => $field){
			if ($name == $field->getName()){
				unset($this->list[$k]);
			}
		}
		
		return false;
	}
	
	
	/*
	 *	Iterator interface implementation
	 *
	 */
	
	public function current() {
		return $this->list[$this->position];
	}
	public function key(): scalar {
		return $this->position;
	}
	public function next(){
		++$this->position;
	}
	public function rewind(){
		$this->position = 0;
	}
	public function valid() : boolean{
		return isset($this->list[$this->position]);
	}
	
	
}