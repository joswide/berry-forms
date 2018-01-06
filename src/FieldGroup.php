<?php

declare(strict_types=1);

namespace BerryForms;

class FieldGroup implements \Iterator{
	
	
	/** 
	 * @var Field[]
	 *
	 */
	 
	public $fields = [];
	
	/** 
	 * @var int
	 * 
	 * Iterator interface
	 *
	 */
	public $position = 0;
	
	
	/*
	 *	Iterator interface implementation
	 *
	 */
	
	public function current() {
		return $this->fields[$this->position];
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
		return isset($this->fields[$this->position]);
	}
	
	
}