<?php
class Menu {
  // protected 自クラス、継承クラスで利用可
  // static グローバル変数(インスタンス化せず使える) 例:自クラスがいくつインスタンス化されたかカウントできる
  //インスタンス化されたクラスオブジェクトから[ static なプロパティ]にアクセス出来ない(static なメソッドは可)
  //self [自クラスのプロパティ、及びメソッド]への静的アクセス。
  protected $name;
  protected $price;
  protected $image;
  private $orderCount = 0;
  protected static $count = 0; //自クラスがいくつインスタンス化されたか
  
  public function __construct($name, $price, $image) {
    $this->name = $name;
    $this->price = $price;
    $this->image = $image;
    self::$count++; //自クラスがいくつインスタンス化されたか(自クラスでstatic変数にアクセスするにはself::が必要)
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function getImage() {
    return $this->image;
  }
  
  public function getOrderCount() {
    return $this->orderCount;
  }
  
  public function setOrderCount($orderCount) {
    $this->orderCount = $orderCount;
  }
  
  public function getTaxIncludedPrice() {
    return floor($this->price * 1.08);
  }
  
  public function getTotalPrice() {
    return $this->getTaxIncludedPrice() * $this->orderCount;
  }
  //レビュー[]から該当メニュのレビューのみを返す
  public function getReviews($reviews) {
    $reviewsForMenu = array();
    foreach ($reviews as $review) {
      if ($review->getMenuName() == $this->name) {
        $reviewsForMenu[] = $review;
      }
    }
    return $reviewsForMenu;
  }
  
  //自クラスのインスタンス総数を返す
  public static function getCount() {
    return self::$count;
  }
  //メニュー名から$menu(メニュー名,値段,メニュー画像)を返す
  public static function findByName($menus, $name) {
    foreach ($menus as $menu) {
      if ($menu->getName() == $name) {
        return $menu;
      }
    }
  }
  
}
?>