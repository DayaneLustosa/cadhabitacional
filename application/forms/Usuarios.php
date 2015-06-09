<?php
// herdar a classe form utilizando o mesmo construct
class Forms_Usuarios extends Library_Form_Form {
	// se sobrescrever usa somente o desta classe
	public function __construct($name) {
		parent::__construct ( $name );
		$cadastrousuario = new Library_Form_Fieldset('cadastrousuario', 'Cadastro');
		$cadastrousuario ->add ( new Library_Form_Text ( [
			'name' => 'name',
			'label' => 'Nome',
			'label_class' => 'control-label',
			'atributes' => [
				//'placeholder' => 'Digite aqui o nome',
			'class' => 'form-control ',
			'id' => 'objt1',
			'autofocus' => 'autofocus',
			]
			] ) );
		$this->addFieldset($cadastrousuario);
		$cadastrousuario->add ( new Library_Form_Email ( [
			'name' => 'email',
			'label' => 'E-mail',
			'label_class' => 'control-label',
			'validator' => new Library_Form_Validators_EmailValidator(),
			'atributes' => [
			'placeholder' => 'exemplo@exemplo.com',
			'class' => 'form-control',
			'id' => 'objt2'
			]
			] ) );

		if (isset ( $_SESSION ['user'] ) && (($_SESSION ['user'] ['atribuicao'] == 1))) {
			$cadastrousuario->add ( new Library_Form_Select ( [
				'name' => 'atribuicao',
				'label' => 'Atribuição',
				'label_class' => 'control-label',
				'options_value' => [
				'0' => 'Selecione...',
				'1' => 'Administrador',
				'2' => 'Cadastrador',
				'3' => 'Entrevistador',
				'4' => 'Assistente Social',
				'6' => 'Assistente Social/Cadastrador',
				'5' => 'Requerente'],
				'atributes' => [
				'class' => 'form-control',
				'id' => 'objt4'
				]
				] ) ); }
			else if (isset ( $_SESSION ['user'] ) && (($_SESSION ['user'] ['atribuicao'] == 2))){
				$cadastrousuario->add ( new Library_Form_Select ( [
					'name' => 'atribuicao',
					'label' => 'Atribuição',
					'label_class' => 'control-label',
					'options_value' => [
					'0' => 'Selecione...',
					'3' => 'Entrevistador',
					'4' => 'Assistente Social',
					'6' => 'Assistente Social/Cadastrador',
					'5' => 'Requerente'],
					'atributes' => [
					'class' => 'form-control',
					'id' => 'objt4'
					]
					] ) );
			}
			$cadastrousuario->add ( new Library_Form_Text ( [
				'name' => 'cpf',
				'label' => 'CPF',
				'label_class' => 'control-label',
				'required' => 'required',
				'validator' => new Library_Form_Validators_CpfValidator(),
				'atributes' => [
				'placeholder' => '000.000.000-00',
				'class' => 'form-control',
				'id' => 'objt5',
				]
				] ) );
			$cadastrousuario->add ( new Library_Form_Text ( [
				'name' => 'dtAtivacao',
				'type' => 'date',
				'type' => 'hidden',
				'style' => 'display: none',
				'atributes' => [
				'id' => 'dtAtivacao'
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
				'placeholder' => '*********',
				'id' => 'objt6'
				]
				] ) ;
			$senhas->add ( $password );
			$senhas->add ( new Library_Form_Password ( [
				'name' => 'verificaSenha',
				'label' => 'Verifica a Senha',
				'label_class' => 'control-label',
				'validator' => new Library_Form_Validators_EqualsValidator($password),
				'atributes' => [
				'class' => 'form-control',
				'placeholder' => '*********',
				'id' => 'objt7'
				]
				] ) );
			$this->addFieldset($senhas);
		}
	}
	?>