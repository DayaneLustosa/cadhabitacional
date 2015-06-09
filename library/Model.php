<?php
abstract class Library_Model extends Library_Connection {

  protected $_table = null;
  protected $_model = null;

  public function getDb() {
    if (!$this->_db)
      throw new Library_Error('Não foi possível conectar com o banco de dados');
    return $this->_db;
  }

  public function getTable() {
    if (!$this->_table)
      throw new Library_Error('Tabela não definida');
    return $this->_table;
  }

  public function save($obj) {
    if (!isset($obj->id))
      return $this->_insert($obj);
    else
      return $this->_update($obj);
  }

  public function fetchAll($select = null) {
    $table = $this->getTable();
    $db = $this->getDb();
    if ( empty($select) )
      $select = "SELECT * FROM " . $table;
    $handler = $db->prepare($select);
    $handler->execute();
    $data = $handler->fetchAll(PDO::FETCH_ASSOC);
    $error = $db->errorInfo();
    if ( !empty($error[2]) )
      new Library_Error($error[2]);
    $dataObjArray = array();
    if ( !empty($data) ) {
      foreach ($data as $row)
        $dataObjArray[] = $row;
    }
    return $dataObjArray;
  }

  public function fetch($select = null) {
    $table = $this->getTable();
    $db = $this->getDb();
    if ( empty($select) )
      $select = "SELECT * FROM " . $table;
    $handler = $db->prepare($select);
    $handler->execute();
    $result = $handler->fetch(PDO::FETCH_ASSOC);
    $error = $db->errorInfo();
    if ( !empty($error[2]) )
      new Library_Error($error[2]);
    $dataObjArray = array();
    if ( !empty($data) ) {
      foreach ($data as $row)
        $dataObjArray[] = $row;
    }
    return $dataObjArray;
  }

  public function find($id) {
    $table = $this->getTable();
    $db = $this->getDb();
    $handler = $db->prepare("SELECT * FROM " . $table . " WHERE id=" . $id);
    $handler->execute();
    $result = $handler->fetch(PDO::FETCH_ASSOC);
    $error = $db->errorInfo();
    if ( !empty($error[2]) )
      new Library_Error($error[2]);
    if (0 == count($result))
      return false;
    if ( !empty($result) ) {
      return $this->_populate($result);
    } else {
      return false;
    }
  }

  public function delete($id) {
    $result = $this->getDbTable()->find((int) $id);
    if (0 == count($result))
      return false;
    $row = $result->current();
    return $row->delete();
  }

  public function populate($data) {
    $obj = new $this->_model;
    foreach ($data as $k => $v) {
      $method = 'set' . ucfirst($k);
      if (!method_exists($obj, $method)) {
        throw new Exception('Propriedade Inválida - ' . $method);
      }
      $obj->$method($v);
    }
    return $obj;
  }

  public function getLastInsertId(){
    $db = $this->getDb();
    return $db->lastInsertId();
  }

  public function concatCampoTempo($campo){
    if (is_array($campo)) {
      $keys = array_keys($campo);
      return $campo[$keys[0]] . "-" . $campo[$keys[1]];
    } else {
      return $campo;
    }
  }

  abstract protected function _insert($obj);

  abstract protected function _update($obj);

}
?>