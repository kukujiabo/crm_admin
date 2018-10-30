<?php
namespace App\Api;

/**
 * 分享动作接口
 *
 * @author Meroc Chen <398515393@qq.com>
 */
class ShareAction extends BaseApi {

  public function getRules() {
  
    return $this->rules([
    
      'listQuery' => [
      
        'shop_id' => 'shop_id|int|false||商铺id',
        'member_id' => 'member_id|int|false||会员id',
        'member_name' => 'member_name|string|false||会员名称',
        'reward_name' => 'reward_name|string|false||赠品名称',
        'share_code' => 'share_code|string|false||分享码',
        'page' => 'page|int|false|1|页码',
        'page_size' => 'page_size|int|false|50|每页条数'
      
      ]
    
    ]);
  
  }

  /**
   * 会员分享动作列表
   * @desc 会员分享动作列表
   *
   * @return array list
   */
  public function listQuery() {
  
    return $this->dm->listQuery($this->retriveRuleParams(__FUNCTION__));
  
  } 

}
