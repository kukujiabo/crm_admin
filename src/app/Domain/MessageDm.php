<?php
namespace App\Domain;

class MessageDm {
	
	public function addTmp($data) {

		return \App\request('App.Message.AddTmp', $data);

	}

	public function tmpList($data) {

		return \App\request('App.Message.TmpList', $data);

	}

	public function sendMsg($data) {

		return \App\request('App.Message.SendMsg', $data);

	}

	public function batchSend($data) {

		return \App\request('App.Message.BatchSend', $data);

	}

	public function getAll($data) {

		return \App\request('App.Message.GetAll', $data);

	}

	public function sendList($data) {

		return \App\request('App.Message.SendList', $data);

	}

}