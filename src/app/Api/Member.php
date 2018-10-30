<?php
namespace App\Api;

/**
 * 会员接口
 *
 * @author Meroc Chen <398515393@qq.com> 2018-06-06
 */
class Member extends BaseApi {

  public function getRules() {
  
    return $this->rules([
    
      'listQuery' => [
      
        'member_name' => 'member_name|string|false||会员名称',
        'sex' => 'sex|int|false||会员性别',
        'order' => 'order|string|false||排序',
        'page' => 'page|int|false||页码',
        'page_size' => 'member_name|string|false||每页条数'
      
      ],

      'countMemberData' => [
      
      
      ]
    
    ]);
  
  }

  /**
   * 查询会员列表
   * @desc 查询会员列表
   *
   * @return array list
   */
  public function listQuery() {
  
    return $this->dm->listQuery($this->retriveRuleParams(__FUNCTION__));

  }

  /**
   * 查询会员数据
   * @desc 查询会员数据
   *
   * @return array list
   */
  public function countMemberData() {
  
    return $this->dm->countMemberData($this->retriveRuleParams(__FUNCTION__)); 
  
  }

}
