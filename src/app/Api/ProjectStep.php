<?php
namespace App\Api;

/**
 * 查询项目阶段日志
 */
class ProjectStep extends BaseApi {

  public function getRules() {
  
    return $this->rules([
    
      'getAll' => [
      
        'pid' => 'pid|int|false||项目id'
      
      ]
    
    ]); 
  
  }

  /**
   * 根据条件查询全部项目
   * @desc 根据条件查询全部项目
   *
   * @return array data
   */
  public function getAll() {
  
    return $this->dm->getAll($this->retriveRuleParams(__FUNCTION__));
  
  }

}
