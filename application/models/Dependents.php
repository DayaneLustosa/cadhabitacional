<?php

class Models_Dependents extends Library_Model {

  protected $_table = 'dependents';
  protected $_model = 'Models_Dependents';

  public function getColumns(){
    return [
    'name',
    'parentesco',
    'datanasc',
    'age',
    'escolaridade',
    'cpf',
    'renda',
    'status',
    'dependentesOld',
    'holderdata_id',
    'inativo'
    ];
  }

  protected function _insert($obj) {
    $_table = $this->getTable();
    $db = $this->getDb();
    $cpf = array('.', '-');
    $obj->cpf = str_replace($cpf, '', $obj->cpf);    
    $obj->age = str_replace(' anos', '', $obj->age);
    $obj->renda = (!empty($obj->renda)) ? $obj->renda : 0.00;
    $handler = $db->prepare("INSERT INTO " . $_table . " 
      (`name`,
        `parentesco`,
        `datanasc`,
        `age`,
        `escolaridade`,
        `cpf`,
        `renda`,
        `status`,
        `dependentesOld`,
        `holderdata_id`,
        `inativo`)
    VALUES
    ('" . $obj->name . "',
      '" . $obj->parentesco . "',
      '" . $obj->datanasc . "',
      '" . $obj->age . "',
      '" . $obj->escolaridade . "',
      '" . $obj->cpf . "',
      '" . $obj->renda . "',
      '" . $obj->status . "',
      '" . $obj->dependentesOld . "',
      '" . $obj->holderdata_id . "',
      '" . $obj->inativo . "')");

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

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
    return $this;
  }
  public function getParentesco() {
    return $this->parentesco;
  }

  public function setParentesco($parentesco) {
    $this->parentesco = $parentesco;
    return $this;
  }
  public function getDatanasc() {
    return $this->datanasc;
  }

  public function setDatanasc($datanasc) {
    $this->datanasc = $datanasc;
    return $this;
  }
  public function getAge() {
    return $this->age;
  }

  public function setAge($age) {
    $this->age = $age;
    return $this;
  }
  public function getEscolaridade() {
    return $this->escolaridade;
  }

  public function setEscolaridade($escolaridade) {
    $this->escolaridade = $escolaridade;
    return $this;
  }
  public function getCpf() {
    return $this->cpf;
  }

  public function setCpf($cpf) {
    $this->cpf = $cpf;
    return $this;
  }
  public function getRenda() {
    return $this->renda;
  }

  public function setRenda($renda) {
    $this->renda = $renda;
    return $this;
  }
  public function getStatus() {
    return $this->status;
  }

  public function setStatus($status) {
    $this->status = $status;
    return $this;
  }
  public function getDependentesOld() {
    return $this->dependentesOld;
  }

  public function setDependentesOld($dependentesOld) {
    $this->dependentesOld = $dependentesOld;
    return $this;
  }
  public function getHolderdata_id() {
    return $this->holderdata_id;
  }

  public function setHolderdata_id($holderdata_id) {
    $this->holderdata_id = $holderdata_id;
    return $this;
  }
  public function getInativo() {
    return $this->inativo;
  }

  public function setInativo($inativo) {
    $this->inativo = $inativo;
    return $this;
  }
}