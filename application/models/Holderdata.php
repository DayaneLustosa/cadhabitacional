<?php

class Models_Holderdata extends Library_Model {

  protected $_table = 'holderdata';
  protected $_model = 'Models_Holderdata';

  public function getColumns(){
    return [
    'textoFoto',
    'localidadeAtual',
    'holderCtps',
    'holderCtpsSerie',
    'name',
    'rg',
    'orgaoEmissor',
    'ufRg',
    'cpf',
    'dtNasc',
    'sexo',
    'formEscolar',
    'complemento',
    'estudando',
    'sitConjugal',
    'dtCasamento',
    'profissao',
    'salario',
    'outrasRendas',
    'sitRenda',
    'anoSalario',
    'empregador',
    'endComercial',
    'telComercial',
    'atividade',
    'tmpServico',
    'vlrRenda',
    'ln',
    'motivoExclusao',
    'end',
    'np',
    'cep',
    'distrito',
    'bairro',
    'loteamento',
    'complemento2',
    'referencia',
    'naturalidade',
    'uf',
    'pais',
    'nmEntrevistador',
    'dtEntrevista1',
    'fonePrincipal',
    'fone',
    'cel',
    'email',
    'filhos',
    'quantFilhos',
    'pai',
    'mae'
    ];
  }

  protected function _insert($obj) {
    $holderdata = $this->getTable();
    $db = $this->getDb();
    
    $cpf = array('.', '-');
    $obj->cpf = str_replace($cpf, '', $obj->cpf);
    $dtCasamento = (!empty ($obj->dtCasamento)) ? $obj->dtCasamento : '0000-00-00';
    $obj->salario = str_replace(',', '.', $obj->salario);
    $salario = (!empty ($obj->salario)) ? $obj->salario : '0.00';
    $obj->outrasRendas = str_replace(',', '.', $obj->outrasRendas);
    $outrasRendas = (!empty ($obj->outrasRendas)) ? $obj->outrasRendas : '0.00';
    $obj->vlrRenda = str_replace(',', '.', $obj->vlrRenda);
    $vlrRenda = (!empty ($obj->vlrRenda)) ? $obj->vlrRenda : '0.00';
    $quantFilhos = (!empty ($obj->quantFilhos)) ? $obj->quantFilhos : '0';
    $dtNasc = (!empty ($obj->dtNasc)) ? $obj->dtNasc : '0000-00-00';
    
    $handler = $db->prepare("INSERT INTO " . $holderdata . " 
      (`textoFoto`,
       `localidadeAtual`,
       `holderCtps`,
       `holderCtpsSerie`,
       `name`,
       `rg`,
       `orgaoEmissor`,
       `ufRg`,
       `cpf`,
       `dtNasc`,
       `sexo`,
       `formEscolar`,
       `complemento`,
       `estudando`,
       `sitConjugal`,
       `dtCasamento`,
       `profissao`,
       `salario`,
       `outrasRendas`,
       `sitRenda`,
       `anoSalario`,
       `empregador`,
       `endComercial`,
       `telComercial`,
       `atividade`,
       `tmpServico`,
       `vlrRenda`,
       `ln`,
       `motivoExclusao`,
       `end`,
       `np`,
       `cep`,
       `distrito`,
       `bairro`,
       `loteamento`,
       `complemento2`,
       `referencia`,
       `naturalidade`,
       `uf`,
       `pais`,
       `nmEntrevistador`,
       `dtEntrevista1`,
       `fonePrincipal`,
       `fone`,
       `cel`,
       `email`,
       `filhos`,
       `quantFilhos`,
       `pai`,
       `mae`)
VALUES 
('" . $obj->textoFoto . "',
 '" . $obj->localidadeAtual . "',
 '" . $obj->holderCtps . "',
 '" . $obj->holderCtpsSerie . "',
 '" . $obj->name . "',
 '" . $obj->rg . "',
 '" . $obj->orgaoEmissor . "',
 '" . $obj->ufRg . "',
 '" . $obj->cpf . "',
 '" . $dtNasc . "',
 '" . $obj->sexo . "',
 '" . $obj->formEscolar . "',
 '" . $obj->complemento . "',
 '" . $obj->estudando . "',
 '" . $obj->sitConjugal . "',
 '" . $dtCasamento . "',
 '" . $obj->profissao . "',
 '" . $salario . "',
 '" . $outrasRendas . "',
 '" . $obj->sitRenda . "',
 '" . $obj->anoSalario . "',
 '" . $obj->empregador . "',
 '" . $obj->endComercial . "',
 '" . $obj->telComercial . "',
 '" . $obj->atividade . "',
 '" . $obj->tmpServico . "',
 '" . $vlrRenda . "',
 '" . $obj->ln . "',
 '" . $obj->motivoExclusao . "',
 '" . $obj->end . "',
 '" . $obj->np . "',
 '" . $obj->cep . "',
 '" . $obj->distrito . "',
 '" . $obj->bairro . "',
 '" . $obj->loteamento . "',
 '" . $obj->complemento2 . "',
 '" . $obj->referencia . "',
 '" . $obj->naturalidade . "',
 '" . $obj->uf . "',
 '" . $obj->pais . "',
 '" . $obj->nmEntrevistador . "',
 '" . $obj->dtEntrevista1 . "',
 '" . $obj->fonePrincipal . "',
 '" . $obj->fone . "',
 '" . $obj->cel . "',
 '" . $obj->email . "',
 '" . $obj->filhos . "',
 '" . $quantFilhos . "',
 '" . $obj->pai . "',
 '" . $obj->mae . "')");

$handler->execute();
$err = $handler->errorInfo();
if ($err[1] == "") {
  return $db->lastInsertId();
} else {
  return $err[1];
}
} //repetir nos outros models

protected function _update($obj) {

}

public function getId() {
  return $this->id;
}
public function setId($id) {
  $this->id = $id;
  return $this;
}
public function getTextoFoto() {
  return $this->textoFoto;
}

public function setTextoFoto($textoFoto) {
  $this->textoFoto = $textoFoto;
  return $this;
}
public function getLocalidadeAtual() {
  return $this->localidadeAtual;
}

public function setLocalidadeAtual($localidadeAtual) {
  $this->localidadeAtual = $localidadeAtual;
  return $this;
}
public function getHolderCtps() {
  return $this->holderCtps;
}

public function setHolderCtps($holderCtps) {
  $this->holderCtps = $holderCtps;
  return $this;
}
public function getHolderCtpsSerie() {
  return $this->holderCtpsSerie;
}

public function setHolderCtpsSerie($holderCtpsSerie) {
  $this->holderCtpsSerie = $holderCtpsSerie;
  return $this;
}
public function getName() {
  return $this->name;
}
public function setName($name) {
  $this->name = $name;
  return $this;
}
public function getRg() {
  return $this->rg;
}

public function setRg($rg) {
  $this->rg = $rg;
  return $this;
}
public function getOrgaoEmissor() {
  return $this->orgaoEmissor;
}

public function setOrgaoEmissor($orgaoEmissor) {
  $this->orgaoEmissor = $orgaoEmissor;
  return $this;
}
public function getUfRg() {
  return $this->ufRg;
}

public function setUfRg($ufRg) {
  $this->ufRg = $ufRg;
  return $this;
}
public function getCpf() {
  return $this->cpf;
}

public function setCpf($cpf) {
  $this->cpf = $cpf;
  return $this;
}
public function getDtNasc() {
  return $this->dtNasc;
}

public function setDtNasc($dtNasc) {
  $this->dtNasc = $dtNasc; 
  return $this;
}
public function getSexo() {
  return $this->sexo;
}

public function setSexo($sexo) {
  $this->sexo = $sexo;
  return $this;
}
public function getFormEscolar() {
  return $this->formEscolar;
}

public function setFormEscolar($formEscolar) {
  $this->formEscolar = $formEscolar;
  return $this;
}
public function getComplemento() {
 return $this->complemento;
}

public function setComplemento($complemento) {
 $this->complemento = $complemento;
 return $this;
}
public function getEstudando() {
 return $this->estudando;
}

public function setEstudando($estudando) {
 $this->estudando = $estudando;
 return $this;
}
public function getSitConjugal() {
 return $this->sitConjugal;
}

public function setSitConjugal($sitConjugal) {
 $this->sitConjugal = $sitConjugal;
 return $this;
}
public function getDtCasamento() {
 return $this->dtCasamento;
}

public function setDtCasamento($dtCasamento) {
 $this->dtCasamento = $dtCasamento;
 return $this;
}
public function getProfissao() {
 return $this->profissao;
}

public function setProfissao($profissao) {
 $this->profissao = $profissao;
 return $this;
}
public function getSalario() {
 return $this->salario;
}

public function setSalario($salario) {
 $this->salario = $salario;
 return $this;
}
public function getOutrasRendas() {
 return $this->outrasRendas;
}

public function setOutrasRendas($outrasRendas) {
 $this->outrasRendas = $outrasRendas;
 return $this;
}
public function getSitRenda() {
 return $this->sitRenda;
}

public function setSitRenda($sitRenda) {
 $this->sitRenda = $sitRenda;
 return $this;
}
public function getAnoSalario() {
 return $this->anoSalario;
}

public function setAnoSalario($anoSalario) {
 $this->anoSalario = $anoSalario;
 return $this;
}
public function getEmpregador() {
 return $this->empregador;
}

public function setEmpregador($empregador) {
 $this->empregador = $empregador;
 return $this;
}
public function getEndComercial() {
 return $this->endComercial;
}

public function setEndComercial($endComercial) {
 $this->endComercial = $endComercial;
 return $this;
}
public function getTelComercial() {
 return $this->telComercial;
}

public function setTelComercial($telComercial) {
 $this->telComercial = $telComercial;
 return $this;
}
public function getAtividade() {
 return $this->atividade;
}

public function setAtividade($atividade) {
 $this->atividade = $atividade;
 return $this;
}
public function getTmpServico() {
 return $this->tmpServico;
}

public function setTmpServico($tmpServico) {
 $this->tmpServico = $tmpServico;
 return $this;
}
public function getVlrRenda() {
 return $this->vlrRenda;
}

public function setVlrRenda($vlrRenda) {
 $this->vlrRenda = $vlrRenda;
 return $this;
}
public function getLn() {
 return $this->ln;
}

public function setLn($ln) {
 $this->ln = $ln;
 return $this;
}
public function getMotivoExclusao() {
 return $this->motivoExclusao;
}

public function setMotivoExclusao($motivoExclusao) {
 $this->motivoExclusao = $motivoExclusao;
 return $this;
}
public function getEnd() {
 return $this->end;
}

public function setEnd($end) {
 $this->end = $end;
 return $this;
}
public function getNp() {
 return $this->np;
}

public function setNp($np) {
 $this->np = $np;
 return $this;
}
public function getCep() {
 return $this->cep;
}

public function setCep($cep) {
 $this->cep = $cep;
 return $this;
}
public function getDistrito() {
 return $this->distrito;
}

public function setDistrito($distrito) {
 $this->distrito = $distrito;
 return $this;
}
public function getBairro() {
 return $this->bairro;
}

public function setBairro($bairro) {
 $this->bairro = $bairro;
 return $this;
}
public function getLoteamento() {
 return $this->loteamento;
}

public function setLoteamento($loteamento) {
 $this->loteamento = $loteamento;
 return $this;
}
public function getComplemento2() {
 return $this->complemento2;
}

public function setComplemento2($complemento2) {
 $this->complemento2 = $complemento2;
 return $this;
}
public function getReferencia() {
 return $this->referencia;
}

public function setReferencia($referencia) {
 $this->referencia = $referencia;
 return $this;
}
public function getNaturalidade() {
 return $this->naturalidade;
}

public function setNaturalidade($naturalidade) {
 $this->naturalidade = $naturalidade;
 return $this;
}
public function getUf() {
 return $this->uf;
}

public function setUf($uf) {
 $this->uf = $uf;
 return $this;
}
public function getPais() {
 return $this->pais;
}

public function setPais($pais) {
 $this->pais = $pais;
 return $this;
}
public function getNmEntrevistador() {
 return $this->nmEntrevistador;
}

public function setNmEntrevistador($nmEntrevistador) {
 $this->nmEntrevistador = $nmEntrevistador;
 return $this;
}
public function getDtEntrevista1() {
 return $this->dtEntrevista1;
}

public function setDtEntrevista1($dtEntrevista1) {
 $this->dtEntrevista1 = $dtEntrevista1;
 return $this;
}
public function getFonePrincipal() {
 return $this->fonePrincipal;
}

public function setFonePrincipal($fonePrincipal) {
 $this->fonePrincipal = $fonePrincipal;
 return $this;
}
public function getFone() {
 return $this->fone;
}

public function setFone($fone) {
 $this->fone = $fone;
 return $this;
}
public function getCel() {
 return $this->cel;
}

public function setCel($cel) {
 $this->cel = $cel;
 return $this;
}
public function getEmail() {
 return $this->email;
}

public function setEmail($email) {
 $this->email = $email;
 return $this;
}
public function getFilhos() {
 return $this->filhos;
}

public function setFilhos($filhos) {
 $this->filhos = $filhos;
 return $this;
}
public function getQuantFilhos() {
 return $this->quantFilhos;
}

public function setQuantFilhos($quantFilhos) {
 $this->quantFilhos = $quantFilhos;
 return $this;
}
public function getPai() {
 return $this->pai;
}

public function setPai($pai) {
 $this->pai = $pai;
 return $this;
}
public function getMae() {
 return $this->mae;
}

public function setMae($mae) {
 $this->mae = $mae;
 return $this;
}
}