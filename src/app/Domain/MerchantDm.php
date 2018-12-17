<?php
namespace App\Domain;

class MerchantDm {

  public function create($data) {
  
    return \App\request('App.Merchant.Create', $data);
  
  }

  public function edit($data) {
  
    return \App\request('App.Merchant.Edit', $data);
  
  }

  public function listQuery($data) {
  
    return \App\request('App.Merchant.ListQuery', $data);
  
  }

  public function getAll($data) {
  
    return \App\request('App.Merchant.GetAll', $data);

  }

  public function getDetail($data) {
  
    return \App\request('App.Merchant.GetDetail', $data);
  
  }

  public function remove($data) {
  
    return \App\request('App.Merchant.Remove', $data);
  
  }

}
