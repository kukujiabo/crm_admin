<?php
namespace App\Domain;

class ShareActionDm {

  public function listQuery($data) {
  
    return \App\request('App.ShareAction.ListQuery', $data);
  
  }

}
