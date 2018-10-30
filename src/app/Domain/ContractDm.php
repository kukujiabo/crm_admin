<?php
namespace App\Domain;

class ContractDm {
	
	public function create($data) {

		return \App\request('App.Contract.Create', $data);

	}

	public function listQuery($data) {

		return \App\request('App.Contract.listQuery', $data);

	}


}