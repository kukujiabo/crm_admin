<?php
namespace App\Api;

/**
 * 会员赠品接口
 * @desc 会员赠品接口
 *
 * @author Meroc Chen <398515393@qq.com>
 */
class MemberReward extends BaseApi {

  public function getRules() {
  
    return $this->rules([
    
      'getList' => [
      
        'shop_id' => 'shop_id|int|false||店铺id',
        'member_name' => 'member_name|string|false||会员名称',
        'reward_name' => 'reward_name|string|false||赠品名称',
        'checked' => 'checked|int|false||核销状态',
        'reference' => 'reference|int|false||赠品来源',
        'type' => 'type|int|false||赠品类型',
        'fields' => 'fields|string|false||字段',
        'order' => 'order|string|false|created_at desc|排序',
        'page' => 'page|int|false||页码',
        'page_size' => 'page_size|int|false||每页条数'
      
      ]
    
    ]);
  
  }

  /**
   * 查询会员赠品列表
   * @desc 查询会员赠品列表
   *
   * @return array list
   */
  public function getList() {
  
    return $this->dm->getList($this->retriveRuleParams(__FUNCTION__));
  
  }

}
