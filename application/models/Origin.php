<?php

class Models_Origin extends Library_Model {

  protected $_table = 'origin';
  protected $_model = 'Models_Origin';

  public function getColumns(){
    return [
    'origem',
    'qualOrig',
    'tmpResidMunicipio',
    'holderdata_id'
    ];
  }
  
  protected function _insert($obj) {
    $obj->tmpResidMunicipio = $this->concatCampoTempo($obj->tmpResidMunicipio);
    $_table = $this->getTable();
    $db = $this->getDb();
    $handler = $db->prepare("INSERT INTO " . $_table . " 
      (`origem`,
       `qualOrig`,
       `tmpResidMunicipio`,
       `holderdata_id`) 
    VALUES 
    ('" . $obj->origem . "',
     '" . $obj->qualOrig . "',
     '" . $obj->tmpResidMunicipio . "',
     '" . $obj->holderdata_id . "')");

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

  public function getOrigem() {
    return $this->origem;
  }

  public function setOrigem($origem) {
    $this->origem = $origem;
    return $this;
  }
  public function getQualOrig() {
    return $this->qualOrig;
  }

  public function setQualOrig($qualOrig) {
    $this->qualOrig = $qualOrig;
    return $this;
  }
  public function getTmpResidMunicipio() {
    return $this->tmpResidMunicipio;
  }

  public function setTmpResidMunicipio($tmpResidMunicipio) {
    $this->tmpResidMunicipio = $tmpResidMunicipio;
    return $this;
  }
  public function getHolderdata_id() {
    return $this->holderdata_id;
  }

  public function setHolderdata_id($holderdata_id) {
    $this->holderdata_id = $holderdata_id;
    return $this;
  }
}