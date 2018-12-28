<?php
namespace App\Api;


/**
 * 合同接口
 */
class Contract extends BaseApi {

	public function getRules() {

		return $this->rules([

			'create' => [

				'type' => 'type|int|true||合同类型',

				'mid' => 'mid|int|true||商户编号',

				'code' => 'code|string|true||合同编号',

				'title' => 'title|string|true||合同标题',

				'brief'  => 'brief|string|false||说明',

				'money' => 'money|string|false||合同金额',

				'sign_date' => 'sign_date|string|false||签约金额',

				'expire_date' => 'expire_date|string|false||结束日期',

				'sales_id' => 'sales_id|int|false||销售员id',

				'chance_id' => 'chance_id|int|false||销售机会id'

			],

      'edit' => [

        'id' => 'id|int|true||合同id',
      
				'type' => 'type|int|false||合同类型',

				'mid' => 'mid|int|false||商户编号',

				'code' => 'code|string|false||合同编号',

				'title' => 'title|string|false||合同标题',

				'brief'  => 'brief|string|false||说明',
      
      ],

      'getDetail' => [
      
        'id' => 'id|int|true||合同id' 
      
      ],

      'remove' => [

        'id' => 'id|int|true||合同id' 

      ],

			'listQuery' => [

				'keywords' => 'keywords|string|false||关键字',

				'type' => 'type|string|false||分类',

				'start_date' => 'start_date|string|false||开始时间',

				'end_date' => 'end_date|string|false||结束时间',

				'fields' => 'fields|string|false||字段',

				'order' => 'order|string|false||排序',

				'page' => 'page|int|false||页码',

				'page_size' => 'page_size|int|false||每页条数'

			],

			'download' => [

				'keywords' => 'keywords|string|false||关键字',

				'type' => 'type|string|false||分类',

				'fields' => 'fields|string|false||字段',

				'start_date' => 'start_date|string|false||开始时间',

				'end_date' => 'end_date|string|false||结束时间'
				
			]

		]);

	}
	

	/**
	 * 新增合同
	 * @desc 新增合同
	 *
	 * @return int id
	 */
	public function create() {

		return $this->dm->create($this->retriveRuleParams(__FUNCTION__));

	}

	/**
	 * 获取合同列表
	 * @desc 获取合同列表
	 *
	 * @return int id
	 */
	public function listQuery() {

		return $this->dm->listQuery($this->retriveRuleParams(__FUNCTION__));

	}

  /**
   * 查询详情
   * @desc 查询详情
   *
   * @return array data
   */
  public function getDetail() {
  
    return $this->dm->getDetail($this->retriveRuleParams(__FUNCTION__)); 
  
  }

  /**
   * 删除合同
   * @desc 删除合同
   *
   * @return int num
   */
  public function remove() {
  
    return $this->dm->remove($this->retriveRuleParams(__FUNCTION__)); 
  
  }

  /**
   * 编辑合同内容
   * @desc 编辑合同内容
   *
   * @return int num
   */
  public function edit() {
  
    return $this->dm->edit($this->retriveRuleParams(__FUNCTION__)); 
  
  }

  /**
   * 下载合同数据
   * @desc 下载合同数据
   *
   * @return stream file
   */
  public function download() {

  	return $this->dm->download($this->retriveRuleParams(__FUNCTION__));

  }

}
