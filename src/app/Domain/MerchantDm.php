<?php
namespace App\Domain;

class MerchantDm {

  public function create($data) {
  
    return \App\request('App.Merchant.Create', $data);
  
  }

  public function edit($data) {
  
    return \App\request('App.Merchant.Edit', $data);
  
  }

  public function listQuery($data) {
  
    return \App\request('App.Merchant.ListQuery', $data);
  
  }

  public function getAll($data) {
  
    return \App\request('App.Merchant.GetAll', $data);

  }

  public function getDetail($data) {
  
    return \App\request('App.Merchant.GetDetail', $data);
  
  }

  public function remove($data) {
  
    return \App\request('App.Merchant.Remove', $data);
  
  }

  public function download($data) {

    $result = \App\request('App.Merchant.GetAll', $data);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Type:application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="订单数据.xlsx"');
    header('Cache-Control: max-age=0');
      
    $spreadsheet = new Spreadsheet();

    $titles = array(
    
      'id' => 'ID', 
      'mcode' => '客户编号', 
      'mname' => '客户名称', 
      'ext_1' => '联系人姓名', 
      'phone' => '联系人手机号', 
      'type' => '客户类型', 
      'real_name' => '业务员', 
      'sales_phone' => '业务员手机', 
      'created_at' => '加入时间'
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

    foreach($result['PO_POMain'] as $index => $order) {

      $column = 0;

      $valueOrder = [];

      foreach($fields as $field) {

        $valueOrder[$field] = $order[$field];

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
