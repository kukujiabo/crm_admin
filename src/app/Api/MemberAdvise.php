<?php
namespace App\Api;

/**
 * 会员反馈
 *
 * @author Meroc Chen <398515393@qq.com>
 */
class MemberAdvise extends BaseApi {

  public function getRules() {
  
    return $this->rules([

      'listQuery' => [
    
        'member_name' => 'member_name|string|false||会员名称',
        'sex' => 'sex|int|false||会员性别',
        'fields' => 'fields|string|false||字段',
        'order' => 'order|string|false||会员排序',
        'page' => 'page|int|false||页码',
        'page_size' => 'page_size|int|false||每页条数'

      ]
    
    ]);
  
  }

  /**
   * 查询反馈列表
   * @desc 查询反馈列表
   *
   * @return array list
   */
  public function listQuery() {
  
    return $this->dm->listQuery($this->retriveRuleParams(__FUNCTION__));
  
  }

}
