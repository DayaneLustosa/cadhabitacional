<?php
class Form_Contemplados extends Library_Forms_Form {
	function __construct($name) {
		parent::__construct ( $name );

		$this->atributes = [
		'data-count' => 0,
		'id' => 'contemplado-form',
		'class' => 'form form-inline'
		];
		$this->add ( new Library_Forms_Text ( [
			'name' => 'controleCtu',
			'label' => 'Cadastro CTU',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '1'
			]
			] ) );
		$this->add ( new Library_Forms_Text ( [
			'name' => 'sqlCtu',
			'label' => 'Setor/Quadra/Lote',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '2'
			]
			] ) );
		$this->add ( new Library_Forms_Text ( [
			'name' => 'regulEmProcesso',
			'label' => 'Regularização em Proc.',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '3'
			]
			] ) );
		$this->add ( new Library_Forms_Textarea ( [
			'name' => 'infoRegulEmProcesso',
			'label' => 'Informação',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'placeholder' => 'Informação sobre a regularização em processo',
			'id' => '4'
			]
			] ) );
		$this->add ( new Library_Forms_Text ( [
			'name' => 'COProt',
			'label' => 'Protocolo - Croqui Oficial',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '5'
			]
			] ) );
		$this->add ( new Library_Forms_Text ( [
			'type' => 'date',
			'name' => 'DtProt',
			'label' => 'Data do Protocolo',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '6'
			]
			] ) );
		$this->add ( new Library_Forms_Text ( [
			'name' => 'Loteam',
			'label' => 'Loteamento',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '7'
			]
			] ) );
		$this->add ( new Library_Forms_Text ( [
			'name' => 'QuadraLoteam',
			'label' => 'Quadra do Loteamento',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '8'
			]
			] ) );
		$this->add ( new Library_Forms_Text ( [
			'name' => 'LoteLoteam',
			'label' => 'Lote do Loteamento',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '9'
			]
			] ) );
		$this->add ( new Library_Forms_Text ( [
			'name' => 'Contrato',
			'label' => 'Nr. Contrato',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '10'
			]
			] ) );
		$this->add ( new Library_Forms_Text ( [
			'name' => 'NpPrecaria',
			'label' => 'NP Precária',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '11'
			]
			] ) );
		$this->add ( new Library_Forms_Text ( [
			'name' => 'NpPrecaria',
			'label' => 'NP Precária',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '11'
			]
			] ) );
		$this->add ( new Library_Forms_Text ( [
			'name' => 'NpPrecaria',
			'label' => 'NP Precária',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => '11'
			]
			] ) );
		$this->add ( new Library_Forms_Radio ( [
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