<?php
class Library_Form_Validators_EmailValidator implements Library_Form_Validators_Validator{
	public function validate(Library_Form_Element $element){
		if (!filter_var ( $element->getValue(), FILTER_VALIDATE_EMAIL )) {
			$element->setValid(false);
			$element->setMessage('E-mail inválido');
		}
	}
}