<?php
namespace App\Domain;

use App\Library\Http;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TrackDm {
	
	public function create($data) {

		return \App\request('App.Track.Create', $data);

	}	

	public function listQuery($data) {

		return \App\request('App.Track.ListQuery', $data);

	}

	public function getDetail($data) {

		return \App\request('App.Track.GetDetail', $data);

	}

	public function edit($data) {

		return \App\request('App.Track.Edit', $data);

	}

	public function download($data) {

		$result =  \App\request('App.Track.GetAll', $data);


   	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Type:application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="客户跟踪数据' . time() . '.xlsx"');
    header('Cache-Control: max-age=0');
      
    $spreadsheet = new Spreadsheet();

    $titles = array(
    
      'mname' => '客户名称', 
      'real_name' => '业务员', 
      'stage' => '阶段',
      'type' => '销售类型',
      'state' => '状态',
      'posibility' => '可能性', 
      'contact_type' => '联系类型', 
      'next_view_date' => '下次回访', 
      'content' => '跟踪内容', 
      'chance_name' => '销售机会',      
      'created_at' => '创建时间'
   
    );

    $fields = explode(',', $data['fields']);

    $sheet = $spreadsheet->getActiveSheet();

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    foreach($fields as $key => $field) {

	    foreach($titles as  $title) {

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

      		$match = array( '拜访客户', '寄样品', '询价', '发订单', '发货');

      		$valueOrder[$field] = $match[$order[$field]];

      	} elseif($field == 'stage') {

          $match = array( '无', '初期沟通', '意向', '对接', '成交');

          $valueOrder[$field] = $match[$order[$field]];

        } elseif($field == 'contact_type') {

          $match = array( '拜访客户', '寄样品', '询价', '发订单', '发货');

          $valueOrder[$field] = $match[$order[$field]];

        } elseif($field == 'state') {

          $match = array( '跟踪', '成功', '失败', '搁置', '失效');

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