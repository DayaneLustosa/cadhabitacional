<?php
class Library_Form_Fieldset{
	protected $elements = [];
	protected $name;
	protected $title;

	function __construct($name, $title="---"){
		$this->name = $name;
		$this->title = $title;
	}

	public function add(Library_Form_Element $element){
		$this->elements[$element->getName()] = $element;
	}

	public function getName(){
		return $this->name;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getElements(){
		return $this->elements;
	}

	public function getElement($name){
		return $this->elements[$name];
	}

		//apagar campos do formulario
	public function remove($name){
		unset($this->elements[$name]);
	}
	/**
	 *
	 * @param array $options [prepend_html, append_html]
	 * @return string
	 */
	function renderElements($options = []){
		$elements = '';
		foreach ($this->getElements() as $element){
			$hasError = ($element->getValid())?'':'has-error';
			if($element->getType() != "hidden" && $element->getType() != "html"){
				$elements .= isset($options['prepend_html'])?$options['prepend_html']:'';
				$elements .= '<div class="'.$hasError.'">';
			}
			$elements .= $element->__toString();
			if($element->getType() != "hidden" && $element->getType() != "html"){
				$elements .= sprintf(' <p class="help-block">%s</p>', $element->getMessage());
				$elements .= '</div>';
				$elements .= isset($options['append_html'])?$options['append_html']:'';
			}
		}
		return $elements;
	}

	public function populate($data){
		foreach ($this->elements as $element){
			if(isset($data[$element->getName()])){
				$element->setValue($data[$element->getName()]);
			}
			if($element->getName() == 'dtEntrevista1'){
				if(!strstr($element->getAtributes(), 'obj104-0') && isset($data['dtEntrevista1'])){
					$formatFields = new FormatFields();
					$dtEntrevista = $formatFields->formatar($data['dtEntrevista1'], "data");
					$element->setValue($dtEntrevista);
				}
			}
			if($element->getName() == 'tbDependents' && isset($data['hId'])){
				$element->setHtml($data['hId']);
			}
			if($element->getName() == 'tmpServico'){
				if(isset($data['tmpServicoAnos']) && isset($data['tmpServicoMeses'])){
					$element->setValue($data['tmpServicoAnos'].'-'.$data['tmpServicoMeses']);
				}
			}
			if($element->getName() == 'tmpMoradia'){
				if(isset($data['tmpMoradiaAnos']) && isset($data['tmpMoradiaMeses'])){
					$element->setValue($data['tmpMoradiaAnos'].'-'.$data['tmpMoradiaMeses']);
				}
			}
			if($element->getName() == 'tmpResidMunicipio'){
				if(isset($data['tmpResidMunicipioAnos']) && isset($data['tmpResidMunicipioMeses'])){
					$element->setValue($data['tmpResidMunicipioAnos'].'-'.$data['tmpResidMunicipioMeses']);
				}
			}
		}
	}

	public function isValid(){
		$valid = true;
		foreach ($this->elements as $element){
			if(!$element->isValid()){
				echo '<pre>';
				print_r($element);
				echo '</pre>';
				$valid = false;
			}
		}
		return $valid;
	}
}