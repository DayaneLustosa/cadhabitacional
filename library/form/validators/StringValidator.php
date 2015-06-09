<?php
class StringValidator implements Validator{
	public function validate(Element $element){
		if(!filter_var($element->getValue(), FILTER_VALIDATE_REGEXP, ['options'=>['regexp'=>'/^[A-Za-z\s]+$/']])){
			$element->setValid(false);
			$element->setMessage('A entrada contém caracteres não alfabéticos');
		}
	}
}