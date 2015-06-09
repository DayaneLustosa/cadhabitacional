<?php

class Models_Contemplated extends Library_Model {

  protected $_table = 'contemplated';
  protected $_model = 'Models_Contemplated';

  public function getColumns(){
    return [
    'controleCtu',
    'sqlCtu',
    'regulEmProcesso',
    'infoRegulEmProcesso',
    'COProt',
    'DtProt',
    'Loteam',
    'QuadraLoteam',
    'LoteLoteam',
    'Contrato',
    'NpPrecaria',
    'tpProgramaSocial',
    'tpImovelContemplado',
    'endContemplado',
    'npContemplado',
    'bloco',
    'npApto',
    'holderdata_id',
    'DtContemplated'
    ];
  }

  protected function _insert($obj) {
    $_table = $this->getTable();
    $db = $this->getDb();

    $regulEmProcesso = (!empty ($obj->regulEmProcesso)) ? $obj->regulEmProcesso : 0;
    $DtProt = (!empty ($obj->DtProt)) ? $obj->DtProt : '0000-00-00';
    $DtContemplated = (!empty ($obj->DtContemplated)) ? $obj->DtContemplated : '0000-00-00';

    $handler = $db->prepare("INSERT INTO " . $_table . " 
      (`controleCtu`,
        `sqlCtu`,
        `regulEmProcesso`,
        `infoRegulEmProcesso`,
        `COProt`,
        `DtProt`,
        `Loteam`,
        `QuadraLoteam`,
        `LoteLoteam`,
        `Contrato`,
        `NpPrecaria`,
        `tpProgramaSocial`,
        `tpImovelContemplado`,
        `endContemplado`,
        `npContemplado`,
        `bloco`,
        `npApto`,
        `holderdata_id`,
        `DtContemplated`)
    VALUES
    ('" . $obj->controleCtu . "',
      '" . $obj->sqlCtu . "',
      '" . $regulEmProcesso . "',
      '" . $obj->infoRegulEmProcesso . "',
      '" . $obj->COProt . "',
      '" . $DtProt . "',
      '" . $obj->Loteam . "',
      '" . $obj->QuadraLoteam . "',
      '" . $obj->LoteLoteam . "',
      '" . $obj->Contrato . "',
      '" . $obj->NpPrecaria . "',
      '" . $obj->tpProgramaSocial . "',
      '" . $obj->tpImovelContemplado . "',
      '" . $obj->endContemplado . "',
      '" . $obj->npContemplado . "',
      '" . $obj->bloco . "',
      '" . $obj->npApto . "',
      '" . $obj->holderdata_id . "',
      '" . $DtContemplated . "')");

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

public function getControleCtu() {
  return $this->controleCtu;
}

public function setControleCtu($controleCtu) {
  $this->controleCtu = $controleCtu;
  return $this;
}
public function getSqlCtu() {
  return $this->sqlCtu;
}

public function setSqlCtu($sqlCtu) {
  $this->sqlCtu = $sqlCtu;
  return $this;
}
public function getRegulEmProcesso() {
  return $this->regulEmProcesso;
}

public function setRegulEmProcesso($regulEmProcesso) {
  $this->regulEmProcesso = $regulEmProcesso;
  return $this;
}
public function getInfoRegulEmProcesso() {
  return $this->infoRegulEmProcesso;
}

public function setInfoRegulEmProcesso($infoRegulEmProcesso) {
  $this->infoRegulEmProcesso = $infoRegulEmProcesso;
  return $this;
}
public function getCOProt() {
  return $this->COProt;
}

public function setCOProt($COProt) {
  $this->COProt = $COProt;
  return $this;
}
public function getDtProt() {
  return $this->DtProt;
}

public function setDtProt($DtProt) {
  $this->DtProt = $DtProt;
  return $this;
}
public function getLoteam() {
  return $this->Loteam;
}

public function setLoteam($Loteam) {
  $this->Loteam = $Loteam;
  return $this;
}
public function getQuadraLoteam() {
  return $this->QuadraLoteam;
}

public function setQuadraLoteam($QuadraLoteam) {
  $this->QuadraLoteam = $QuadraLoteam;
  return $this;
}
public function getLoteLoteam() {
  return $this->LoteLoteam;
}

public function setLoteLoteam($LoteLoteam) {
  $this->LoteLoteam = $LoteLoteam;
  return $this;
}
public function getContrato() {
  return $this->Contrato;
}

public function setContrato($Contrato) {
  $this->Contrato = $Contrato;
  return $this;
}
public function getNpPrecaria() {
  return $this->NpPrecaria;
}

public function setNpPrecaria($NpPrecaria) {
  $this->NpPrecaria = $NpPrecaria;
  return $this;
}
public function getTpProgramaSocial() {
  return $this->tpProgramaSocial;
}

public function setTpProgramaSocial($tpProgramaSocial) {
  $this->tpProgramaSocial = $tpProgramaSocial;
  return $this;
}
public function getTpImovelContemplado() {
  return $this->tpImovelContemplado;
}

public function setTpImovelContemplado($tpImovelContemplado) {
  $this->tpImovelContemplado = $tpImovelContemplado;
  return $this;
}
public function getEndContemplado() {
  return $this->endContemplado;
}

public function setEndContemplado($endContemplado) {
  $this->endContemplado = $endContemplado;
  return $this;
}
public function getNpContemplado() {
  return $this->npContemplado;
}

public function setNpContemplado($npContemplado) {
  $this->npContemplado = $npContemplado;
  return $this;
}
public function getBloco() {
  return $this->bloco;
}

public function setBloco($bloco) {
  $this->bloco = $bloco;
  return $this;
}
public function getNpApto() {
  return $this->npApto;
}

public function setNpApto($npApto) {
  $this->npApto = $npApto;
  return $this;
}
public function getHolderdata_id() {
  return $this->holderdata_id;
}

public function setHolderdata_id($holderdata_id) {
  $this->holderdata_id = $holderdata_id;
  return $this;
}
public function getDtContemplated() {
  return $this->DtContemplated;
}

public function setDtContemplated($DtContemplated) {
  $this->DtContemplated = $DtContemplated;
  return $this;
}
}