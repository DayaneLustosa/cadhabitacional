<?php
class Library_Form_CampoTempo extends Library_Form_Element{
	protected $type = 'text';

	private $optionsValue;
	function __construct($options = null){
		parent::__construct($options);
		if(isset($options['options_value'])){
			$this->optionsValue=$options['options_value'];
		}
	}

	public function setValue($value){
		$value = explode("-", $value);
		$this->optionsValue[0]['value'] = $value[0];
		$this->optionsValue[1]['value'] = $value[1];
	}

	public function __toString(){
		$inputs = sprintf(' <label class="%s">%s</label><div>', $this->labelClass, $this->label);
		$template = '<label class="radio-inline- col-md-3" style="margin-top: 6px; font-size: 13px">%s</label> <input name = "%s" type="%s" value="%s" id= "%s" %s>';
		foreach ($this->optionsValue as $optionValue) {
			$inputs .= sprintf($template, $optionValue['label'], $this->name."[".$optionValue['label']."]", $this->type, $optionValue['value'], $optionValue['id'], $this->getAtributes());
		}
		$inputs .= '</div>';
		return $inputs;
	}
}