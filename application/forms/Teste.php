<?php
class Forms_Teste extends Library_Form_Form{
	public function __construct($name) {
		parent::__construct ( $name );
		$cadastrousuario = new Library_Form_Fieldset('cadastrousuario');
		$cadastrousuario->add ( new Library_Form_Text ( [
			'name' => 'email',
			'label' => 'E-mail',
			'label_class' => 'control-label',
			//'validator' => new EmailValidator(),
			'value' => '',
			'atributes' => [
			'placeholder' => 'digite o email',
			'class' => 'form-control',
			'id' => 'objt10',
			'autofocus' => true
			]
			] ) );
		$this->addFieldset($cadastrousuario);
	}
}
?>