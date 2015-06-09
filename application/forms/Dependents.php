<?php
class Forms_Dependents extends Library_Form_Form {
	function __construct($name) {
		parent::__construct ( $name );

		$this->atributes = [
		'data-count' => 0,
		'id' => 'dependentes-form',
		'class' => 'form form-inline'
		];
		$this->add ( new Library_Form_Text ( [
			'name' => 'name',
			'label' => 'Nome',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj105' ,
			'autocomplete' => 'off',
			'autofocus' => true
			]
			] ) );
		$this->add ( new Library_Form_Text ( [
			'name' => 'parentesco',
			'label' => 'Parentesco',
			'label_class' => 'control-label',
			'atributes' => [
			'placeholder' => 'Grau de Parentesco',
			'class' => 'form-control',
			'id' => 'obj106'
			]
			] ) );
		$this->add ( new Library_Form_Text ( [
			'name' => 'datanasc',
			'type' => 'date',
			'label' => 'Data de Nascimento',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj107'
			]
			] ) );
		$this->add ( new Library_Form_Text ( [
			'name' => 'age',
			'label' => 'Idade',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj108',
			'readonly' => true,
			]
			] ) );
		$this->add ( new Library_Form_Text ( [
			'name' => 'escolaridade',
			'label' => 'Escolaridade',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj109'
			]
			] ) );
		$this->add ( new Library_Form_Text ( [
			'name' => 'cpf',
			'label' => 'CPF',
			'required' => 'required',
			'validator' => new Library_Form_Validators_CpfValidator(),
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj110'
			]
			] ) );
		$this->add ( new Library_Form_Text ( [
			'name' => 'renda',
			'label' => 'Renda',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'placeholder' => 'R$',
			'id' => 'obj111',
			'data-type' => 'renda'
			]
			] ) );
		$this->add ( new Library_Form_Radio ( [
			'name' => 'status',
			'label' => 'Status',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Ativo',
			'value' => 1,
			'checked' => true
			],
			[
			'label' => 'Inativo',
			'value' => 0
			]
			],
			'atributes' => [
			'id' => 'obj112'
			]
			] ) );
	}
}