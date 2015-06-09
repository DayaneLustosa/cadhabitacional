<?php
class CampoSalario extends Element{
	protected $type = 'text';
	
	private $optionsValue;
	function __construct($options = null){
		parent::__construct($options);
		if(isset($options['options_value'])){
			$this->optionsValue=$options['options_value'];
		}
	}

	public function __toString(){
		$inputs = sprintf(' <label class="%s">%s</label><div>', $this->labelClass, $this->label);
		$template = '<label class="radio-inline- col-md-2" style="margin-top: 6px; font-size: 13px">%s</label><input name = "%s" type="%s" value="%s" id= "%s" %s>';
		foreach ($this->optionsValue as $optionValue) {
			$inputs .= sprintf($template, $optionValue['label'], $this->name.$optionValue['label'], $this->type, $optionValue['value'], $optionValue['id'], $this->getAtributes());
		}
		$inputs .= '</div>';
		return $inputs;
	}
}