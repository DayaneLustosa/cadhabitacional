<?php
class Library_Form_Validators_EqualsValidator implements Library_Form_Validators_Validator {
	private $principal;
	function __construct(Library_Form_Element $element){
		$this->principal = $element;
	}

	public function validate(Library_Form_Element $element){
		if($element->getValue() != $this->principal->getValue()){
			$element->setValid(false);
			$element->setMessage('As senhas não conferem');
		}
	}
}