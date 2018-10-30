<?php
namespace App\Domain;

class MemberAdviseDm {

  public function listQuery($data) {

    return \App\request('App.MemberAdvise.ListQuery', $data);
  
  }

}
