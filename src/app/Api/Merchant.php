<?php
namespace App\Api;

/**
 * 客户资料接口
 *
 */
class Merchant extends BaseApi {

  public function getRules() {
  
    return $this->rules(array(
    
      'create' => array(
      
        'mcode' => 'mcode|string|true||客户编码',
        'mname' => 'mname|string|true||客户名称',
        'phone' => 'phone|string|true||联系电话',
        'ext_1' => 'ext_1|string|true||联系人',
        'sales_id' => 'sales_id|int|true||销售id',
        'status' => 'status|int|true||状态',
        'brief' => 'brief|string|false||客户描述'
      
      ),

      'listQuery' => array(
      
        'status' => 'status|int|false||状态',
        'sales_id' => 'sales_id|int|false||销售员',
        'cType' => 'cType|int|false||类型',
        'start_date' => 'start_date|string|false||开始时间',
        'end_date' => 'end_date|string|false||结束时间',
        'fields' => 'fields|string|false||字段',
        'order' => 'order|string|false||排序',
        'page' => 'page|int|false|1|页码',
        'page_size' => 'page_size|int|false|20|每页条数'
      
      ),

      'edit' => array(

        'id' => 'id|int|true||客户id',
        'ext_1' => 'ext_1|string|false||联系人姓名',
        'phone' => 'phone|string|false||联系电话',
        'sales_id' => 'sales_id|int|false||销售id',
        'status' => 'status|int|false||客户状态'

      ),

      'getDetail' => array(

        'id' => 'id|int|true||客户id',
        'fields' => 'fields|string|false||字段'

      ),

      'batchSetSales' => [

        'sales_id' => 'sales_id|int|true||销售id',
        'mids' => 'mids|string|true||客户id'

      ],

      'getAll' => array(


      ),

      'remove' => array(
      
        'id' => 'id|int|true||客户id'
      
      ),

      'download' => array(

        'status' => 'status|int|false||状态',
        'sales_id' => 'sales_id|int|false||销售员',
        'cType' => 'cType|int|false||类型',
        'start_date' => 'start_date|string|false||开始时间',
        'end_date' => 'end_date|string|false||结束时间',
        'fields' => 'fields|string|false||字段'

      )
    
    ));
  
  }

  /**
   * 新增客户资料
   * @desc 新增客户资料
   *
   * @return int id
   */
  public function create() {
  
    return $this->dm->create($this->retriveRuleParams(__FUNCTION__));
  
  }

  /**
   * 编辑客户资料
   * @desc 编辑客户资料
   *
   * @return int num
   */
  public function edit() {

    return $this->dm->edit($this->retriveRuleParams(__FUNCTION__));

  }

  /**
   * 查询资料列表 
   * @desc 查询资料列表 
   *
   * @return array data
   */
  public function listQuery() {
  
    return $this->dm->listQuery($this->retriveRuleParams(__FUNCTION__));

  }

  /**
   * 查询客户资料详情
   * @desc 查询客户资料详情
   *
   * @return array data
   */
  public function getDetail() {

    return $this->dm->getDetail($this->retriveRuleParams(__FUNCTION__));

  }

  /**
   * 查询全部客户
   * @desc 查询全部客户
   *
   * @return array list
   */
  public function getAll() {

    return $this->dm->getAll($this->retriveRuleParams(__FUNCTION__));

  }

  /**
   * 删除客户
   * @desc 删除客户
   *
   * @return int num
   */
  public function remove() {
  
    return $this->dm->remove($this->retriveRuleParams(__FUNCTION__)); 
  
  }

  /**
   * 下载文件
   * @desc 下载文件
   *
   * @return int num
   */
  public function download() {

    return $this->dm->download($this->retriveRuleParams(__FUNCTION__));

  }

  /**
   * 批量修改客户销售人员
   * @desc 批量修改客户销售人员
   *
   * @return int num
   */
  public function batchSetSales() {

    return $this->dm->batchSetSales($this->retriveRuleParams(__FUNCTION__));

  }

}
