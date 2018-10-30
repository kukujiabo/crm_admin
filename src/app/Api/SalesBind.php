<?php
namespace App\Api;

/**
 * 销售人员接口
 *
 */
class SalesBind extends BaseApi {

	public function getRules() {

		return $this->rules(array(

			'getAll' => array()

		));


	}

	/**
     *
	 *
	 */
	public function getAll() {

		return $this->dm->getAll($this->retriveRuleParams(__FUNCTION__));

	}

}