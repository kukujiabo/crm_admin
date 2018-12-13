<?php
namespace App\Domain;

use App\Library\Http;
use App\Library\RedisClient;

class RewardDm {

  protected $_admin; 

  public function __construct() {
        
    $requestHeader = getallheaders();
            
    $auth = RedisClient::get('admin_auth', $requestHeader['AX-TOKEN']);

    $this->_admin = $auth;

  }

  /**
   * 新建文件
   */
  public function create($data) {
  
    $data['opid'] = $this->_admin->id;

    return \App\request('App.Reward.Create', $data);
  
  }

  /**
   * 更新赠品信息
   */
  public function edit($data) {
  
    $data['opid'] = $this->_admin->id;

    return \App\request('App.Reward.Edit', $data);
  
  }

  /**
   * 查询列表
   */
  public function listQuery($data) {
  
    return \App\request('App.Reward.ListQuery', $data);
  
  }

  /**
   * 查询详情
   */
  public function getDetail($data) {
  
    return \App\request('App.Reward.GetDetail', $data);
  
  }

  public function changeStep($data) {

    $data['opid'] = $this->_admin->id;
  
    return \App\request('App.Reward.ChangeStep', $data);
  
  }

}
