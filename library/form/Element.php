<?php
class Library_Form_Element {
	protected $label;
	protected $labelClass;
	protected $name;
	protected $value;
	protected $type;
	protected $atributes;
	protected $validator;
	protected $message = '';
	protected $required = false;
	protected $valid = true;
	protected $noinput;

	/*
	 * @param array $options[label, name, value, type, atributes, label_class]
	 */
	function __construct($options = null) {
		if (isset ( $options ['name'] )) {
			$this->setName ( $options ['name'] );
		}
		if (isset ( $options ['label'] )) {
			$this->label = $options ['label'];
		}
		if (isset ( $options ['noinput'] )) {
			$this->noinput = $options ['noinput'];
		}
		if (isset ( $options ['atributes'] )) {
			$this->atributes = $options ['atributes'];
		}
		if (isset ( $options ['label_class'] )) {
			$this->labelClass = $options ['label_class'];
		}
		if (isset ( $options ['value'] )) {
			$this->value = $options ['value'];
		}
		if (isset ( $options ['type'] )) {
			$this->type = $options ['type'];
		}
		if (isset ( $options ['required'] )) {
			$this->required = $options ['required'];
		}
		if (isset ( $options ['validator'] ) && $options['validator'] instanceof Validator) {
			$this->validator = $options ['validator'];
		}
	}

	public function setMessage($msg){
		$this->message = $msg;
	}

	public function setValid($valid){
		$this->valid = $valid;
	}

	public function getValid(){
		return $this->valid;
	}

	public function setRequired($required) {
		$this->required = $required;
	}

	/**
	 * Retorna o nome do objeto
	 * @return string
	 */
	public function getName(){
		return $this->name;
	}

	public function getType(){
		return $this->type;
	}

	public function getMessage() {
		return $this->message;
	}

	/**
	 * Altera o nome do objeto
	 * @param string $name
	 */
	public function setName($name){
		$this->name = str_replace(' ', '_', $name);
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getValue() {
		$value = trim($this->value);
		if(empty($value)){
			return null;
		}return $value;
	}

	public function setValue($value) {
		$this->value = $value;
	}

	public function getLabel(){
		return $this->label;
	}

	public function setLabel($label){
		$this->label = $label;
	}

	public function getAtributes() {
		$atributes = '';
		if (isset ( $this->atributes )) {
			foreach ( $this->atributes as $atribute => $value ) {
				if(!empty($value)){
					$atributes .= sprintf ( ' %s="%s"', $atribute, $value );
				}
			}
		}
		return $atributes;
	}

	public function getAtribute($name) {
		if (isset ( $this->atributes [$name] )) {
			return $this->atributes [$name];
		}
		return null;
	}

	public function __toString(){
		$template = '<label for="%s" class="%s">%s</label> ';
		if($this->noinput == true){
			$template .= '<div class="form-control"><p>%s</p></div>';
			return sprintf($template, $this->getAtribute('id'), $this->labelClass, $this->label, $this->value);
		}else{
			$template .= '<input name = "%s" type="%s" value="%s" %s>';
			return sprintf($template, $this->getAtribute('id'), $this->labelClass, $this->label, $this->name, $this->type, $this->value, $this->getAtributes());
		}
	}

	public function isValid() {
		if($this->getValue()){
			if(isset($this->validator)){
				$this->validator->validate($this);
			}
		}

		if ($this->required) {
			if (!$this->getValue()) {
				$this->message = 'Campo Obrigatório';
				$this->valid = false;
			}
		}
		return $this->valid;
	}
}