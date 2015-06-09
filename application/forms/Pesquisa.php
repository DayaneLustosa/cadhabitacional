<?php
class Form_Pesquisa extends Library_Forms_Form {
		// se sobrescrever usa somente o desta classe
	public function __construct($name) {
		parent::__construct ( $name );
		$pesquisa = new Library_Forms_Fieldset ( 'pesquisa', 'Área de Pesquisa - Localizar Registro');
		$pesquisa->add ( new Library_Forms_Text ( [
			'name' => 'pesqNrInscricao',
			'label' => 'Nº da Inscrição',
			'label_class' => 'control-label',
			'atributes' => [
					//'style' => font-weight:bold,
			'class' => 'form-control ',
			'placeholder' => 'A partir de mar/2014',
			'id' => 'obj0',
			'rel' => 'pesquise',
			'autofocus' => 'autofocus',
			'autocomplete' => 'off'
			]
			] ) );
		$pesquisa->add ( new Library_Forms_text ( [
			'name' => 'pesqNmInscrito',
			'label' => 'Nome do Inscrito',
			'label_class' => 'control-label',
					//'options_value' => $nomesOptions,
			'atributes' => [
					//'style' => 'color: red;',
			'placeholder' => 'Titular/Cônjuge',
			'class' => 'form-control',
			'id' => 'obj1',
			'rel' => 'pesquise',
			'data-placement'=>'right',
			'data-type' => 'tooltip',
			'autocomplete' => 'off'
			]
			] ) );
		$pesquisa->add ( new Library_Forms_Text ( [
			'name' => 'pesqCpf',
			'label' => 'Busca por CPF',
			'label_class' => 'control-label',
			'atributes' => [
					//'style' => 'color: red;',
			'placeholder' => 'Titular/Cônjuge',
			'class' => 'form-control ',
			'id' => 'obj6-1',
			'rel' => 'pesquise',
			'autocomplete' => 'off'
			]
			] ) );
		$pesquisa->add ( new Library_Forms_Text ( [
			'name' => 'pesqControle',
			'label' => 'Nº do Controle',
			'label_class' => 'control-label',
			'atributes' => [
					//'style' => 'border-color: red;',
			'placeholder' => 'GeoGuarapuava',
			'class' => 'form-control ',
			'id' => 'obj2',
			'rel' => 'pesquise',
			'autocomplete' => 'off'
			]
			] ) );
		$pesquisa->add ( new Library_Forms_Text ( [
			'name' => 'pesqInscAnt',
			'label' => 'Nº da Inscrição Anterior',
			'label_class' => 'control-label',
			'atributes' => [
					//'style' => 'color: red;',
			'class' => 'form-control placeholderpesq',
			'placeholder' => 'Anterior a mar/2014',
			'id' => 'obj6',
			'rel' => 'pesquise',
			'autocomplete' => 'off'
			]
			] ) );
		$pesquisa->add ( new Library_Forms_text ( [
			'name' => 'pesqEndereco',
			'label' => 'Endereço',
			'label_class' => 'control-label',
					//'options_value' => $enderecoOptions1,
			'atributes' => [
					//'style' => 'color: red;',
			'placeholder' => 'Logradouro',
			'class' => 'form-control ',
			'rel' => 'pesquise',
			'id' => 'obj4',
			'autocomplete' => 'off'
			]
			] ) );
		$pesquisa->add ( new Library_Forms_Text ( [
			'name' => 'pesqNp',
			'label' => 'Nº Predial',
			'label_class' => 'control-label',
			'atributes' => [
					//'style' => 'color: red;',
			'class' => 'form-control ',
			'id' => 'obj5',
			'rel' => 'pesquise',
			'autocomplete' => 'off'
			]
			] ) );
		$pesquisa->add ( new Library_Forms_Text ( [
			'name' => 'pesqSetorQuadraLote',
			'label' => 'Setor/Quadra/Lote',
			'label_class' => 'control-label',
			'atributes' => [
					//'style' => 'color: red;',
			'placeholder' => 'GeoGuarapuava',
			'class' => 'form-control ',
			'id' => 'obj3',
			'rel' => 'pesquise',
			'readonly' => true
			]
			] ) );
		$pesquisa->add ( new Library_Forms_Text ( [
			'name' => 'pesq',
			'type' => 'hidden',
			'value' => 1,
			'atributes' => [
			'style' => 'height: 0'
			]
			] ) );
		$this->addFieldset ( $pesquisa );
	}
}