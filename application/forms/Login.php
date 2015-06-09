<?php
class Forms_Login extends Library_Form_Form{
	public function __construct($name) {
		parent::__construct ( $name );
		parent::setAction('index/login');
		$cadastrousuario = new Library_Form_Fieldset('cadastrousuario');
		$cadastrousuario->add ( new Library_Form_Email ( [
			'name' => 'email',
			'label' => 'E-mail',
			'label_class' => 'control-label',
			'validator' => new Library_Form_Validators_EmailValidator(),
			'value' => '',
			'atributes' => [
			'placeholder' => 'nome@exemplo.com',
			'class' => 'form-control',
			'id' => 'objt10',
			'autofocus' => true
			]
			] ) );
		$this->addFieldset($cadastrousuario);
		$senhas = new Library_Form_Fieldset('senhas');
		$password = new Library_Form_Password ( [
			'name' => 'senha',
			'label' => 'Senha',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'placeholder' => '**********',
			'id' => 'objt11'
			]
			] ) ;
		$senhas->add ( $password );
		$this->addFieldset($senhas);
	}
}
?>