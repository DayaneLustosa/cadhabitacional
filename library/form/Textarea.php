<?php
class  Library_Form_Textarea extends Library_Form_Element{
	public function __toString(){
		$inputs = '';
		$template = '<label for="%s" class="%s">%s</label>';
		if($this->noinput == true){
			$template .= '<div class="form-control control-Textarea"><p>%s</p></div>';
			return sprintf($template, $this->getAtribute('id'), $this->labelClass, $this->label, $this->value);
		}else{
			$template .= '<Textarea name = "%s" %s>%s';
			$inputs .= sprintf($template, $this->getAtribute('id'), $this->labelClass, $this->label, $this->name, $this->getAtributes(), $this->value);
			$inputs .= '</Textarea>';
		}
		return $inputs;
	}
}