<?php
namespace App\Domain;

class CreditDm {
	
	public function create($data) {

		return \App\request('App.Credit.Create', $data);

	}

	public function listQuery($data) {

		return \App\request('App.Credit.ListQuery', $data);

	}

}