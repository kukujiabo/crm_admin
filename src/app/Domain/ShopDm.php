<?php
namespace App\Domain;

use App\Library\Http;

class ShopDm {

  /**
   * 新建
   */
  public function create($data) {
  
    return \App\request('App.Shop.Create', $data);
  
  }

  /**
   * 列表
   */
  public function listQuery($data) {
  
    return \App\request('App.Shop.ListQuery', $data);
  
  }

  /**
   * 查询详情
   */
  public function getDetail($data) {
  
    return \App\request('App.Shop.GetDetail', $data);
  
  }

  /**
   * 更新店铺信息
   */
  public function updateShop($data) {
  
    return \App\request('App.Shop.UpdateShop', $data);
  
  }

  /**
   * 查询全部列表
   */
  public function getAll($data) {
  
    return \App\request('App.Shop.GetAll', $data);
  
  }

  /**
   *
   *
   */
  public function countData($data) {
  
    return \App\request('App.Shop.CountData', $data);
  
  }

  public function removeShop($data) {
  
    return \App\request('App.Shop.RemoveShop', $data);
  
  }

  public function shopShareCode($data) {
  
    $data['service'] = 'App.Shop.ShopShareCode';

    $data['hyaline'] = true;

    $url = \PhalApi\DI()->config->get('api.host');

    $stream = Http::httpPost($url, $data, null, null, null, 'form');

    if ($data['download'] == 1) {
    
      $detail = $this->getDetail([ 'id' => $data['shop_id'] ]);

      $filename = $detail['shop_name'] . $data['code'] . '.png';

      header( "Content-type: application/octet-stream" );
      header( "Accept-Ranges: bytes" );
      header( "Accept-Length: " . strlen($stream) );
      header( "Content-Disposition: attachment; filename=" . $filename );

    }

    header("content-type:image/png");

    echo $stream;

    exit;
  
  }

}
