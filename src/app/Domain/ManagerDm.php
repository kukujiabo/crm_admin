<?php
namespace App\Domain;

use App\Library\RedisClient;

class ManagerDm {

  protected $_admin; 

  public function __construct() {
        
    $requestHeader = getallheaders();
            
    $auth = RedisClient::get('admin_auth', $requestHeader['AX-TOKEN']);

    $this->_admin = $auth;

  }

  public function add($data) {

    $data['opid'] = $this->_admin->id;
  
    return \App\request('App.Manager.Add', $data);
  
  }

  public function getList($data) {
  
    $data['opid'] = $this->_admin->id;
  
    return \App\request('App.Manager.GetList', $data);

  }

  public function getDetail($data) {
  
    return \App\request('App.Manager.GetDetail', $data);
  
  }

  public function remove($data) {
  
    return \App\request('App.Manager.Remove', $data);
  
  }

  public function edit($data) {
  
    return \App\request('App.Manager.Edit', $data);
  
  }

}
