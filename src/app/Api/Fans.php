<?php
namespace App\Api;

/**
 * 店铺粉丝接口
 *
 */
class Fans extends BaseApi {

  public function getRules() {
  
    return $this->rules([
    
      'listQuery' => [
      
        'shop_id' => 'shop_id|int|false||店铺id',

        'member_id' => 'member_id|int|false||用户id',
        
        'focus' => 'focus|int|false|1|关注状态',

        'page' => 'page|int|false|1|20',

        'page_size' => 'page_size|int|false||每页条数'
      
      ]
    
    ]);
  
  }

  /**
   * 粉丝列表接口
   *
   *
   */
  public function listQuery() {
  
    return $this->dm->listQuery($this->retriveRuleParams(__FUNCTION__));  
  
  }

}
