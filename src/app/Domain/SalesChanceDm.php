<?php
namespace App\Domain;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SalesChanceDm {
	
	public function create($data) {

		return \App\request('App.SalesChance.Create', $data);

	}

	public function getList($data) {

		return \App\request('App.SalesChance.GetList', $data);

	}

	public function edit($data) {

		return \App\request('App.SalesChance.Edit', $data);

	}

  public function getDetail($data) {

    return \App\request('App.SalesChance.GetDetail', $data);

  }

	public function getAll($data) {

		return \App\request('App.SalesChance.GetAll', $data);

	}

	public function download($data) {

		$result = \App\request('App.SalesChance.GetAll', $data);

   	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Type:application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="销售机会' . time() . '.xlsx"');
    header('Cache-Control: max-age=0');
      
    $spreadsheet = new Spreadsheet();

    $titles = array(

      'chance_name'=> '机会标题',
      'price'=> '预计价格',
      'customer_name'=> '客户名称',
      'deal_date'=> '预计成交时间',
      'type'=>'类型',
      'next_step'=>'下一步',
      'source'=>'来源',
      'posibility'=>'可能性',
      'sales_name'=>'销售名称',
      'state'=>'状态'
   
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

      	if ($fields == 'type') {

      		$match = array( '无', '新客户', '已购客户');

      		$valueOrder[$field] = $match[$order[$field]];

      	} elseif ($fields == 'state') {

      		$match = array( '跟踪', '成功', '失败', '搁置', '失效');

      		$valueOrder[$field] = $match[$order[$field]];

      	} elseif ($fields == 'source') {

      		$match = array( '无', '电话来访', '老客户', '客户介绍', '独立开发', '促销活动', '其他');

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