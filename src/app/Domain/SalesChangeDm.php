<?php
namespace App\Domain;

class SalesChangeDm {
	
	public function getList($data) {

		return \App\request('App.SalesChange.GetList', $data); 

	}

}