<?php
class Controllers_Ajax
{
	function verificacpfAction(){
		$formatFields = new Library_Form_FormatFields();
		$cpf = $_GET['cpf'];

		if(!empty($cpf)){
			$cpf = $formatFields->mask ($cpf);

			$spousedata = new Models_Spousedata;
			$resultSpousedata = $spousedata->fetchAll("(SELECT s.id, s.spouseCpf, s.holderdata_id FROM spousedata s WHERE s.spouseCpf = '" . $cpf . "' and s.spouseCpf is not null and inativo = 0 and s.holderdata_id != '" . $_GET['hId'] . "') ");
			print_r($resultSpousedata);

			$dependents = new Model_Dependents;
			$resultDependents = $dependents->FetchAll("(SELECT d.id, d.cpf, d.holderdata_id FROM dependents d WHERE d.cpf = '" . $cpf . "' and d.cpf is not null and d.holderdata_id != '" . $_GET['hId'] . "' and status = 1 )");
			print_r($resultDependents);

			//$geo = Database::findAll("SELECT nrCadastro, CNPJ_Cpf FROM ctu_tb_cad_imobiliario_arcgis ctu WHERE ctu.CNPJ_Cpf = '" . $cpf . "'");

			$nInscricao ['sId'] = '';
			$nInscricao ['dId'] = '';
			$nInscricao ['hId'] = '';
			$nInscricao ['nrCadastro'] = '';

			if($spousedata) {
				$countSpousedata = count($spousedata);
				if($countSpousedata == 1) {
					$nInscricao['sId'] = $spousedata[0]['holderdata_id'];
				} else {
					foreach($spousedata as $spouse) {
						$nInscricao['sId'][] = $spouse['holderdata_id'];
					}
				}
			}

			if($dependents) {
				$countDependents = count($dependents);
				if($countDependents == 1) {
					$nInscricao['dId'] = $dependents[0]['holderdata_id'];
				} else {
					foreach($dependents as $dependent) {
						$nInscricao['dId'][] = $dependent['holderdata_id'];
					}
				}
			}

			/*if($geo) {
				$nInscricao['nrCadastro'] = $geo[0]['nrCadastro'];
			}*/

			$holderdata = new Model_Holderdata;
			$resultHolderdata = $holderdata->FetchAll("(SELECT h.cpf, h.id FROM holderdata h WHERE h.cpf = '" . $cpf . "' and h.cpf is not null and inativo = 0 and h.id != '" . $_GET ['hId'] . "'  )");
			print_r($resultHolderdata);

			if(isset($holderdata[0]['id'])) {
				$nInscricao['hId'] = $holderdata[0]['id'];
			}
			if($nInscricao) {
				echo json_encode($nInscricao);
			} else {
				echo '';
			}
		} else {
			echo '';
		}
	}
}