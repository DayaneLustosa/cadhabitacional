<?php
class Library_Form_Form extends Library_Form_Fieldset {
	protected  $action;
	protected $method = 'POST';
	protected $atributes = [];
	protected $fieldsets = [];

	public function addFieldset(Library_Form_Fieldset $fieldset){
		$this->fieldsets[$fieldset->getName()] = $fieldset;
	}

	public function getAttributes(){
		$attributes = '';
		foreach ($this->atributes as $name => $value){
			$attributes .= sprintf('%s="%s" ', $name, $value);
		}
		return $attributes;
	}

	public function setAction($action){
		$this->action=$action;
	}

	public function openTag(){
		return sprintf('<form class="form-inline col-md-12" name="%s" method="%s" action="%s" %s id="%s" >', $this->name, $this->method, $this->action, $this->getAttributes(), $this->name."-form");
	}

	public function openTag1(){
		return sprintf('<form class="form-horizontal col-md-12" name="%s" method="%s" action="%s" %s id="%s" >', $this->name, $this->method, $this->action, $this->getAttributes(), $this->name."-form");
	}

	public function closeTag1(){
		return '</form>';
	}

	public function closeTag(){
		return '</form>';
	}

	public function getFieldsets(){
		return $this->fieldsets;
	}

	public function populate($data){
		parent::populate($data);
		foreach ($this->fieldsets as $fieldset){
			$fieldset->populate($data);
		}
	}

	public function isValid(){
		$valid = parent::isValid();
		foreach ($this->fieldsets as $fieldset){
			if (!$fieldset->isValid()){
				$valid = false;
			}
		}
		return $valid;
	}
	
	public function noinput(array $permitidos){
		$attr_id = isset($_SESSION['user']['atribuicao']) ? $_SESSION['user']['atribuicao'] : "";
		if(in_array($attr_id, $permitidos)){
			return false;
		} else {
			return true;
		}
	}
}