<?php
namespace App\Domain;

class MemberRewardDm {

  public function getList($data) {
  
    return \App\request('App.MemberReward.GetList', $data);
  
  }


}
