<?php
function calc_idade($data_nascimento) {
	$data_nasc = explode('-', $data_nascimento);
	if(isset($data_nasc[1])){
		$data = date('Y-m-d');
		$data = explode("-", $data);
		$anos = $data[0] - $data_nasc[0];

		if ($data_nasc[1] >= $data[1]){
			if ($data_nasc[2] <= $data[2]){
				return $anos; break;
			} else {
				return $anos-1;
				break;
			}
		} else {
			return $anos;
		}
	}
}
class Library_Form_Html extends Library_Form_Element{
	protected $html;
	protected $name;
	protected $type = 'html';

	function __construct($options = null) {
		if (isset ( $options ['name'] )) {
			$this->setName ( $options ['name'] );
		}
		$this->setHtml();
	}

	public function __toString(){
		return $this->html;
	}

	public function setHtml($hId = '') {
		$tbDepend = null;
		$dependents = null;
		if ($_SERVER ['REQUEST_METHOD'] === 'POST' || (isset($_POST['pesq']))) {
			$dependents = Database::findAll ("Select * FROM dependents where holderdata_id = '".$hId."'");
		}
		if (isset($_POST['dependent']) && $_SERVER ['REQUEST_METHOD'] === 'POST' && (!isset($_POST['pesq']))){
			$dependents = $_POST['dependent'];
		}
		if(isset($dependents)){
			$formatfields = new Library_Form_FormatFields();
			foreach ($dependents as $index => $dependent):
				$tbDepend .= '<tr id="'.$index.'-dependents">
			<td> '. strtoupper($dependent['name']) .' </td>
			<td> '. strtoupper($dependent['parentesco']).' </td>
			<td> '. $formatfields->formatar($dependent['datanasc'], "data").' </td>
			<td> '. calc_idade($dependent['datanasc']).' ano(s) </td>
			<td> '. strtoupper($dependent['escolaridade']).' </td>
			<td> '. $dependent['cpf'].' </td>
			<td> '. $dependent['renda'].' </td>
			<td> '. (isset($dependent['status']) ? 'Ativo':'Inativo') .' </td>';

			if($_SESSION['user']['atribuicao'] != 4){
				$tbDepend .= '<td><a href="#" class="btn btn-default edit-btn"
				data-id="'. $index .'">Editar</a></td>
				<input type="hidden" name="dependent['. $index .'][name]"
				value="'. trim($dependent['name']) .'">
				<input type="hidden" name="dependent['. $index .'][parentesco]"
				value="'. trim($dependent['parentesco']).'">
				<input type="hidden" name="dependent['. $index .'][datanasc]"
				value="'. $dependent['datanasc'] .'">
				<input type="hidden" name="dependent['. $index .'][age]"
				value="'. $dependent['age'] .'">
				<input type="hidden" name="dependent['. $index .'][escolaridade]"
				value="'. trim($dependent['escolaridade']) .'">
				<input type="hidden" name="dependent['. $index .'][cpf]"
				value="'. $dependent['cpf'] .'">
				<input type ="hidden" name="dependent['. $index .'][renda]"
				value="'. $dependent['renda'] .'" data-type="renda" id="renda">
				<input type="hidden" name="dependent['. $index .'][status]"
				value="'. $dependent['status'] .'">';
			}

			$tbDepend .= '</tr>';
			endforeach;
		}

		$tbDependents = '<table class="table table-hover">
		<thead>
		<tr>
		<th colspan="9">Composição Familiar: </th>
		</tr>
		<tr>
		<th>Nome</th>
		<th>Parentesco</th>
		<th>Data de Nascimento</th>
		<th>Idade</th>
		<th>Escolaridade</th>
		<th>CPF</th>
		<th>Renda</th>
		<th>Status</th>';

		if(isset($_SESSION['user']['atribuicao']) && $_SESSION['user']['atribuicao'] != 4) {
			$tbDependents .= '<th style="width: 60px;"><a id="add-dep" class="btn btn-default"
			href="javascript: void(0)" title="Adicionar Membro na Composição Familiar"><span class="glyphicon glyphicon-plus"></span></a></th>';
		} 

		$tbDependents .= '</tr>
		</thead>
		<tbody id="tbody-dependentes">
		' . $tbDepend . '
		</tbody>
		</table> <input type="hidden" id="contagem" value="'.(isset($dependents) ? count($dependents) : '0').'">';
		
		$this->html = $tbDependents;
	}
}