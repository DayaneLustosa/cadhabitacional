<?php
class Pesquisa {
	private $resultPesquisa;

	public function __construct($post){
		$sqlWhere = $this->sqlWhere($post);
		$resultPesquisaCount = '';
		if(empty ($post['pesqControle']) && empty ($post['pesqSetorQuadraLote']) && empty ($post['pesqNrInscricao']) && empty ($post['pesqNmInscrito']) && empty ($post['pesqInscAnt']) && empty ($post['pesqCpf']) && empty ($post['pesqEndereco']) && empty ($post['pesqNp'])){
			$resultPesquisaCount == 0;
/*echo '<div class="alert alert-danger" style="text-align: center;">
<a class="close" data-dismiss="alert" href="#"><span
class="glyphicon glyphicon-remove"></span></a>"Não existem parâmetros para efetuar sua pesquisa, por favor preencha um dos campos."</div>
';*/
		} else {
			if(empty ($post['pesqControle']) && empty ($post['pesqSetorQuadraLote'])){
				$pesquisa = Database::findAll('SELECT * FROM pesquisa '.$sqlWhere.'');
			} else {
				$pesquisa = Database::findAll('Select * from geo '.$sqlWhere.'');
			}

			$resultPesquisaCount = count ( $pesquisa );

			$this->resultPesquisa = $pesquisa;
		}
	}

	public function getResultPesquisa(){
		return $this->resultPesquisa;
	}

	private function sqlWhere($post){
		$sqlWhere = null;
		if(isset ($post['pesqNrInscricao']) && !empty($post['pesqNrInscricao'])){
			$sqlWhere.='hId="'.$post['pesqNrInscricao'].'" ';
		}
		if(isset ($post['pesqNmInscrito'])&& !empty($post['pesqNmInscrito'])){
			$formatFields = new FormatFields();
			$sqlWhere.=$this->addAnd($sqlWhere).'holderName="'.strtoupper($formatFields->removeAcentos($post['pesqNmInscrito'])).'" ';
			$sqlWhere.=' || spouseName="'.strtoupper($formatFields->removeAcentos($post['pesqNmInscrito'])).'" ';
		}
		if(isset ($post['pesqControle'])&& !empty($post['pesqControle'])){
			$sqlWhere.=$this->addAnd($sqlWhere).'pesqControle="'.$post['pesqControle'].'" ';
		}
		if(isset ($post['pesqSetorQuadraLote'])&& !empty($post['pesqSetorQuadraLote'])){
			$sqlWhere.=$this->addAnd($sqlWhere).'pesqSetorQuadraLote="'.$post['pesqSetorQuadraLote'].'" ';
		}
		if(isset ($post['pesqEndereco'])&& !empty($post['pesqEndereco'])){
			$formatFields = new FormatFields();
			$sqlWhere.=$this->addAnd($sqlWhere).'end="'.strtoupper($formatFields->removeAcentos($post['pesqEndereco'])).'" ';
		}
		if(isset ($post['pesqNp'])&& !empty($post['pesqNp'])){
			$sqlWhere.=$this->addAnd($sqlWhere).'np="'.$post['pesqNp'].'" ';
		}
		if(isset ($post['pesqInscAnt'])&& !empty($post['pesqInscAnt'])){
			$sqlWhere.=$this->addAnd($sqlWhere).'hIdOld="'.$post['pesqInscAnt'].'" ';
		}
		if(isset ($post['pesqCpf'])&& !empty($post['pesqCpf'])){
			$formatFields = new FormatFields();
			$sqlWhere.=$this->addAnd($sqlWhere).'holderCpf="'.$formatFields->mask($post['pesqCpf']).'" ';
			$sqlWhere.=' || spouseCpf="'.$formatFields->mask($post['pesqCpf']).'" ';
			//nome do campo na tabela tem que ser igual ao name do campo no form;
		}
		//if(strlen($sqlWhere) > 0 && empty($post['pesqControle']) && empty($post['pesqSetorQuadraLote'])){
		//	$sqlWhere = "where ((inativo != 1) or (inativo is null)) and ((hInativo != 1) or (hInativo is null)) and ((sInativo != 1) or (sInativo is null)) and ".$sqlWhere;
		//} else {
		$sqlWhere = "where " . $sqlWhere;
		//}
		return $sqlWhere;
	}

	private function addAnd($sqlWhere){
		if(strlen($sqlWhere) > 0){
			return " and ";
		}
	}
}