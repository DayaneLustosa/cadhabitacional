<?php
// herdar a classe form utilizando o mesmo construct
class Form_EditaUsuarios extends Library_Forms_Form {
	// se sobrescrever usa somente o desta classe
	public function __construct($name) {
		parent::__construct ( $name );
		$editaUsuario = new Library_Forms_Fieldset('editausuario');

		$usuarios = Database::findAll("SELECT name FROM users", []);
		$usuarioOption[] = "Selecione...";
		foreach ($usuarios as $usuario):
			$usuarioOption[$usuario['name']] = utf8_encode($usuario['name']);
		endforeach;
		$editaUsuario ->add ( new Library_Forms_Select ( [
			'name' => 'name',
			'label' => 'Nome',
			'required' => 'required',
			'label_class' => 'control-label',
			'options_value' => $usuarioOption,
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'nameUser',
			'autofocus' => 'autofocus',
			]
			] ) );
		$emails = Database::findAll("SELECT email FROM users", []);
		$emailOption[] = "Selecione...";
		foreach ($emails as $email):
			$emailOption[$email['email']] = utf8_encode($email['email']);
		endforeach;
		$editaUsuario->add ( new Library_Forms_Select ( [
			'name' => 'email',
			'label' => 'E-mail',
			'required' => 'required',
			'label_class' => 'control-label',
			'options_value' => $emailOption,
			'validator' => new EmailValidator(),
			'atributes' => [
			'placeholder' => 'exemplo@exemplo.com',
			'class' => 'form-control chosen',
			'id' => 'email',
			]
			] ) );

		$atribuicoes = Database::findAll("SELECT atribuicao FROM users", []);
		$atribuicaoOption[] = "Selecione...";
		foreach ($atribuicoes as $atribuicao):
			$atribuicaoOption[$atribuicao['atribuicao']] = $atribuicao['atribuicao'];
		endforeach;
		$editaUsuario->add ( new Library_Forms_Select ( [
			'name' => 'atribuicao',
			'label' => 'Atribuição',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Administrador',
			'2' => 'Cadastrador',
			'3' => 'Entrevistador',
			'4' => 'Assistente Social',
			'5' => 'Requerente'],
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'atribuicao',
			]
			] ) );
		$cpfs = Database::findAll("SELECT cpf FROM users", []);
		$cpfOption[] = "Selecione...";
		foreach ($cpfs as $cpf):
			$cpfOption[$cpf['cpf']] = $cpf['cpf'];
		endforeach;
		$editaUsuario->add ( new Library_Forms_Select ( [
			'name' => 'cpf',
			'label' => 'CPF',
			'label_class' => 'control-label',
			'required' => 'required',
			'options_value' => $cpfOption,
			'validator' => new Library_Forms_Validators_CpfValidator(),
			'atributes' => [
			'placeholder' => '000.000.000-00',
			'class' => 'form-control',
			'id' => 'cpf',
			]
			] ) );
		$this->addFieldset($editaUsuario);
	}
}
?>