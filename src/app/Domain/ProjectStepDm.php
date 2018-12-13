<?php
namespace App\Domain;

class ProjectStepDm {

  public function getAll($data) {
  
    return \App\request('App.ProjectStep.GetAll', $data);
  
  }

}
