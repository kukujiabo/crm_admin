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

				'brief'  => 'brief|string|false||',

			],

			'listQuery' => [

				'keywords' => 'keywords|string|false||关键字',

				'fields' => 'fields|string|false||字段',

				'order' => 'order|string|false||排序',

				'page' => 'page|int|false||页码',

				'page_size' => 'page_size|int|false||每页条数'

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

}