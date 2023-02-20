<?php

class UniVar{
    protected $_univar;
    public function __construct($univar){
        $this->_univar = $univar;
    }

    public function getUniVar(){
        return $this->_univar;
    }
    public function __destruct(){ }
}

class LoadProtectVar
{
  protected $_dbaccess;
  protected $_firstname;
  protected $_lastname;
  protected $_position;
  protected $_email;
  protected $_password1;
  protected $_password2;
  protected $_phone;
  protected $_result;

  public function __construct() {}

  public function getDbAccess() {
    return $this->_dbaccess;
  }
  public function getFirst_name() {
    return $this->_firstname;
  }
  public function getLast_name() {
    return $this->_lastname;
  }
  public function getEmail() {
    return $this->_email;
  }
  public function getPassword1() {
    return $this->_password1;
  }
  public function getPassword2() {
    return $this->_password2;
  }
  public function getPhone() {
    return $this->_phone;
  }
  public function getResult() {
    return $this->_result;
  }
  
  public function __destruct() {}
}

?>