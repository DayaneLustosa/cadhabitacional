<?php

class Models_Principaldata extends Library_Model {

  protected $_table = 'principaldata';
  protected $_model = 'Models_Principaldata';

  public function getColumns(){
    return [
    'dtCadastro1',
    'inativo',
    'dtAtualiza',
    'urgenteEspecial',
    'infoUrgencia',
    'preSelecionado',
    'obsAdicionais',
    'visitado',
    'dataVisita',
    'nrControlePreSel',
    'atendido',
    'solicitaAssist',
    'dtSolicitaAssist',
    'obsAssistente',
    'nmAssistente',
    'holderdata_id',
    'nmCadastrador',
    'motivoInativo',
    'timeUltimaAtualizacao',
    'ipModem',
    'ipMicro',
    'dataAtual',
    'dtAtendAssist'
    ];
  }

  protected function _insert($obj) {
    $_table = $this->getTable();
    $db = $this->getDb();
    $inativo = (!empty ($obj->inativo)) ? $obj->inativo : 0;
    $urgenteEspecial = (!empty ($obj->urgenteEspecial)) ? $obj->urgenteEspecial : 0;
    $preSelecionado = (!empty ($obj->preSelecionado)) ? $obj->preSelecionado : 0;
    $visitado = (!empty ($obj->visitado)) ? $obj->visitado : 0;
    $dataVisita =  (!empty ($obj->dataVisita)) ? $obj->dataVisita : '0000';
    $atendido = (!empty ($obj->atendido)) ? $obj->atendido : 0;
    $solicitaAssist = (!empty ($obj->solicitaAssist)) ? $obj->solicitaAssist : 0;
    $dtSolicitaAssist = (!empty ($obj->dtSolicitaAssist)) ? $obj->dtSolicitaAssist : '0000-00-00';
    $timeUltimaAtualizacao = (!empty ($obj->timeUltimaAtualizacao)) ? $obj->timeUltimaAtualizacao : '00:00:00';
    $dtAtendAssist = (!empty ($obj->dtAtendAssist)) ? $obj->dtAtendAssist : '0000-00-00';

    $handler = $db->prepare("INSERT INTO " . $_table . " 
      (`dtCadastro1`,
        `inativo`,
        `dtAtualiza`,
        `urgenteEspecial`,
        `infoUrgencia`,
        `preSelecionado`,
        `obsAdicionais`,
        `visitado`,
        `dataVisita`,
        `nrControlePreSel`,
        `atendido`,
        `solicitaAssist`,
        `dtSolicitaAssist`,
        `obsAssistente`,
        `nmAssistente`,
        `holderdata_id`,
        `nmCadastrador`,
        `motivoInativo`,
        `timeUltimaAtualizacao`,
        `ipModem`,
        `ipMicro`,
        `dataAtual`,
        `dtAtendAssist`)
    VALUES
    (NOW(),
      '" . $inativo . "',
      '0000-00-00',
      '" . $urgenteEspecial . "',
      '" . $obj->infoUrgencia . "',
      '" . $preSelecionado . "',
      '" . $obj->obsAdicionais . "',
      '" . $visitado . "',
      '" . $dataVisita . "',
      '" . $obj->nrControlePreSel . "',
      '" . $atendido . "',
      '" . $solicitaAssist . "',
      '" . $dtSolicitaAssist . "',
      '" . $obj->obsAssistente . "',
      '" . $obj->nmAssistente . "',
      '" . $obj->holderdata_id . "',
      '" . $obj->nmCadastrador . "',
      '" . $obj->motivoInativo . "',
      '" . $timeUltimaAtualizacao . "',
      '" . $obj->ipModem . "',
      '" . $obj->ipMicro . "',
      NOW(),
      '" . $dtAtendAssist . "')");


$handler->execute();
$err = $handler->errorInfo();
print_r($err);
if ($err[1] == "") {
  return true;
} else {
  return $err[1];
}
}

protected function _update($obj) {

}

public function getDtCadastro1() {
  return $this->dtCadastro1;
}

public function setDtCadastro1($dtCadastro1) {
  $this->dtCadastro1 = $dtCadastro1;
  return $this;
}
public function getInativo() {
  return $this->inativo;
}

public function setInativo($inativo) {
  $this->inativo = $inativo;
  return $this;
}
public function getDtAtualiza() {
  return $this->dtAtualiza;
}

public function setDtAtualiza($dtAtualiza) {
  $this->dtAtualiza = $dtAtualiza;
  return $this;
}
public function getUrgenteEspecial() {
  return $this->urgenteEspecial;
}

public function setUrgenteEspecial($urgenteEspecial) {
  $this->urgenteEspecial = $urgenteEspecial;
  return $this;
}
public function getInfoUrgencia() {
  return $this->infoUrgencia;
}

public function setInfoUrgencia($infoUrgencia) {
  $this->infoUrgencia = $infoUrgencia;
  return $this;
}
public function getPreSelecionado() {
  return $this->preSelecionado;
}

public function setPreSelecionado($preSelecionado) {
  $this->preSelecionado = $preSelecionado;
  return $this;
}
public function getObsAdicionais() {
  return $this->obsAdicionais;
}

public function setObsAdicionais($obsAdicionais) {
  $this->obsAdicionais = $obsAdicionais;
  return $this;
}
public function getVisitado() {
  return $this->visitado;
}

public function setVisitado($visitado) {
  $this->visitado = $visitado;
  return $this;
}
public function getDataVisita() {
  return $this->dataVisita;
}

public function setDataVisita($dataVisita) {
  $this->dataVisita = $dataVisita;
  return $this;
}
public function getNrControlePreSel() {
  return $this->nrControlePreSel;
}

public function setNrControlePreSel($nrControlePreSel) {
  $this->nrControlePreSel = $nrControlePreSel;
  return $this;
}
public function getAtendido() {
  return $this->atendido;
}

public function setAtendido($atendido) {
  $this->atendido = $atendido;
  return $this;
}
public function getSolicitaAssist() {
  return $this->solicitaAssist;
}

public function setSolicitaAssist($solicitaAssist) {
  $this->solicitaAssist = $solicitaAssist;
  return $this;
}
public function getDtSolicitaAssist() {
  return $this->dtSolicitaAssist;
}

public function setDtSolicitaAssist($dtSolicitaAssist) {
  $this->dtSolicitaAssist = $dtSolicitaAssist;
  return $this;
}
public function getObsAssistente() {
  return $this->obsAssistente;
}

public function setObsAssistente($obsAssistente) {
  $this->obsAssistente = $obsAssistente;
  return $this;
}
public function getNmAssistente() {
  return $this->nmAssistente;
}

public function setNmAssistente($nmAssistente) {
  $this->nmAssistente = $nmAssistente;
  return $this;
}
public function getHolderdata_id() {
  return $this->holderdata_id;
}

public function setHolderdata_id($holderdata_id) {
  $this->holderdata_id = $holderdata_id;
  return $this;
}
public function getNmCadastrador() {
  return $this->nmCadastrador;
}

public function setNmCadastrador($nmCadastrador) {
  $this->nmCadastrador = $nmCadastrador;
  return $this;
}
public function getMotivoInativo() {
  return $this->motivoInativo;
}

public function setMotivoInativo($motivoInativo) {
  $this->motivoInativo = $motivoInativo;
  return $this;
}
public function getTimeUltimaAtualizacao() {
  return $this->timeUltimaAtualizacao;
}

public function setTimeUltimaAtualizacao($timeUltimaAtualizacao) {
  $this->timeUltimaAtualizacao = $timeUltimaAtualizacao;
  return $this;
}
public function getIpModem() {
  return $this->ipModem;
}

public function setIpModem($ipModem) {
  $this->ipModem = $ipModem;
  return $this;
}
public function getIpMicro() {
  return $this->ipMicro;
}

public function setIpMicro($ipMicro) {
  $this->ipMicro = $ipMicro;
  return $this;
}
public function getDataAtual() {
  return $this->dataAtual;
}

public function setDataAtual($dataAtual) {
  $this->dataAtual = $dataAtual;
  return $this;
}
public function getDtAtendAssist() {
  return $this->dtAtendAssist;
}

public function setDtAtendAssist($dtAtendAssist) {
  $this->dtAtendAssist = $dtAtendAssist;
  return $this;
}
}