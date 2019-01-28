<?php
namespace App\Domain;

use App\Library\Http;
use App\Library\RedisClient;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RewardDm {

  protected $_admin; 

  public function __construct() {
        
    $requestHeader = getallheaders();
            
    $auth = RedisClient::get('admin_auth', $requestHeader['AX-TOKEN']);

    $this->_admin = $auth;

  }

  /**
   * 新建文件
   */
  public function create($data) {
  
    $data['opid'] = $this->_admin->id;

    return \App\request('App.Reward.Create', $data);
  
  }

  /**
   * 更新赠品信息
   */
  public function edit($data) {
  
    $data['opid'] = $this->_admin->id;

    return \App\request('App.Reward.Edit', $data);
  
  }

  /**
   * 查询列表
   */
  public function listQuery($data) {
  
    return \App\request('App.Reward.ListQuery', $data);
  
  }

  /**
   * 查询详情
   */
  public function getDetail($data) {
  
    return \App\request('App.Reward.GetDetail', $data);
  
  }

  public function changeStep($data) {

    $data['opid'] = $this->_admin->id;
  
    return \App\request('App.Reward.ChangeStep', $data);
  
  }

  public function download($data) {

    $result = \App\request('App.Reward.GetAll', $data);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Type:application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="合同数据' . time() . '.xlsx"');
    header('Cache-Control: max-age=0');
      
    $spreadsheet = new Spreadsheet();

    $titles = array(
    
      'id' => '项目ID', 
      'reward_name' => '项目名称', 
      'mname' => '客户', 
      'start_time' => '开始时间',
      'brief' => '项目说明', 
      'status' => '当前状态', 
      'created_at' => '创建时间'
   
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

        if ($field == 'status') {

          $match = array( '', '水工', '电工', '泥工', '木工' );

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
