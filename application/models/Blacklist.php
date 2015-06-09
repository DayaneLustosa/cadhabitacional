<?php

class Models_Blacklist extends Library_Model {

  protected $_table = 'blacklist';
  protected $_model = 'Models_Blacklist';

  public function getColumns(){
    return [
    'dtInscLN',
    'name',
    'cpf',
    'rg',
    'spouseName',
    'spouseRg',
    'spouseCpf',
    'obsLN',
    'userLN',
    'holderdata_id'
    ];
  }

  protected function _insert($obj) {
    $_table = $this->getTable();
    $db = $this->getDb();

    $dtInscLN = (!empty ($obj->dtInscLN)) ? $obj->dtInscLN : '0000-00-00';

    $handler = $db->prepare("INSERT INTO " . $_table . " 
      (`dtInscLN`,
        `name`,
        `cpf`,
        `rg`,
        `spouseName`,
        `spouseRg`,
        `spouseCpf`,
        `obsLN`,
        `userLN`,
        `holderdata_id`)
    VALUES
    ('" . $dtInscLN . "',
      '" . $obj->name . "',
      '" . $obj->cpf . "',
      '" . $obj->rg . "',
      '" . $obj->spouseName . "',
      '" . $obj->spouseRg . "',
      '" . $obj->spouseCpf . "',
      '" . $obj->obsLN . "',
      '" . $obj->userLN . "',
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

  public function getDtInscLN() {
    return $this->dtInscLN;
  }
  public function setDtInscLN($dtInscLN) {
    $this->dtInscLN = $dtInscLN;
    return $this;
  }
  public function getName() {
    return $this->name;
  }
  public function setName($name) {
    $this->name = $name;
    return $this;
  }
  public function getCpf() {
    return $this->cpf;
  }
  public function setCpf($cpf) {
    $this->cpf = $cpf;
    return $this;
  }
  public function getRg() {
    return $this->rg;
  }
  public function setRg($rg) {
    $this->rg = $rg;
    return $this;
  }
  public function getSpouseName() {
    return $this->spouseName;
  }
  public function setSpouseName($spouseName) {
    $this->spouseName = $spouseName;
    return $this;
  }
  public function getSpouseRg() {
    return $this->spouseRg;
  }
  public function setSpouseRg($spouseRg) {
    $this->spouseRg = $spouseRg;
    return $this;
  }
  public function getSpouseCpf() {
    return $this->spouseCpf;
  }
  public function setSpouseCpf($spouseCpf) {
    $this->spouseCpf = $spouseCpf;
    return $this;
  }
  public function getObsLN() {
    return $this->obsLN;
  }
  public function setObsLN($obsLN) {
    $this->obsLN = $obsLN;
    return $this;
  }
  public function getUserLN() {
    return $this->userLN;
  }
  public function setUserLN($userLN) {
    $this->userLN = $userLN;
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