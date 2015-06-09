<?php
class Library_Connection extends PDO {

  protected $_db;
  protected $dsn = 'mysql:dbname=bdsiscad;host=localhost';
  protected $username = 'root';
  protected $password = '';

  public function __construct() {
    try {
      $this->_db = new PDO($this->dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {
      new Library_Error($e);
    }
  }
}
?>