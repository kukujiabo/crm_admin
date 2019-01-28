<?php
namespace App\Domain;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
  
    return \App\request('App.Contract.Remove', $data);
  
  }

  public function edit($data) {
  
    return \App\edit('App.Contract.Edit', $data);
  
  }

  public function download($data) {

  	$result = \App\request('App.Contract.GetAll', $data);

   	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Type:application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="合同数据' . time() . '.xlsx"');
    header('Cache-Control: max-age=0');
      
    $spreadsheet = new Spreadsheet();

    $titles = array(
    
      'title' => '合同名称', 
      'code' => '合同编号', 
      'money' => '合同金额', 
      'type' => '合同类型',
      'sign_date' => '签订时间', 
      'expire_date' => '结束时间', 
      'mname' => '客户名称', 
      'real_name' => '销售员', 
      'chance_name' => '销售机会',
      'brief' => '合同描述',        
      'created_at' => '创建时间', 
   
    );

    $fields = explode(',', $data['fields']);

    $sheet = $spreadsheet->getActiveSheet();

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    foreach($fields as $key => $field) {

	    foreach($titles as $title) {

	      $sheet->setCellValue("{$characters[$key]}1", $titles[$field]);
	    
	    }

    }

    $sheet->getColumnDimension('A')->setWidth(30);

    $row = 2;

    foreach($result as $index => $order) {

      $column = 0;

      $valueOrder = [];

      foreach($fields as $field) {

      	if ($field == 'type') {

      		$match = array( '', '', '小b客户', '大b客户', 'kv客户');

      		$valueOrder[$field] = $match[$order[$field]];

      	} else {

      		$valueOrder[$field] = $order[$field];

      	}

      }

      foreach($valueOrder as $value) {

        $cell = "{$characters[$column]}{$row}";

        $sheet->setCellValue($cell, $value);

        $column++;

      }

      $row++;

    }

    $writer = new Xlsx($spreadsheet);

    $writer->save("php://output");

    exit;

  }

}
