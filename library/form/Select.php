<?php
class Library_Form_Select extends Library_Form_Element {
	protected $type = 'select';
	private $optionsValue;
	protected $noinput;

	function __construct($options = null) {
		parent::__construct ( $options );
		if (isset ( $options ['noinput'] )) {
			$this->noinput = $options ['noinput'];
		}
		if (isset ( $options ['options_value'] )) {
			$this->optionsValue = $options ['options_value'];
		}
	}

	private function isSelected($value) {
		if ($this->value == $value) {
			return true;
		}
		return false;
	}

	private function getSelected($value) {
		if ($this->isSelected ( $value )) {
			return 'selected="selected"';
		}
		return '';
	}

	public function __toString() {
		$inputs = '';
		$template = '<label for="%s" class="%s">%s</label>';

		if($this->noinput == true){
			$template .= '<div class="form-control"><p>%s</p></div>';
			return sprintf($template, $this->getAtribute('id'), $this->labelClass, $this->label, (isset($this->optionsValue[$this->value])) ? $this->optionsValue[$this->value] : '');
		} else {
			$template .= '<select name = "%s" %s>';
			$inputs .= sprintf ( $template, $this->getAtribute ( 'id' ), $this->labelClass, $this->label, $this->name, $this->getAtributes () );
			$template = ('<option value="%s" %s> %s </option>');
			foreach ( $this->optionsValue as $value => $label ) {
				$inputs .= sprintf ( $template, $value, $this->getSelected ( $value ), $label );
			}
			$inputs .= '</select>';
			return $inputs;
		}
	}
}