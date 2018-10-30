<?php
namespace App\Domain;

class SalesBindDm {
	
	public function getAll() {

		return \App\request('App.SalesBind.GetAll', $data);

	}

}