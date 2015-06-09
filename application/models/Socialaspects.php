<?php

class Models_Socialaspects extends Library_Model {

  protected $_table = 'socialaspects';
  protected $_model = 'Models_Socialaspects';

  public function getColumns(){
    return [
    'necEspec',
    'deficiencia',
    'adaptImovel',
    'tpAdapt',
    'cadUnico',
    'projSocial',
    'vlrProj',
    'nrNis',
    'holderdata_id',
    'outroTpAdapt',
    'outroProj'
    ];
  }

  protected function _insert($obj) {
    $_table = $this->getTable();
    $db = $this->getDb();

    $necEspec = (!empty ($obj->necEspec)) ? $obj->necEspec : 0;
    $adaptImovel = (!empty ($obj->adaptImovel)) ? $obj->adaptImovel : 0;
    $cadUnico = (!empty ($obj->cadUnico)) ? $obj->cadUnico : 0;
    $obj->vlrProj = str_replace(',', '.', $obj->vlrProj);
    $vlrProj = (!empty ($obj->vlrProj)) ? $obj->vlrProj : '0.00';

    $handler = $db->prepare("INSERT INTO " . $_table . " 
      (`necEspec`,
        `deficiencia`,
        `adaptImovel`,
        `tpAdapt`,
        `cadUnico`,
        `projSocial`,
        `vlrProj`,
        `nrNis`,
        `holderdata_id`,
        `outroTpAdapt`,
        `outroProj`)
    VALUES 
    ('" . $necEspec . "',
      '" . $obj->deficiencia . "',
      '" . $adaptImovel . "',
      '" . $obj->tpAdapt . "',
      '" . $cadUnico . "',
      '" . $obj->projSocial . "',
      '" . $vlrProj . "',
      '" . $obj->nrNis . "',
      '" . $obj->holderdata_id . "',
      '" . $obj->outroTpAdapt . "',
      '" . $obj->outroProj . "')");

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

  public function getNecEspec() {
    return $this->necEspec;
  }

  public function setNecEspec($necEspec) {
    $this->necEspec = $necEspec;
    return $this;
  }
  public function getDeficiencia() {
    return $this->deficiencia;
  }

  public function setDeficiencia($deficiencia) {
    $this->deficiencia = $deficiencia;
    return $this;
  }
  public function getAdaptImovel() {
    return $this->adaptImovel;
  }

  public function setAdaptImovel($adaptImovel) {
    $this->adaptImovel = $adaptImovel;
    return $this;
  }
  public function getTpAdapt() {
    return $this->tpAdapt;
  }

  public function setTpAdapt($tpAdapt) {
    $this->tpAdapt = $tpAdapt;
    return $this;
  }
  public function getCadUnico() {
    return $this->cadUnico;
  }

  public function setCadUnico($cadUnico) {
    $this->cadUnico = $cadUnico;
    return $this;
  }
  public function getProjSocial() {
    return $this->projSocial;
  }

  public function setProjSocial($projSocial) {
    $this->projSocial = $projSocial;
    return $this;
  }
  public function getVlrProj() {
    return $this->vlrProj;
  }

  public function setVlrProj($vlrProj) {
    $this->vlrProj = $vlrProj;
    return $this;
  }
  public function getNrNis() {
    return $this->nrNis;
  }

  public function setNrNis($nrNis) {
    $this->nrNis = $nrNis;
    return $this;
  }
  public function getHolderdata_id() {
    return $this->holderdata_id;
  }

  public function setHolderdata_id($holderdata_id) {
    $this->holderdata_id = $holderdata_id;
    return $this;
  }
  public function getOutroTpAdapt() {
    return $this->outroTpAdapt;
  }

  public function setOutroTpAdapt($outroTpAdapt) {
    $this->outroTpAdapt = $outroTpAdapt;
    return $this;
  }
  public function getOutroProj() {
    return $this->outroProj;
  }

  public function setOutroProj($outroProj) {
    $this->outroProj = $outroProj;
    return $this;
  }
}