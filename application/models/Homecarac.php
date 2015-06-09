<?php

class Models_Homecarac extends Library_Model {

  protected $_table = 'homecarac';
  protected $_model = 'Models_Homecarac';

  public function getColumns(){
    return [
    'sitPropriedade',
    'titularidade',
    'vlrAluguel',
    'tmpMoradia',
    'nrQuartos',
    'nrComodos',
    'tpConstruc',
    'conserv',
    'luz',
    'agua',
    'esgoto',
    'lixo',
    'pav',
    'reciclavel',
    'tpEnergia',
    'tpAbastec',
    'TpEscoa',
    'holderdata_id',
    'tmpResidAtualOld',
    'TemResOLD',
    'outroMaterial'
    ];
  }

  protected function _insert($obj) {
    $_table = $this->getTable();
    $db = $this->getDb();

    $titularidade = (!empty ($obj->titularidade)) ? $obj->titularidade : 0;
    $obj->vlrAluguel = str_replace(',', '.', $obj->vlrAluguel);
    $vlrAluguel = (!empty ($obj->vlrAluguel)) ? $obj->vlrAluguel : '0.00';

    $handler = $db->prepare("INSERT INTO " . $_table . " 
      (`sitPropriedade`,
        `titularidade`,
        `vlrAluguel`,
        `tmpMoradia`,
        `nrQuartos`,
        `nrComodos`,
        `tpConstruc`,
        `conserv`,
        `luz`,
        `agua`,
        `esgoto`,
        `lixo`,
        `pav`,
        `reciclavel`,
        `tpEnergia`,
        `tpAbastec`,
        `TpEscoa`,
        `holderdata_id`,
        `tmpResidAtualOld`,
        `TemResOLD`,
        `outroMaterial`)
    VALUES
    ('" . $obj->sitPropriedade . "',
      '" . $titularidade . "',
      '" . $vlrAluguel . "',
      '" . $obj->tmpMoradia . "',
      '" . $obj->nrQuartos . "',
      '" . $obj->nrComodos . "',
      '" . $obj->tpConstruc . "',
      '" . $obj->conserv . "',
      '" . $obj->luz . "',
      '" . $obj->agua . "',
      '" . $obj->esgoto . "',
      '" . $obj->lixo . "',
      '" . $obj->pav . "',
      '" . $obj->reciclavel . "',
      '" . $obj->tpEnergia . "',
      '" . $obj->tpAbastec . "',
      '" . $obj->TpEscoa . "',
      '" . $obj->holderdata_id . "',
      '" . $obj->tmpResidAtualOld . "',
      '" . $obj->TemResOLD . "',
      '" . $obj->outroMaterial . "')");

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

public function getSitPropriedade() {
  return $this->sitPropriedade;
}

public function setSitPropriedade($sitPropriedade) {
  $this->sitPropriedade = $sitPropriedade;
  return $this;
}
public function getTitularidade() {
  return $this->titularidade;
}

public function setTitularidade($titularidade) {
  $this->titularidade = $titularidade;
  return $this;
}
public function getVlrAluguel() {
  return $this->vlrAluguel;
}

public function setVlrAluguel($vlrAluguel) {
  $this->vlrAluguel = $vlrAluguel;
  return $this;
}
public function getTmpMoradia() {
  return $this->tmpMoradia;
}

public function setTmpMoradia($tmpMoradia) {
  $this->tmpMoradia = $tmpMoradia;
  return $this;
}
public function getNrQuartos() {
  return $this->nrQuartos;
}

public function setNrQuartos($nrQuartos) {
  $this->nrQuartos = $nrQuartos;
  return $this;
}
public function getNrComodos() {
  return $this->nrComodos;
}

public function setNrComodos($nrComodos) {
  $this->nrComodos = $nrComodos;
  return $this;
}
public function getTpConstruc() {
  return $this->tpConstruc;
}

public function setTpConstruc($tpConstruc) {
  $this->tpConstruc = $tpConstruc;
  return $this;
}
public function getConserv() {
  return $this->conserv;
}

public function setConserv($conserv) {
  $this->conserv = $conserv;
  return $this;
}
public function getLuz() {
  return $this->luz;
}

public function setLuz($luz) {
  $this->luz = $luz;
  return $this;
}
public function getAgua() {
  return $this->agua;
}

public function setAgua($agua) {
  $this->agua = $agua;
  return $this;
}
public function getEsgoto() {
  return $this->esgoto;
}

public function setEsgoto($esgoto) {
  $this->esgoto = $esgoto;
  return $this;
}
public function getLixo() {
  return $this->lixo;
}

public function setLixo($lixo) {
  $this->lixo = $lixo;
  return $this;
}
public function getPav() {
  return $this->pav;
}

public function setPav($pav) {
  $this->pav = $pav;
  return $this;
}
public function getReciclavel() {
  return $this->reciclavel;
}

public function setReciclavel($reciclavel) {
  $this->reciclavel = $reciclavel;
  return $this;
}
public function getTpEnergia() {
  return $this->tpEnergia;
}

public function setTpEnergia($tpEnergia) {
  $this->tpEnergia = $tpEnergia;
  return $this;
}
public function getTpAbastec() {
  return $this->tpAbastec;
}

public function setTpAbastec($tpAbastec) {
  $this->tpAbastec = $tpAbastec;
  return $this;
}
public function getTpEscoa() {
  return $this->TpEscoa;
}

public function setTpEscoa($TpEscoa) {
  $this->TpEscoa = $TpEscoa;
  return $this;
}
public function getHolderdata_id() {
  return $this->holderdata_id;
}

public function setHolderdata_id($holderdata_id) {
  $this->holderdata_id = $holderdata_id;
  return $this;
}
public function getTmpResidAtualOld() {
  return $this->tmpResidAtualOld;
}

public function setTmpResidAtualOld($tmpResidAtualOld) {
  $this->tmpResidAtualOld = $tmpResidAtualOld;
  return $this;
}
public function getTemResOLD() {
  return $this->TemResOLD;
}

public function setTemResOLD($TemResOLD) {
  $this->TemResOLD = $TemResOLD;
  return $this;
}
public function getOutroMaterial() {
  return $this->outroMaterial;
}

public function setOutroMaterial($outroMaterial) {
  $this->outroMaterial = $outroMaterial;
  return $this;
}
}