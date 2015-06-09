<?php

class Models_Users extends Library_Model {

  protected $_table = 'users';
  protected $_model = 'Models_Users';

  public function getColumns(){
    return [
    'name',
    'email',
    'atribuicao',
    'cpf',
    'senha',
    'dtAtivacao'
    ];
  }

  protected function _insert($obj) {
    $table = $this->getTable();
    $db = $this->getDb();
    $handler = $db->prepare("INSERT INTO " . $table . " (
     `name`,
     `email`,
     `atribuicao`,
     `cpf`,
     `senha`,
     `dtAtivacao`
     ) VALUES (
     '" . $obj->name . "',
     '" . $obj->email . "',
     '" . $obj->atribuicao . "',
     '" . $obj->cpf . "',
     '" . sha1($obj->senha) . "',
     '" . $obj->dtAtivacao . "'
     )");
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

  public function verifyLogin($email, $senha){
    $table = $this->getTable();
    $db = $this->getDb();
    $handler = $db->prepare("SELECT * FROM " . $table . " WHERE email='" . $email . "' and senha='" . sha1($senha) . "'");
    $handler->execute();
    $result = $handler->fetch(PDO::FETCH_ASSOC);
    $error = $db->errorInfo();
    
    if ( !empty($error[2]) )
      new Library_Error($error[2]);
    if (0 == count($result))
      return false;
    if ( !empty($result) ) {
      return $result;
      //return $this->_populate($result);
    } else {
      return false;
    }
  }

  public function getId() {
    return $this->id;
  }
  public function setId($id) {
    $this->id = $id;
    return $this;
  }
  public function setName($name){
    $this->name = $name;
  }
  public function getName(){
    return $this->name;
  }
  public function setEmail($email){
    $this->email = $email;
  }
  public function getEmail(){
    return $this->email;
  }
  public function setAtribuicao($atribuicao){
    $this->atribuicao = $atribuicao;
  }
  public function getAtribuicao(){
    return $this->atribuicao;
  }
  public function setCpf($cpf){
    $this->cpf = $cpf;
  }
  public function getCpf(){
    return $this->cpf;
  }
  public function setDtAtivacao($dtAtivacao){
    $this->dtAtivacao = $dtAtivacao;
  }
  public function getDtAtivacao(){
    return $this->dtAtivacao;
  }
  public function setSenha($senha){
    $this->senha = $senha;
  }
  public function getSenha(){
    return $this->senha;
  }
  public function setVerificaSenha($verificasenha){
    $this->verificasenha = $verificasenha;
  }
  public function getVerificaSenha(){
    return $this->verificasenha;
  }

}