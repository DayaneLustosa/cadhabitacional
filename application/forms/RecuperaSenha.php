<?php
class Forms_RecuperaSenha extends Library_Forms_Form{
	public function __construct($name) {
		parent::__construct ( $name );
		$cadastrousuario = new Library_Forms_Fieldset('cadastrousuario');
		$cadastrousuario->add ( new Library_Forms_Email ( [
			'name' => 'email',
			'label' => 'E-mail',
			'label_class' => 'control-label',
			'validator' => new Library_Forms_Validators_EmailValidator(),
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