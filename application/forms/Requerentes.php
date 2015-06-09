<?php
class Forms_Requerentes extends Library_Form_Form {
	public function __construct($name) {
		parent::__construct ( $name );
		
		$ln = new Library_Form_Fieldset ( 'ln', '<b style="color: red; font-size: 20px">L_N</b>' );

		$ln->add ( new Library_Form_Text ( [
			'type' => 'date',
			'name' => 'blacklist[dtInscLN]',
			'label' => 'Data Inclusão L_N',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control ',
			'id' => 'dataln'
			]
			] ) );

		$ln->add ( new Library_Form_Textarea ( [
			'name' => 'blacklist[obsLN]',
			'label' => 'Observações sobre a L_N <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? true : false,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'placeholder' => 'Informação sobre a inclusão na L_N',
			'autofocus' => true,
			'id' => 'obsLN',
			'readonly' => true,
			'style' => 'z-index: 20000; position: relative;'
			]
			] ) );
		$this->addFieldset ( $ln );

		$contemplado = new Library_Form_Fieldset ( 'contemplado', '<b style="color: green">CONTEMPLADO</b>' );
		
		$contemplado->add ( new Library_Form_Text ( [
			'name' => 'contemplated[controleCtu]',
			'label' => 'Cadastro CTU',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => '1',
			'autofocus' => true
			]
			] ) );

		$contemplado->add ( new Library_Form_Text ( [
			'name' => 'contemplated[sqlCtu]',
			'label' => 'Setor/Quadra/Lote',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => '2',
			'maxlength' => '11'
			]
			] ) );

		$contemplado->add ( new  Library_Form_Radio ( [
			'name' => 'contemplated[regulEmProcesso]',
			'noinput' => $this->noinput([1, 2]),
			'label' => 'Regularização em Proc.',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => '3-1'
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => '3-2',
			'checked' => true
			]
			],
			'atributes' => [
			'rel' => '1-4'
			]
			] ) );

		$contemplado->add ( new Library_Form_Textarea ( [
			'name' => 'contemplated[infoRegulEmProcesso]',
			'label' => 'Informação',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'placeholder' => 'Informação sobre a regularização em processo',
			'id' => '4',
			'style' => 'z-index: 20000; position: relative;'
			]
			] ) );

		$contemplado->add ( new Library_Form_Text ( [
			'name' => 'contemplated[COProt]',
			'label' => 'Protocolo - Croqui Oficial',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => '5',
			'autocomplete' => 'off'
			]
			] ) );

		$contemplado->add ( new Library_Form_Text ( [
			'type' => 'date',
			'name' => 'contemplated[DtProt]',
			'label' => 'Data do Protocolo',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => '6',
			'readonly' => true
			]
			] ) );

		$loteamentos= new Models_Loteamentos();
		$loteamentos1 = $loteamentos->fetchAll();
		$loteamentoOptions1[] = "Selecione...";
		
		foreach ($loteamentos1 as $loteamento1):
			$loteamentoOptions1[$loteamento1['nmLoteam']] = utf8_decode(utf8_encode($loteamento1['nmLoteam']));
		endforeach;

		$contemplado->add ( new Library_Form_Select ( [
			'name' => 'contemplated[Loteam]',
			'label' => 'Loteamento',
			'label_class' => 'control-label',
			'options_value' => $loteamentoOptions1,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => '7'
			]
			] ) );

		$contemplado->add ( new Library_Form_Text ( [
			'name' => 'contemplated[QuadraLoteam]',
			'label' => 'Quadra do Loteamento',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => '8',
			'readonly' => true,
			'autocomplete' => 'off'
			]
			] ) );

		$contemplado->add ( new Library_Form_Text ( [
			'name' => 'contemplated[LoteLoteam]',
			'label' => 'Lote do Loteamento',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => '9',
			'readonly' => true,
			'autocomplete' => 'off'
			]
			] ) );

		$contemplado->add ( new Library_Form_Text ( [
			'name' => 'contemplated[Contrato]',
			'label' => 'Nr. Contrato',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => '10',
			'autocomplete' => 'off'
			]
			] ) );
//************** REPETIDO 3x ABAIXO
		$contemplado->add ( new Library_Form_Text ( [
			'name' => 'contemplated[NpPrecaria]',
			'label' => 'NP Precária',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => '11',
			'autocomplete' => 'off'
			]
			] ) );

		$contemplado->add ( new Library_Form_Text ( [
			'name' => 'contemplated[NpPrecaria]',
			'label' => 'NP Precária',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => '11'
			]
			] ) );

		$contemplado->add ( new Library_Form_Text ( [
			'name' => 'contemplated[NpPrecaria]',
			'label' => 'NP Precária',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => '11'
			]
			] ) );

		$this->addFieldset ( $contemplado );

		$inscr = '';

		if(isset($_POST['nInscricao'])){
			$inscr = $_POST['nInscricao'];
		} elseif(isset($_POST['pesqNrInscricao'])) {
			$inscr = $_POST['pesqNrInscricao'];
		}

		$pesquisa= new Models_Pesquisa();

		$pesq = $pesquisa->fetch("SELECT ln, atendido FROM pesquisa where hId = '".$inscr."' and (inativo = 0 or inativo is null)");
		
		if((isset($_POST['nInscricao']) || isset($_POST['pesqNrInscricao'])) && (($pesq['atendido']==1) && ($pesq['ln']==1))){
			$titular = new Library_Form_Fieldset ( 'titular', '<b>DADOS DO TITULAR</b> <b style="color: red; font-size: 20px"> - LN </b><b style="color: green;">- CONTEMPLADO </b> ' );
		} else if((isset($_POST['nInscricao']) || isset($_POST['pesqNrInscricao'])) && (($pesq['atendido']==0) && ($pesq['ln']==1) )){
			$titular = new Library_Form_Fieldset ( 'titular', '<b>DADOS DO TITULAR</b> <b style="color: red; font-size: 20px"> - LN </b> ' );
		} else if((isset($_POST['nInscricao']) || isset($_POST['pesqNrInscricao'])) && (($pesq['atendido']==1) && ($pesq['ln']==0))){
			$titular = new Library_Form_Fieldset ( 'titular', '<b>DADOS DO TITULAR</b> <b style="color: green;"> - CONTEMPLADO</b> ' );
		} else {
			$titular = new Library_Form_Fieldset ( 'titular', '<b>DADOS DO TITULAR</b>');
		}

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[hId]',
			'label' => 'Número da Inscrição',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj104-2',
			'readonly' => true,
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[dtCadastro]',
			'label' => 'Data do Cadastro',
			'label_class' => 'control-label',
			'type' => 'date',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj104-1',
			'readonly' => true
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[dtEntrevista1]',
			'label' => 'Data da Entrevista',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj104',
			'readonly' => true
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[dtAtualiza]',
			'label' => 'Data da última atualização',
			'label_class' => 'control-label',
			'type' => 'date',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj104-3',
			'readonly' => true,
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[cpf]',
			'label' => 'CPF Titular <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false : true,
			'maxlengh' => '11',
			'validator' => new Library_Form_Validators_CpfValidator (),
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj7',
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[name]',
			'label' => 'Nome do Titular <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false : true,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control tip',
			'id' => 'obj8',
			'data-toggle' => 'tooltip',
			'data-placement' => 'left',
			'onblur' => 'enviar()',
			'data-placement'=>'right',
			'data-type' => 'tooltip',
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new  Library_Form_Select ( [
			'name' => 'holderdata[sitConjugal]',
			'label' => 'Estado Civil',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Solteiro',
			'2' => 'Casado',
			'3' => 'Viúvo',
			'4' => 'Separado Judicialmente',
			'5' => 'Divorciado',
			'6' => 'Amasiado',
			'7' => 'União Estável'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj33',
			'rel' => '2-obj34|2-obj9|2-obj10|6-obj34|6-obj9|6-obj10|7-obj34|7-obj9|7-obj10',
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[dtCasamento]',
			'label' => "Data da União <span class='spanrequired'>*</span>",
			'label_class' => 'control-label',
			'required' => (isset($_POST['sitConjugal']) && $_POST['sitConjugal'] == 2 && $_POST['ln'] != 1) ? true : false,
			'type' => 'date',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj34',
			'readonly' => (isset($_POST['sitConjugal']) && $_POST['sitConjugal'] == 2) ? false : true,
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'spousedata[spouseCpf]',
			'label' => 'CPF Cônjuge <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['sitConjugal']) && $_POST['sitConjugal'] == 2 && $_POST['ln'] != 1) ? true : false,
			'validator' => new  Library_Form_Validators_CpfValidator (),
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj9',
			'readonly' => (isset($_POST['sitConjugal']) && $_POST['sitConjugal'] == 2) ? false : true,
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'spousedata[spouseName]',
			'label' => 'Nome do Cônjuge <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['sitConjugal']) && $_POST['sitConjugal'] == 2 && $_POST['ln'] != 1) ? true : false,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj10',
			'readonly' => true,
			'data-placement'=>'right',
			'data-type' => 'tooltip',
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[rg]',
			'label' => 'RG do Titular <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj11' ,
			'autocomplete' => 'off'
			]
			] ) );
		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[orgaoEmissor]',
			'label' => 'Órgão Emissor <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj12',
			'autocomplete' => 'off'
			]
			] ) );

		$estados= new Models_Estados();

		$estados2 = $estados->fetchAll();
		$estadoOptions1[] = "Selecione...";

		foreach ($estados2 as $estado):
			$estadoOptions1[$estado['uf']] = utf8_decode(utf8_encode($estado['nome']));
		endforeach;

		$titular->add ( new Library_Form_Select ( [
			'name' => 'holderdata[ufRg]',
			'label' => 'U.F. - RG',
			'label_class' => 'control-label',
			'options_value' => $estadoOptions1,
			'value' => 'PR',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj13'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'type' => 'date',
			'name' => 'holderdata[dtNasc]',
			'label' => 'Data de Nascimento <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj14' ,
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[idade]',
			'label' => 'Idade',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj14-1',
			'readonly' => true,
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[pai]',
			'label' => 'Nome do Pai',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj15',
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[mae]',
			'label' => 'Nome da Mãe',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj16',
			'autocomplete' => 'off'
			]
			] ) );

		$paises = new Models_Pais();

		$paises = $paises->fetchAll();
		$paisesOptions[] = "Selecione...";

		foreach ($paises as $pais):
			$paisesOptions[$pais['paisNome']] = utf8_decode(utf8_encode($pais['paisNome']));
		endforeach;

		$titular->add ( new  Library_Form_Select ( [
			'name' => 'holderdata[holderPais]',
			'label' => 'País <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'options_value' => $paisesOptions,
			'value' => 'BRASIL',
			'noinput' => $this->noinput([1, 2]),
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj19-1',
			]
			] ) );

		/*$estados = Database::findAll("SELECT * FROM tb_estados");
		$estadoOptions2[] = "Selecione...";

		foreach ($estados as $estado):
			$estadoOptions2[$estado['uf']] = utf8_encode($estado['nome']);
			endforeach;*/
			$titular->add ( new Library_Form_Text ( [
				'name' => 'holderdata[holderUf]',
				'label' => 'U.F. <span class="spanrequired">*</span>',
				'label_class' => 'control-label',
				'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
				'noinput' => $this->noinput([1, 2]),
				'atributes' => [
				'class' => 'form-control',
				'id' => 'obj19',
				]
				] ) );

		/*if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			$cidades = Database::findAll("SELECT * FROM tb_cidades"); // + where id ou nome = ao que vem do banco
			$cidadesOptions2[] = "Selecione...";
			foreach ($cidades as $cidade):
			$cidadesOptions2[$cidade['nome']] = utf8_encode($cidade['nome']);
			endforeach;
			$optionValueCidade = $cidadesOptions2;
			} else {
			$optionValueCidade[] = 'Selecione seu Estado primeiro';
		}*/
		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[naturalidade]',
			'label' => 'Naturalidade <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj18'
			]
			] ) );

		$titular->add ( new  Library_Form_Radio ( [
			'name' => 'holderdata[sexo]',
			'label' => 'Sexo',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Masculino',
			'value' => 'M',
			'id' => 'obj191-1'
			],
			[
			'label' => 'Feminino',
			'value' => 'F',
			'id' => 'obj191-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[fonePrincipal]',
			'label' => 'Telefone Principal',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => '(00)0000-0000',
			'class' => 'form-control',
			'id' => 'obj20-1'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[fone]',
			'label' => 'Telefone',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => '(00)0000-0000',
			'class' => 'form-control',
			'id' => 'obj20'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[cel]',
			'label' => 'Celular',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => '(00)0000-0000',
			'class' => 'form-control ',
			'id' => 'obj21'
			]
			] ) );

		$titular->add ( new  Library_Form_Email ( [
			'name' => 'holderdata[email]',
			'label' => 'E-mail',
			'label_class' => 'control-label',
			'validator' => new  Library_Form_Validators_EmailValidator (),
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'nome@exemplo.com',
			'class' => 'form-control',
			'id' => 'obj22' ,
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[cep]',
			'label' => 'CEP',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => '00000-000',
			'class' => 'form-control',
			'id' => 'obj23'
			]
			] ) );

		$titular->add ( new  Library_Form_Radio ( [
			'name' => 'holderdata[localidadeAtual]',
			'label' => 'Localidade',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Urbano',
			'value' => 1,
			'id' => 'obj240-1',
			'checked' => true
			],
			[
			'label' => 'Rural',
			'value' => 0,
			'id' => 'obj240-2'
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$logradouros = new Models_Logradouros();

		$enderecos = $logradouros->fetchAll();
		$enderecoOptions[] = "Selecione...";
		$bairrosOptions[] = "Selecione...";

		foreach ($enderecos as $endereco):
			$enderecoOptions[$endereco['nmLogradouro']] = utf8_decode(utf8_encode($endereco['nmLogradouro']));
		$enderecoOptions1[$endereco['codigo']] = utf8_decode(utf8_encode($endereco['nmLogradouro']));
		$bairrosOptions[$endereco['nmBairro']] = utf8_decode(utf8_encode($endereco['nmBairro']));
		endforeach;

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[end]',
			'label' => 'Endereço <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj24'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[np]',
			'label' => 'Número',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj25',
			'autocomplete' => 'off'
			]
			] ) );

		//if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			/*$bairros = Database::findAll("SELECT * FROM logradouros", []);
			$bairrosOptions[] = "Selecione...";
			foreach ($bairros as $bairro):
			$bairrosOptions[$bairro['nmLogradouro']] = utf8_encode($bairro['nmBairro']);
			endforeach;
			$optionValueBairro = $bairrosOptions;*/
			/*} else {
			$optionValueBairro[] = 'Selecione o endereço primeiro';
		}*/
		$titular->add ( new  Library_Form_Select ( [
			'name' => 'holderdata[bairro]',
			'label' => 'Bairro <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'options_value' => $bairrosOptions,
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj26'
			]
			] ) );

		$titular->add ( new  Library_Form_Select ( [
			'name' => 'holderdata[distrito]',
			'label' => 'Distrito',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Sede',
			'2' => 'Palmeirinha',
			'3' => 'Guará',
			'4' => 'Guairacá',
			'5' => 'Entre Rios',
			'6' => 'Atalaia',
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj26-1'
			]
			] ) );

		$loteamentos2 = $loteamentos->fetchAll();
		$loteamentoOptions[] = "Selecione...";

		foreach ($loteamentos2 as $loteamento):
			$loteamentoOptions[$loteamento['id']] = utf8_decode(utf8_encode($loteamento['nmLoteam']));
		endforeach;

		$titular->add ( new Library_Form_Select ( [
			'name' => 'holderdata[loteamento]',
			'label' => 'Loteamento',
			'options_value' => $loteamentoOptions,
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj27'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[complemento2]',
			'label' => 'Complemento',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj28',
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[referencia]',
			'label' => 'Ponto de Referência',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'Próximo à...',
			'class' => 'form-control',
			'id' => 'obj29' ,
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Select ( [
			'name' => 'holderdata[formEscolar]',
			'label' => 'Formação Escolar',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Pré Escolar',
			'2' => '1ª à 4ª Série',
			'3' => '5ª à 8ª Série',
			'4' => '2º Grau',
			'5' => 'Superior',
			'6' => 'Não Alfabetizado'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj30'
			]
			] ) );

		$titular->add ( new  Library_Form_Radio ( [
			'name' => 'holderdata[complemento]',
			'label' => 'Complemento',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Completo',
			'value' => 1,
			'id' => 'obj31-1',
			'checked' => true
			],
			[
			'label' => 'Incompleto',
			'value' => 0 ,
			'id' => 'obj31-2'
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$titular->add ( new  Library_Form_Radio ( [
			'name' => 'holderdata[estudando]',
			'label' => 'Estudando',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj32-1'
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj32-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[holderCtps]',
			'label' => 'CTPS',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'Carteira de Trabalho',
			'class' => 'form-control',
			'id' => 'obj35-1',
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[holderCtpsSerie]',
			'label' => 'CTPS Série',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'nº de série - Carteira de Trabalho',
			'class' => 'form-control',
			'id' => 'obj35-2',
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[profissao]',
			'label' => 'Profissão',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj35' ,
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[empregador]',
			'label' => 'Empregador ',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'Empregador',
			'class' => 'form-control',
			'id' => 'obj44',
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[endComercial]',
			'label' => 'Endereço Comercial <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['empregador']) && !empty($_POST['empregador']) ) ? true : false,
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'Exemplo, R.',
			'class' => 'form-control',
			'readonly' => 'readonly',
			'id' => 'obj45',
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[telComercial]',
			'label' => 'Telefone Comercial',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => '(00)0000-0000',
			'class' => 'form-control',
			'readonly' => 'readonly',
			'id' => 'obj38'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[atividade]',
			'label' => 'Atividade Exercida',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'readonly' => 'readonly',
			'id' => 'obj39' ,
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add ( new Library_Form_Select ( [
			'name' => 'holderdata[sitRenda]',
			'label' => 'Situação Renda',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'F' => 'Fixa',
			'V' => 'Variável',
			'A' => 'Aposentado/Pensionista',
			//'B' => 'Benefício de Prestação Continuada - BPC',
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj40'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[salario]',
			'label' => 'Salário Titular',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'R$',
			'class' => 'form-control',
			'id' => 'obj41',
			'data-type' => 'renda'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[outrasRendas]',
			'label' => 'Outras Rendas',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'R$',
			'class' => 'form-control',
			'id' => 'obj42',
			'data-type' => 'renda'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[vlrRenda]',
			'label' => 'Renda Total Familiar',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj43',
			'data-type' => 'rendaTotal',
			'readonly' => true
			]
			] ) );

		$anos = new Models_Ano();

		$anos = $anos->fetchAll("SELECT * FROM ano order by ano asc");
		$anosOptions[] = "Selecione...";

		foreach ($anos as $ano):
			$anosOptions[$ano['ano']] = $ano['ano'];
		endforeach;

		$titular->add ( new Library_Form_Select ( [
			'name' => 'holderdata[anoSalario]',
			'label' => 'Ano',
			'options_value' => $anosOptions,
			'value' => '2014',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj43-1'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[rendaTotal]',
			'label' => 'Ano/Salario',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj43-112',
			'data-type' => 'salario',
			'readonly' => true
			]
			] ) );

		$titular->add ( new Library_Form_CampoTempo ( [
			'name' => 'holderdata[tmpServico]',
			'label' => 'Tempo de Serviço',
			'label_class' => 'control-label ',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control col-md-6',
			'style' => 'width: 17%',
			'id' => 'obj46'
			],
			'options_value' => [
			[
			'label' => 'Anos',
			'value' => '00',
			'id' => 'obj46-1'
			],
			[
			'label' => 'Meses',
			'value' => '00',
			'id' => 'obj46-2'
			]
			]
			] ) );

		$titular->add ( new  Library_Form_Radio ( [
			'name' => 'holderdata[filhos]',
			'label' => 'Possui Filhos',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj470-1',
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj470-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'rel' => '1-obj471'
			]
			] ) );

		$titular->add ( new Library_Form_Text ( [
			'name' => 'holderdata[quantFilhos]',
			'label' => 'Quantos',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj471',
			'readonly' => true,
			'autocomplete' => 'off'
			]
			] ) );

		$titular->add (new Library_Form_Html([
			'name' => 'dependents[tbDependents]',
			'html' => '',
			]));

		$titular->add ( new Library_Form_Text ( [
			'type' => 'hidden',
			'name' => 'dependents[salario1]',
			'style' => 'display: none',
			'atributes' => [
			'id' => 'obj43-11',
			'readonly' => true
			]
			] ) );

		$this->addFieldset ( $titular );

		$conjuge = new Library_Form_Fieldset ( 'conjuge', 'DADOS DO CÔNJUGE' );

		$requiredSpouse = (isset($_POST['sitConjugal']) && $_POST['sitConjugal'] == 2) ? true : false;
		$conjuge->add ( new Library_Form_Text ( [
			'name' => 'spousedata[spouseRg]',
			'label' => 'RG <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => $requiredSpouse,
			'required' => ($requiredSpouse === true && isset($_POST['ln']) && $_POST['ln'] == 0) ? true : false,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj47',
			'autofocus' => 'autofocus',
			'autocomplete' => 'off'
			]
			] ) );

		$requiredSpouse = (isset($_POST['sitConjugal']) && $_POST['sitConjugal'] == 2) ? true : false;
		$conjuge->add ( new Library_Form_Text ( [
			'name' => 'spousedata[spouseOrgaoEmissor]',
			'label' => 'Órgão Emissor <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => $requiredSpouse,
			'required' => ($requiredSpouse === true && isset($_POST['ln']) && $_POST['ln'] == 0) ? true : false,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj48' ,
			'autocomplete' => 'off'
			]
			] ) );

		$estados2 = $estados->fetchAll();
		$estadoOptions[] = "Selecione...";

		foreach ($estados2 as $estado):
			$estadoOptions[$estado['uf']] = utf8_decode(utf8_encode($estado['nome']));
		endforeach;

		$conjuge->add ( new Library_Form_Select ( [
			'name' => 'spousedata[spouseUfRg]',
			'label' => 'U.F. - RG <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'value' => 'PR',
			'required' => (isset($_POST['sitConjugal']) && $_POST['sitConjugal'] == 2) ? true : false,
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
			'options_value' => $estadoOptions,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj49'
			]
			] ) );

		$conjuge->add ( new Library_Form_Text ( [
			'name' => 'spousedata[spouseDtNasc]',
			'label' => 'Data de Nascimento <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => $requiredSpouse,
			'required' => ($requiredSpouse === true && isset($_POST['ln']) && $_POST['ln'] == 0) ? true : false,
			'type' => 'date',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj50'
			]
			] ) );

		$conjuge->add ( new Library_Form_Text ( [
			'name' => 'spousedata[idadeConjuge]',
			'label' => 'Idade Cônjuge',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj14-2',
			'readonly' => true,
			]
			] ) );

		$conjuge->add ( new Library_Form_Text ( [
			'name' => 'spousedata[spouseUfNatural]',
			'label' => 'U.F. <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => $requiredSpouse,
			'required' => ($requiredSpouse === true && isset($_POST['ln']) && $_POST['ln'] == 0) ? true : false,
			'value' => 'PR',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj51-0'
			]
			] ) );

		/*if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
			$cidades = Database::findAll("SELECT * FROM tb_cidades", []);
			$cidadesOptions[] = "Selecione...";
			foreach ($cidades as $cidade):
			$cidadesOptions[$cidade['nome']] = utf8_encode($cidade['nome']);
			endforeach;
			$optionValueCidade1 = $cidadesOptions;
			} else {
			$optionValueCidade1[] = 'Selecione seu Estado primeiro';
		}*/
		$conjuge->add ( new Library_Form_Text ( [
			'name' => 'spousedata[spouseNaturalidade]',
			'label' => 'Naturalidade <span class="spanrequired">*</span>',
			'required' => $requiredSpouse,
			'required' => ($requiredSpouse === true && isset($_POST['ln']) && $_POST['ln'] == 0) ? true : false,
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj51'
			]
			] ) );

		$conjuge->add ( new  Library_Form_Radio ( [
			'name' => 'spousedata[spouseSexo]',
			'label' => 'Sexo',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Masculino',
			'value' => 'M',
			'id' => 'obj52-1',
			'checked' => true
			],
			[
			'label' => 'Feminino',
			'value' => 'F' ,
			'id' => 'obj52-2'
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$conjuge->add ( new Library_Form_Select ( [
			'name' => 'spousedata[spouseFormEscolar]',
			'label' => 'Formação Escolar',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Pré Escolar',
			'2' => '1ª à 4ª Série',
			'3' => '5ª à 8ª Série',
			'4' => '2º Grau',
			'5' => 'Superior',
			'6' => 'Não Alfabetizado'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj53'
			]
			] ) );

		$conjuge->add ( new  Library_Form_Radio ( [
			'name' => 'spousedata[spouseComplemento]',
			'label' => 'Complemento',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Completo',
			'value' => 1,
			'id' => 'obj54-1',
			'checked' => true
			],
			[
			'label' => 'Incompleto',
			'value' => 0 ,
			'id' => 'obj54-2',
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$conjuge->add ( new  Library_Form_Radio ( [
			'name' => 'spousedata[spouseEstudando]',
			'label' => 'Estudando',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj55-1'
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj55-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$conjuge->add ( new Library_Form_Select ( [
			'name' => 'spousedata[sitConjugal1]',
			'label' => 'Estado Civil',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Solteiro',
			'2' => 'Casado',
			'3' => 'Viúvo',
			'4' => 'Separado Judicialmente',
			'5' => 'Divorciado',
			'6' => 'Amasiado',
			'7' => 'União Estável'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj55-1',
			]
			] ) );

		$conjuge->add ( new Library_Form_Text ( [
			'name' => 'spousedata[spouseProfissao]',
			'label' => 'Profissão',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj56' ,
			'autocomplete' => 'off'
			]
			] ) );

		$conjuge->add ( new Library_Form_Text ( [
			'name' => 'spousedata[spouseEmpregador]',
			'label' => 'Empregador',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'Empregador',
			'class' => 'form-control',
			'id' => 'obj56-1',
			'autocomplete' => 'off'
			]
			] ) );

		$conjuge->add ( new Library_Form_Select ( [
			'name' => 'spousedata[spouseSituacaoRenda]',
			'label' => 'Situação Renda',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'F' => 'Fixa',
			'V' => 'Variável',
			'A' => 'Aposentado/Pensionista'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj57',
			]
			] ) );

		$conjuge->add ( new Library_Form_Text ( [
			'name' => 'spousedata[spouseSalario]',
			'label' => 'Salário Cônjuge',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'R$',
			'class' => 'form-control',
			'id' => 'obj58' ,
			'data-type' => 'renda',
			'autocomplete' => 'off'
			]
			] ) );

		$this->addFieldset ( $conjuge );

		$aspectos = new Library_Form_Fieldset ( 'aspectos', 'ASPECTOS DA FAMÍLIA' );

		$aspectos->add ( new  Library_Form_Radio ( [
			'name' => 'socialaspects[necEspec]',
			'label' => 'Possui necessidades especiais?',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj59-1',
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj59-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'rel' => '1-obj60',
			]
			] ) );

		$aspectos->add ( new Library_Form_Select ( [
			'name' => 'socialaspects[deficiencia]',
			'label' => 'Deficiência',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Física',
			'2' => 'Mental',
			'3' => 'Auditiva',
			'4' => 'Visual',
			'5' => 'Outra'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj60',
			'readonly' => true
			]
			] ) );

		$aspectos->add ( new  Library_Form_Radio ( [
			'name' => 'socialaspects[adaptImovel]',
			'label' => 'Imóvel necessita adaptação?',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj61-1',
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj61-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'rel' => '1-obj62'
			]
			] ) );

		$aspectos->add ( new Library_Form_Select ( [
			'name' => 'socialaspects[tpAdapt]',
			'label' => 'Tipo Adaptação',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Barra',
			'2' => 'Rampa',
			'3' => 'Alargamento de Portas',
			'4' => 'Outro'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj62',
			'rel' => '4-obj63',
			'readonly' => true
			]
			] ) );

		$aspectos->add ( new Library_Form_Text ( [
			'name' => 'socialaspects[outroTpAdapt]',
			'label' => 'Outro Tipo de Adaptação',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj63',
			'readonly' => true,
			'autocomplete' => 'off'
			]
			] ) );

		$aspectos->add ( new  Library_Form_Radio ( [
			'name' => 'socialaspects[cadUnico]',
			'label' => 'Cadastro no CADUNICO',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj64-1',
			'checked' => true
			],
			[
			'label' => 'Não',
			'value' => 0 ,
			'id' => 'obj64-2'
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$aspectos->add ( new Library_Form_Select ( [
			'name' => 'socialaspects[projSocial]',
			'label' => 'Participa de Prog./Proj. Social',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Benefício de Prestação Continuada - BPC',
			'2' => 'Bolsa Família',
			'3' => 'Outro'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'rel' => '3-obj66',
			'id' => 'obj65'
			]
			] ) );

		$aspectos->add ( new Library_Form_Text ( [
			'name' => 'socialaspects[outroProj]',
			'label' => 'Outro Prog/Proj Social',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj66',
			'readonly' => true ,
			'autocomplete' => 'off'
			]
			] ) );

		$aspectos->add ( new Library_Form_Text ( [
			'name' => 'socialaspects[vlrProj]',
			'label' => 'Valor da Assistência',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'R$',
			'class' => 'form-control',
			'id' => 'obj67',
			'readonly' => true
			]
			] ) );

		$aspectos->add ( new Library_Form_Text ( [
			'name' => 'socialaspects[nrNis]',
			'label' => 'Número do NIS',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj68' ,
			'autocomplete' => 'off'
			]
			] ) );

		$this->addFieldset ( $aspectos );

		$condicao = new Library_Form_Fieldset ( 'condicao', 'CONDIÇÃO DA MORADIA' );

		$condicao->add ( new Library_Form_Select ( [
			'name' => 'homecarac[sitPropriedade]',
			'label' => 'Situação da Propriedade',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Própria',
			'2' => 'Alugada',
			'3' => 'Cedida',
			'4' => 'Agregado',
			'5' => 'Ocupação Irregular',
			'6' => 'Outros'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj69',
			'autofocus' => 'autofocus'
			]
			] ) );

		$condicao->add ( new Library_Form_Text ( [
			'name' => 'homecarac[vlrAluguel]',
			'label' => 'Alugada',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'R$',
			'class' => 'form-control',
			'id' => 'obj70',
			'readonly' => true,
			] ] ) );

		$condicao->add ( new  Library_Form_Radio ( [
			'name' => 'homecarac[titularidade]',
			'label' => 'Titularidade',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj71-1',
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj71-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'disabled' => true
			] ] ) );

		$condicao->add ( new Library_Form_Select ( [
			'name' => 'homecarac[tpConstruc]',
			'label' => 'Tipo Construção <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Alvenaria',
			'2' => 'Metálica',
			'3' => 'Madeira',
			'4' => 'Mista(Alvenaria/Madeira)',
			'5' => 'Mista(Pré-Fab/Mad)',
			'6' => 'Pré-Fabricada(Alv)',
			'7' => 'Pré-Fabricada(Placas)',
			'8' => 'Outro'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj72',
			'rel' => '8-obj73'
			]
			] ) );

		$condicao->add ( new Library_Form_Text ( [
			'name' => 'homecarac[outroMaterial]',
			'label' => 'Outro Tipo Const.',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj73',
			'readonly' => true,
			'autocomplete' => 'off'
			]
			] ) );

		$condicao->add ( new Library_Form_Select ( [
			'name' => 'homecarac[conserv]',
			'label' => 'Conservação',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Péssima',
			'2' => 'Regular',
			'3' => 'Boa',
			'4' => 'Ótima'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj74'
			]
			] ) );

		$condicao->add ( new Library_Form_Text ( [
			'name' => 'homecarac[nrQuartos]',
			'label' => 'Número de Quartos',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj75' ,
			'autocomplete' => 'off'
			]
			] ) );

		$condicao->add ( new Library_Form_Text ( [
			'name' => 'homecarac[nrComodos]',
			'label' => 'Número de Cômodos',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj76' ,
			'autocomplete' => 'off'
			]
			] ) );

		$condicao->add ( new  Library_Form_Radio ( [
			'name' => 'homecarac[luz]',
			'label' => 'Rede de Energia',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj77-1',
			'checked' => true
			],
			[
			'label' => 'Não',
			'value' => 0 ,
			'id' => 'obj77-2'
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$condicao->add ( new  Library_Form_Radio ( [
			'name' => 'homecarac[agua]',
			'label' => 'Rede de Água',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj78-1',
			'checked' => true
			],
			[
			'label' => 'Não',
			'value' => 0 ,
			'id' => 'obj78-2'
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$condicao->add ( new  Library_Form_Radio ( [
			'name' => 'homecarac[esgoto]',
			'label' => 'Rede de Esgoto',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj79-1'
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj79-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$condicao->add ( new  Library_Form_Radio ( [
			'name' => 'homecarac[pav]',
			'label' => 'Pavimentação',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1 ,
			'id' => 'obj80-1'
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj80-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$condicao->add ( new Library_Form_Select ( [
			'name' => 'homecarac[tpEnergia]',
			'label' => 'Fonte de Energia',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Rede Pública',
			'2' => 'Ligação Clandestina (Rabicho)',
			'3' => 'Não Possui'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj82'
			]
			] ) );

		$condicao->add ( new Library_Form_Select ( [
			'name' => 'homecarac[tpAbastec]',
			'label' => 'Abastecimento de Água',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Rede Pública',
			'2' => 'Poço ou Nascente',
			'3' => 'Ligação Clandestina (Rabicho)'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj83'
			]
			] ) );

		$condicao->add ( new Library_Form_Select ( [
			'name' => 'homecarac[TpEscoa]',
			'label' => 'Escoamento Sanitário',
			'label_class' => 'control-label',
			'options_value' => [
			'0' => 'Selecione...',
			'1' => 'Fossa Rudimentar',
			'2' => 'Fossa Séptica',
			'3' => 'Vala Comum',
			'4' => 'Céu Aberto',
			'5' => 'Rede de Esgoto'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj84'
			]
			] ) );

		$condicao->add ( new  Library_Form_Radio ( [
			'name' => 'homecarac[lixo]',
			'label' => 'Serv. Coleta de Lixo Municipal',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj85-1',
			'checked' => true
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj85-2'
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$condicao->add ( new  Library_Form_Radio ( [
			'name' => 'homecarac[reciclavel]',
			'label' => 'Separação de Recicláveis',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj86-1',
			'checked' => true
			],
			[
			'label' => 'Não',
			'value' => 0 ,
			'id' => 'obj86-2'
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			]
			] ) );

		$condicao->add ( new Library_Form_CampoTempo ( [
			'name' => 'homecarac[tmpMoradia]',
			'label' => 'Tempo Reside no Imóvel Atual <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'style' => 'width: 17%',
			'class' => 'form-control col-md-6',
			'id' => 'obj81'
			],
			'options_value' => [
			[
			'label' => 'Anos',
			'value' => '00',
			'id' => 'obj81-1'
			],
			[
			'label' => 'Meses',
			'value' => '00',
			'id' => 'obj81-2'
			]
			]
			] ) );

		$condicao->add ( new Library_Form_Select ( [
			'name' => 'origin[origem]',
			'label' => 'Procedência',
			'label_class' => 'control-label',
			'options_value' => ['0' => 'Selecione...',
			'1' => 'Do Município',
			'2' => 'Outro Município',
			'3' => 'Outro Estado',
			'4' => 'Outro País'
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control chosen',
			'id' => 'obj87',
			'rel' => '2-obj88|3-obj88|4-obj88',
			'autofocus' => 'autofocus',
			'style' => 'z-index: 87;'
			]
			] ) );

		$condicao->add ( new Library_Form_Text ( [
			'name' => 'origin[qualOrig]',
			'label' => 'Qual/Outro',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj88',
			'readonly' => true,
			'autocomplete' => 'off'
			]
			] ) );

		$condicao->add ( new Library_Form_CampoTempo ( [
			'name' => 'origin[tmpResidMunicipio]',
			'label' => 'Tempo Reside no Município <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'style' => 'width: 17%',
			'class' => 'form-control col-md-6',
			'id' => 'obj89'
			],
			'options_value' => [
			[
			'label' => 'Anos',
			'value' => '00',
			'id' => 'obj89-1'
			],
			[
			'label' => 'Meses',
			'value' => '00',
			'id' => 'obj89-2'
			]
			]
			] ) );

		$this->addFieldset ( $condicao );

		$caracteristicas = new Library_Form_Fieldset ( 'caracteristicas', 'CARACTERÍSTICAS DO CADASTRO' );
		
		$caracteristicas->add ( new  Library_Form_Radio ( [
			'name' => 'holderdata[ln]',
			'label' => 'L_N',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj96-1',
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj96-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'rel' => '1-obsLN'
			]
			] ) );

		$caracteristicas->add ( new  Library_Form_Radio ( [
			'name' => 'principaldata[atendido]',
			'label' => 'Contemplado',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj97-1',
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj97-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'rel' => '1-nometitular'
			] ] ) );

		$caracteristicas->add ( new  Library_Form_Radio ( [
			'name' => 'principaldata[urgenteEspecial]',
			'label' => 'Urgente/Especial',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj114-1',
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj114-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'rel' => '1-obj115',
			]
			] ) );

		$caracteristicas->add ( new Library_Form_Textarea ( [
			'name' => 'principaldata[infoUrgencia]',
			'label' => 'Motivo Urgencia',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'Digite aqui as informações da Urgência...',
			'class' => 'form-control',
			'id' => 'obj115',
			'readonly' =>  true,
			'style' => 'z-index: 20000; position: relative;'
			]
			] ) );

		$caracteristicas->add ( new  Library_Form_Radio ( [
			'name' => 'principaldata[preSelecionado]',
			'label' => 'Pré-Selecionado',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => '1',
			'id' => 'obj98-1',
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj98-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'rel' => '1-obj99',
			]
			,
			] ) );

		$caracteristicas->add ( new Library_Form_Text ( [
			'name' => 'principaldata[nrControlePreSel]',
			'label' => 'Nº Controle Pré-Selecionado',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control ',
			'id' => 'obj99',
			'readonly' => true
			]
			] ) );

		$caracteristicas->add ( new  Library_Form_Radio ( [
			'name' => 'principaldata[visitado]',
			'label' => 'Visitado',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'obj100-1',
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'obj100-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'rel' => '1-obj101'
			]
			] ) );

		$caracteristicas->add ( new Library_Form_Text ( [
			'name' => 'principaldata[dataVisita]',
			'label' => 'Visitado Em',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control ',
			'id' => 'obj101',
			'placeholder' => 'aaaa',
			'readonly' => true
			]
			] ) );

		$caracteristicas->add(new  Library_Form_Radio([
			'name' => 'principaldata[solicitaAssist]',
			'label' => 'Solicita Avaliação Social',
			'label_class' => 'control-label',
			'options_value' => [
			[
			'label' => 'Sim',
			'value' => 1,
			'id' => 'objt105-1',
			],
			[
			'label' => 'Não',
			'value' => 0,
			'id' => 'objt105-2',
			'checked' => true
			]
			],
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'rel' => '1-objt106',
			]
			]));

		$caracteristicas->add(new Library_Form_Text([
			'name' => 'principaldata[dtSolicitaAssist]',
			'type' => 'date',
			'label' => 'Data da Solicitação',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'objt106',
			//'readonly' => (isset($_POST['solicitaAssist']) && $_POST['solicitaAssist'] == 0) ? true : false,
			//'required' => (isset($_POST['solicitaAssist']) && $_POST['solicitaAssist'] == 1) ? true : false,
			]
			]));

		$caracteristicas->add ( new Library_Form_Textarea ( [
			'name' => 'principaldata[obsAdicionais]',
			'label' => 'Observações',
			'label_class' => 'control-label',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'placeholder' => 'Digite aqui as observações adicionais...',
			'class' => 'form-control',
			'id' => 'obj92',
			'style' => 'z-index: 20000; position: relative;'
			]
			] ) );

		$caracteristicas->add ( new Library_Form_Text ( [
			'name' => 'principaldata[dtCadastro1]',
			'type' => 'date',
			'type' => 'hidden',
			'style' => 'display: none',
			'atributes' => [
			'id' => 'obj102'
			]
			] ) );

		$caracteristicas->add ( new Library_Form_Text ( [
			'name' => 'principaldata[dtAtualiza]',
			'type' => 'date',
			'type' => 'hidden',
			'style' => 'display: none',
			'atributes' => [
			'id' => 'obj102-1'
			]
			] ) );

		$caracteristicas->add ( new Library_Form_Text ( [
			'name' => 'principaldata[timeUltimaAtualizacao]',
			'type' => 'time',
			'type' => 'hidden',
			'style' => 'display: none',
			'atributes' => [
			'id' => 'obj102-2'
			]
			] ) );

		$this->addFieldset ( $caracteristicas );

		$assistencia = new Library_Form_Fieldset ( 'assistencia', 'ASSISTÊNCIA SOCIAL' );

		$assistentes = new Models_Assistentes();

		$assistentes1 = $assistentes->fetchAll("SELECT * FROM users where atribuicao = 4");
		$assistenteOptions[] = "Selecione...";

		foreach ($assistentes1 as $assistente):
			$assistenteOptions[$assistente['name']] = utf8_encode($assistente['name']);
		endforeach;

		$assistencia->add(new Library_Form_Select([
			'name' => 'principaldata[nmAssistente]',
			'label' => 'Nome do Técnico (Assistência Social)',
			'label_class' => 'control-label',
			'options_value' => $assistenteOptions,
			'atributes' => [
			'class' => 'form-control',
			'id' => 'objt108',
			'autofocus' => true,
			'autocomplete' => 'off'
			]
			]));

		$assistencia->add(new Library_Form_Text([
			'name' => 'principaldata[dtAtendAssist]',
			'type' => 'date',
			'label' => 'Data de Atendimento da Assistência',
			'label_class' => 'control-label',
			'atributes' => [
			'class' => 'form-control',
			'id' => 'objt108-1',
			]
			]));

		$assistencia->add ( new Library_Form_Textarea ( [
			'name' => 'principaldata[obsAssistente]',
			'label' => 'Observações da Assistente',
			'label_class' => 'control-label',
			'atributes' => [
			'placeholder' => 'Digite aqui as informações da Assistência...',
			'class' => 'form-control',
			'id' => 'objt107',
			'style' => 'z-index: 20000; position: relative;'
			]
			] ) );

		$this->addFieldset ( $assistencia );

		$entrevista = new Library_Form_Fieldset ( 'entrevista', 'DADOS DA ENTREVISTA' );

		$entrevista->add ( new Library_Form_Text ( [
			'name' => 'holderdata[nmEntrevistador]',
			'label' => 'Nome do Entrevistador <span class="spanrequired">*</span>',
			'label_class' => 'control-label',
			'value' => isset ($_SESSION['user']['name']) ? utf8_encode($_SESSION['user']['name']) : '',
			'required' => (isset($_POST['ln']) && $_POST['ln'] == 1) ? false: true,
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj103',
			'autofocus' => 'autofocus',
			'autocomplete' => 'off'
			]
			] ) );

		$entrevista->add ( new Library_Form_Text ( [
			'name' => 'holderdata[dtEntrevista1]',
			'label' => 'Data da Entrevista',
			'label_class' => 'control-label',
			'type' => 'date',
			'noinput' => $this->noinput([1, 2]),
			'atributes' => [
			'class' => 'form-control',
			'id' => 'obj104-0',
			]
			] ) );

		$ip = $_SERVER['REMOTE_ADDR'];
		$entrevista->add ( new Library_Form_Text ( [
			'name' => 'principaldata[ipMicro]',
			'type' => 'hidden',
			'value' => $ip,
			'atributes' => [
			'class' => 'form-control',
			'id' => 'ipMicro',
			]
			] ) );

		$entrevista->add ( new Library_Form_Text ( [
			'name' => 'principaldata[nmEntrevistador1]',
			'type' => 'hidden',
			'atributes' => [
			'class' => 'form-control',
			'id' => '103'
			]
			] ) );

		$entrevista->add ( new Library_Form_Text ( [
			'name' => 'principaldata[ipModem]',
			'type' => 'hidden',
			'atributes' => [
			'class' => 'form-control',
			'id' => 'ipModem',
			]
			] ) );

		$entrevista->add ( new Library_Form_Text ( [
			'name' => 'holderdata[textoFoto]',
			'type' => 'hidden',
			'atributes' => [
			'class' => 'form-control',
			'id' => 'textoFoto',
			]
			] ) );

		$this->addFieldset ( $entrevista );
	}
}
?>