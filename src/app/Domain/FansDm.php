<?php
namespace App\Domain;

class FansDm {

  public function listQuery($params) {
  
    return \App\request('App.MemberFavoriteShop.GetUnionInfoList', $params);
  
  }


}
