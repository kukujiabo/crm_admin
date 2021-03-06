<?php
namespace App\Api;

/**
 * 信用额度接口
 *
 */
class Credit extends BaseApi {
	
	public function getRules() {

		return $this->rules([

			'create' => [

				'mid' => 'mid|int|true||客户id',
				'credit' => 'credit|float|true||信用额度',
				'start_date' => 'start_date|string|true||有效期开始时间',
				'end_date' => 'end_date|string|true||有效期结束时间'

			],

			'listQuery' => [

				'mid' => 'mid|int|true||客户id',
				'fields' => 'fields|string|false||字段',
				'order' => 'order|string|false||',

			],

			'remove' => [

				'id' => 'id|int|true||额度id'

			]

		]);

	}

	/**
	 * 新增额度
	 * @desc 新增额度
	 *
	 * @return int id
	 */
	public function create() {

		return $this->dm->create($this->retriveRuleParams(__FUNCTION__));

	}

	/**
	 * 查询额度列表
	 * @desc 查询额度列表
	 *
	 * @return array list
	 */
	public function listQuery() {

		return $this->dm->listQuery($this->retriveRuleParams(__FUNCTION__));

	}

	/**
	 * 删除额度
	 * @desc 删除额度
	 *
	 * @return int num
	 */
	public function remove() {

		return $this->dm->remove($this->retriveRuleParams(__FUNCTION__));

	}

}