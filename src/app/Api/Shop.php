<?php
namespace App\Api;

/**
 * 店铺相关接口
 *
 * @author Meroc Chen <398515393@qq.com> 2018-06-04
 */
class Shop extends BaseApi {

  public function getRules() {
  
    return $this->rules([
    
      'create' => [
      
        'mid' => 'mid|int|false||商户id',
        'category_id' => 'category_id|int|false||分类id',
        'shop_name' => 'shop_name|string|true||店铺名称',
        'shop_code' => 'shop_code|string|true||店铺编码',
        'phone' => 'phone|string|true||店铺电话',
        'open_time' => 'open_time|string|true||店铺营业时间 ',
        'thumbnail' => 'thumbnail|string|true||店铺logo',
        'account' => 'account|string|false||店铺账号',
        'password' => 'password|string|false||店铺密码',
        'words' => 'words|string|true||一句话介绍',
        'brief' => 'brief|string|false||店铺简介',
        'image_text' => 'image_text|string|false||店铺照片',
        'carousel' => 'carousel|string|false||店铺轮播图',
        'recommend_code' => 'recommend_code|string|false||推荐码',
        'shop_address' => 'shop_address|string|false||门店地址',
        'article_link' => 'article_link|string|false||文章链接',
        'article_image' => 'article_image|string|false||文章图片',
        'latitue' => 'latitude|string|false||纬度',
        'longtitude' => 'longtitude|string|false||经度',
        'status' => 'status|int|false|1|店铺状态：1.有效，2.停用'
      
      ],

      'updateShop' => [
      
        'id' => 'id|int|true||门店id',
        'mid' => 'mid|int|false||商户id',
        'category_id' => 'category_id|int|false||分类id',
        'shop_name' => 'shop_name|string|false||店铺名称',
        'shop_code' => 'shop_code|string|false||店铺编码',
        'phone' => 'phone|string|false||店铺电话',
        'account' => 'account|string|false||店铺账号',
        'password' => 'password|string|false||店铺密码',
        'open_time' => 'open_time|string|false||店铺营业时间 ',
        'article_link' => 'article_link|string|false||文章链接',
        'article_image' => 'article_image|string|false||文章图片',
        'words' => 'words|string|false||一句话介绍',
        'thumbnail' => 'thumbnail|string|false||店铺logo',
        'brief' => 'brief|string|false||店铺简介',
        'image_text' => 'image_text|string|false||店铺照片',
        'carousel' => 'carousel|string|false||店铺轮播图',
        'recommend_code' => 'recommend_code|string|false||推荐码',
        'shop_address' => 'shop_address|string|false||门店地址',
        'status' => 'status|int|false|1|店铺状态：1.有效，2.停用'
      
      ],

      'listQuery' => [
      
        'mid' => 'mid|int|false||商户id',
        'shop_name' => 'shop_name|string|false||店铺名称',
        'shop_code' => 'shop_code|string|false||店铺编码',
        'status' => 'status|int|false||店铺状态',
        'fields' => 'fields|string|false||店铺字段',
        'order' => 'order|string|false||列表排序',
        'page' => 'page||||',
        'page_size' => 'page_size||||'
      
      ],


      'getAll' => [
      
        'mid' => 'mid|int|false||商户id',
        'shop_name' => 'shop_name|string|false||店铺名称',
        'shop_code' => 'shop_code|string|false||店铺编码',
        'status' => 'status|int|false||店铺状态',
        'fields' => 'fields|string|false||店铺字段',
        'order' => 'order|string|false||列表排序'
      
      ],

      'getDetail' => [
      
        'id' => 'id|int|true||店铺id'
      
      ],

      'countData' => [
      
      
      ],

      'removeShop' => [
      
        'id' => 'id|int|true||店铺id'
      
      ],

      'shopShareCode' => [
      
        'shop_id' => 'shop_id|int|true||门店id',

        'code' => 'code|string|true||识别码',

        'download' => 'download|int|false||是否直接下载: 1.是，0.否'
      
      ]
    
    ]);
  
  }

  /**
   * 新建门店
   * @desc 新建门店
   *
   * @return int id
   */
  public function create() {
  
    return $this->dm->create($this->retriveRuleParams(__FUNCTION__)); 
  
  }

  /**
   * 列表查询
   * @desc 列表查询
   *
   * @return array list
   */
  public function listQuery() {
  
    return $this->dm->listQuery($this->retriveRuleParams(__FUNCTION__));
  
  }

  /**
   * 查询门店详情
   * @desc 查询门店详情
   *
   * @return array data
   */
  public function getDetail() {
  
    return $this->dm->getDetail($this->retriveRuleParams(__FUNCTION__)); 
  
  }

  /**
   * 更新门店详情
   * @desc 更新门店详情
   *
   * @return boolean true/false
   */
  public function updateShop() {
  
    $params = $this->retriveRuleParams(__FUNCTION__);

    return $this->dm->updateShop($params);
  
  }

  /**
   * 查询所有门店
   * @desc 查询所有门店
   *
   * @return array list
   */
  public function getAll() {
  
    $params = $this->retriveRuleParams(__FUNCTION__); 

    return $this->dm->getAll($params);
  
  }

  /**
   * 查询门店统计数据
   * @desc 查询门店统计数据
   *
   * @return array data
   */
  public function countData() {
  
    return $this->dm->countData($this->retriveRuleParams(__FUNCTION__)); 
  
  }

  /**
   * 删除门店
   * @desc 删除门店
   *
   * @return int num
   */
  public function removeShop() {
  
    return $this->dm->removeShop($this->retriveRuleParams(__FUNCTION__));
  
  }

  /**
   * 门店分享二维码
   * @desc 门店分享二维码
   *
   * @return string stream
   */
  public function shopShareCode() {
  
    return $this->dm->shopShareCode($this->retriveRuleParams(__FUNCTION__)); 
  
  }

}
