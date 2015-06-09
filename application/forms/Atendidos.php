<?php
// herdar a classe form utilizando o mesmo construct
class Form_AtendidosForm extends Library_Forms_Form {
	// se sobrescrever usa somente o desta classe
	public function __construct($name) {
		parent::__construct ( $name );
		$atendido = new Library_Forms_Fieldset('cadastrousuario');
		$atendido ->add ( new Library_Forms_Text ( [
			'name' => 'controleCtu',
			'label' => 'Controle CTU',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control ',
			'id' => 'objt-a',
			'autofocus' => 'autofocus'
			]
			] ) );
		$this->addFieldset($atendido);
		$atendido->add ( new Library_Forms_Email ( [
			'name' => 'email',
			'label' => 'E-mail',
			'label_class' => 'control-label',
			'validator' => new Library_Forms_Validators_EmailValidator(),
			'value' => 'dayane_lustosa@hotmail.com',
			'atributes' => [
			'placeholder' => 'digite o email',
			'class' => 'form-control',
			'id' => 'objt2'
			]
			] ) );

		$atendido->add ( new Library_Forms_adio ( [
			'name' => 'funcao',
			'label' => 'Função',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Usuário',
			'value' => 1,
			'checked' => true
			],
			[
			'label' => 'Entrevistador',
			'value' => 0
			]
			],
			'atributes' => [
			'id' => 'objt3'
			]
			] ) );
		$atendido->add ( new Library_Forms_Select ( [
			'name' => 'atribuicao',
			'label' => 'Atribuição',
			'label_class' => 'control-label',
			'options_value' => ['0' => 'Selecione...',
			'1' => 'Administrador',
			'2' => 'Cadastrador',
			'3' => 'Secretário',
			'4' => 'Usuário',
			'5' => 'Requerente'],
			'atributes' => [
			'class' => 'form-control',
			'id' => 'objt4'
			]
			] ) );
		$atendido->add ( new Library_Forms_Text ( [
			'name' => 'cpf',
			'label' => 'CPF',
			'label_class' => 'control-label',
			'value' => '08908233911',
			'required' => 'required',
			'validator' => new Library_Forms_Validators_CpfValidator(),
			'atributes' => [
			'placeholder' => '000.000.000-00',
			'class' => 'form-control',
			'id' => 'objt5',
			]
			] ) );
		$this->addFieldset($atendido);
		$senhas = new Library_Forms_Fieldset('senhas');
		$password = new Library_Forms_Password ( [
			'name' => 'senha',
			'label' => 'Senha',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => 'objt6'
			]
			] ) ;
		$senhas->add ( $password );
		$senhas->add ( new Library_Forms_Password ( [
			'name' => 'verifica-senha',
			'label' => 'Verifica a Senha',
			'label_class' => 'control-label',
			'validator' => new Library_Forms_Validators_EqualsValidator($password),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'objt7'
			]
			] ) );
		$this->addFieldset($senhas);
	}
}
?>