<?php
class Checkbox extends Element{
	protected $type='checkbox';

	private $optionsValue;
	function __construct($options = null){
		parent::__construct($options);
		if(isset($options['options_value'])){
			$this->optionsValue=$options['options_value'];
		}
	}
	
	public function __toString(){
		$inputs = sprintf('<label class="%s">%s</label><div class="form-control">', $this->labelClass, $this->label);
		$template = '<input name = "%s" type="%s" value="%s" id= "%s" %s>';

		foreach ($this->optionsValue as $optionValue) {
			$inputs .= sprintf($template, $this->name, $this->type, (isset($optionValue['value'])) ? $optionValue['value'] : '', (isset($optionValue['id'])) ? $optionValue['id'] : '', $this->getAtributes());
		}
		$inputs .= '</div>';
		//$inputs .= '</div>';
		return $inputs;
		//sprintf($template, $this->labelClass, $this->name, $this->type, $this->value, $this->optionValue['id'], $this->getAtributes(), $this->label);
	}
}