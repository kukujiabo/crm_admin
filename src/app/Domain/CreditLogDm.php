<?php
namespace App\Domain;

class CreditLogDm {
	
	public function getList($data) {

		return \App\request('App.CreditLog.GetList', $params);

	}
 

}