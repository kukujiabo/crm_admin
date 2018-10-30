<?php
namespace App\Domain;

use App\Library\Http;

class TrackDm {
	
	public function create($data) {

		return \App\request('App.Track.Create', $data);

	}	

	public function listQuery($data) {

		return \App\request('App.Track.ListQuery', $data);

	}

}