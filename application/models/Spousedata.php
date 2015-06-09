<?php

class Models_Spousedata extends Library_Model {

  protected $_table = 'spousedata';
  protected $_model = 'Models_Spousedata';

  public function getColumns(){
    return [
    'spouseName',
    'spouseDtNasc',
    'spouseSexo',
    'spouseRg',
    'spouseOrgaoEmissor',
    'spouseUfRg',
    'spouseCpf',
    'spouseProfissao',
    'empregador',
    'tmpServico',
    'spouseSalario',
    'spouseSituacaoRenda',
    'spouseFormEscolar',
    'spouseComplemento',
    'spouseEstudando',
    'spouseUfNatural',
    'pais',
    'naturalidade',
    'holderdata_id',
    'tmpServicoOld',
    'inativo',
    'sitConjugal1'
    ];
  }

  protected function _insert($obj) {
    $_table = $this->getTable();
    $db = $this->getDb();

    $spouseDtNasc = (!empty ($obj->spouseDtNasc)) ? $obj->spouseDtNasc : '0000-00-00';
    $obj->spouseSalario = str_replace(',', '.', $obj->spouseSalario);
    $spouseSalario = (!empty ($obj->spouseSalario)) ? $obj->spouseSalario : '0.00';
    $spouseComplemento = (!empty ($obj->spouseComplemento)) ? $obj->spouseComplemento : 0;
    $spouseEstudando = (!empty ($obj->spouseEstudando)) ? $obj->spouseEstudando : 0;

    $handler = $db->prepare("INSERT INTO " . $_table . " 
      (`spouseName`,
        `spouseDtNasc`,
        `spouseSexo`,
        `spouseRg`,
        `spouseOrgaoEmissor`,
        `spouseUfRg`,
        `spouseCpf`,
        `spouseProfissao`,
        `empregador`,
        `tmpServico`,
        `spouseSalario`,
        `spouseSituacaoRenda`,
        `spouseFormEscolar`,
        `spouseComplemento`,
        `spouseEstudando`,
        `spouseUfNatural`,
        `pais`,
        `naturalidade`,
        `holderdata_id`,
        `tmpServicoOld`,
        `inativo`,
        `sitConjugal1`)
    VALUES
    ('" . $obj->spouseName . "',
      '" . $spouseDtNasc . "',
      '" . $obj->spouseSexo . "',
      '" . $obj->spouseRg . "',
      '" . $obj->spouseOrgaoEmissor . "',
      '" . $obj->spouseUfRg . "',
      '" . $obj->spouseCpf . "',
      '" . $obj->spouseProfissao . "',
      '" . $obj->empregador . "',
      '" . $obj->tmpServico . "',
      '" . $spouseSalario . "',
      '" . $obj->spouseSituacaoRenda . "',
      '" . $obj->spouseFormEscolar . "',
      '" . $spouseComplemento . "',
      '" . $spouseEstudando . "',
      '" . $obj->spouseUfNatural . "',
      '" . $obj->pais . "',
      '" . $obj->naturalidade . "',
      '" . $obj->holderdata_id . "',
      '" . $obj->tmpServicoOld . "',
      '" . $obj->inativo . "',
      '" . $obj->sitConjugal1 . "')");

$handler->execute();
$err = $handler->errorInfo();
if ($err[1] == "") {
  return true;
} else {
  return $err[1];
}
}

protected function _update($obj) {

}

public function getSpouseName() {
  return $this->spouseName;
}

public function setSpouseName($spouseName) {
  $this->spouseName = $spouseName;
  return $this;
}
public function getSpouseDtNasc() {
  return $this->spouseDtNasc;
}

public function setSpouseDtNasc($spouseDtNasc) {
  $this->spouseDtNasc = $spouseDtNasc;
  return $this;
}
public function getSpouseSexo() {
  return $this->spouseSexo;
}

public function setSpouseSexo($spouseSexo) {
  $this->spouseSexo = $spouseSexo;
  return $this;
}
public function getSpouseRg() {
  return $this->spouseRg;
}

public function setSpouseRg($spouseRg) {
  $this->spouseRg = $spouseRg;
  return $this;
}
public function getSpouseOrgaoEmissor() {
  return $this->spouseOrgaoEmissor;
}

public function setSpouseOrgaoEmissor($spouseOrgaoEmissor) {
  $this->spouseOrgaoEmissor = $spouseOrgaoEmissor;
  return $this;
}
public function getSpouseUfRg() {
  return $this->spouseUfRg;
}

public function setSpouseUfRg($spouseUfRg) {
  $this->spouseUfRg = $spouseUfRg;
  return $this;
}
public function getSpouseCpf() {
  return $this->spouseCpf;
}

public function setSpouseCpf($spouseCpf) {
  $this->spouseCpf = $spouseCpf;
  return $this;
}
public function getSpouseProfissao() {
  return $this->spouseProfissao;
}

public function setSpouseProfissao($spouseProfissao) {
  $this->spouseProfissao = $spouseProfissao;
  return $this;
}
public function getEmpregador() {
  return $this->empregador;
}

public function setEmpregador($empregador) {
  $this->empregador = $empregador;
  return $this;
}
public function getTmpServico() {
  return $this->tmpServico;
}

public function setTmpServico($tmpServico) {
  $this->tmpServico = $tmpServico;
  return $this;
}
public function getSpouseSalario() {
  return $this->spouseSalario;
}

public function setSpouseSalario($spouseSalario) {
  $this->spouseSalario = $spouseSalario;
  return $this;
}
public function getSpouseSituacaoRenda() {
  return $this->spouseSituacaoRenda;
}

public function setSpouseSituacaoRenda($spouseSituacaoRenda) {
  $this->spouseSituacaoRenda = $spouseSituacaoRenda;
  return $this;
}
public function getSpouseFormEscolar() {
  return $this->spouseFormEscolar;
}

public function setSpouseFormEscolar($spouseFormEscolar) {
  $this->spouseFormEscolar = $spouseFormEscolar;
  return $this;
}
public function getSpouseComplemento() {
  return $this->spouseComplemento;
}

public function setSpouseComplemento($spouseComplemento) {
  $this->spouseComplemento = $spouseComplemento;
  return $this;
}
public function getSpouseEstudando() {
  return $this->spouseEstudando;
}

public function setSpouseEstudando($spouseEstudando) {
  $this->spouseEstudando = $spouseEstudando;
  return $this;
}
public function getSpouseUfNatural() {
  return $this->spouseUfNatural;
}

public function setSpouseUfNatural($spouseUfNatural) {
  $this->spouseUfNatural = $spouseUfNatural;
  return $this;
}
public function getPais() {
  return $this->pais;
}

public function setPais($pais) {
  $this->pais = $pais;
  return $this;
}
public function getNaturalidade() {
  return $this->naturalidade;
}

public function setNaturalidade($naturalidade) {
  $this->naturalidade = $naturalidade;
  return $this;
}
public function getHolderdata_id() {
  return $this->holderdata_id;
}

public function setHolderdata_id($holderdata_id) {
  $this->holderdata_id = $holderdata_id;
  return $this;
}
public function getTmpServicoOld() {
  return $this->tmpServicoOld;
}

public function setTmpServicoOld($tmpServicoOld) {
  $this->tmpServicoOld = $tmpServicoOld;
  return $this;
}
public function getInativo() {
  return $this->inativo;
}

public function setInativo($inativo) {
  $this->inativo = $inativo;
  return $this;
}
public function getSitConjugal1() {
  return $this->sitConjugal1;
}

public function setSitConjugal1($sitConjugal1) {
  $this->sitConjugal1 = $sitConjugal1;
  return $this;
}
}