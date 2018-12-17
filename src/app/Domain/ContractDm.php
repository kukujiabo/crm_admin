<?php
namespace App\Domain;

class ContractDm {
	
	public function create($data) {

		return \App\request('App.Contract.Create', $data);

	}

	public function listQuery($data) {

		return \App\request('App.Contract.listQuery', $data);

	}

  public function getDetail($data) {
  
		return \App\request('App.Contract.GetDetail', $data);
  
  }

  public function remove($data) {
  
    return \App\remove('App.Contract.Remove', $data);
  
  }

  public function edit($data) {
  
    return \App\edit('App.Contract.Edit', $data);
  
  }

}
