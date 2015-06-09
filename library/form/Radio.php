<?php
class  Library_Form_Radio extends  Library_Form_Element{
	protected $type='radio';
	protected $noinput;
	private $optionsValue;

	function __construct($options = null){
		parent::__construct($options);
		if(isset($options['options_value'])){
			$this->optionsValue=$options['options_value'];
		}
		if (isset ( $options ['noinput'] )) {
			$this->noinput = $options ['noinput'];
		}
	}

	public function setValue($value){
		foreach ($this->optionsValue as &$option){
			if($value == $option['value']){
				$option['checked'] = true;
			} else {
				$option['checked'] = false;
			}
		}
	}

	private function isChecked($option){
		if(isset($option['checked']) && $option['checked'] === true){
			return true;
		} 
		return false;
	}

	private function getChecked($option){
		if($this->isChecked($option)){
			return 'checked="checked"';
		}
		return '';
	}

	public function __toString(){
		$inputs = sprintf(' <label class="%s">%s</label><div class="form-control">', $this->labelClass, $this->label);
		if($this->noinput == true){
			$template = '<p id="%s">%s</p>';
			foreach ($this->optionsValue as $optionValue) {
				if($this->isChecked($optionValue)){
					$inputs .= sprintf($template, (isset($optionValue['id']) ? $optionValue['id'] : ''),$optionValue['label']);
				}
			}
		} else {
			$template = '<label class="radio-inline"><input name = "%s" type="%s" value="%s" id="%s" %s %s> %s</label>';
			foreach ($this->optionsValue as $optionValue) {
				$inputs .= sprintf($template, $this->name, $this->type, $optionValue['value'], (isset($optionValue['id']) ? $optionValue['id'] : ''), $this->getAtributes(), $this->getChecked($optionValue), $optionValue['label']);
			}
		}

		$inputs .= '</div>';
		return $inputs;
	}
}