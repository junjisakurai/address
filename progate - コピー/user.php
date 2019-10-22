<?php
class User {
  // static グローバル変数(インスタンス化せず使える) 例:自クラスがいくつインスタンス化されたかカウントできる
  //インスタンス化されたクラスオブジェクトから[ static なプロパティ]にアクセス出来ない(static なメソッドは可)
  //self [自クラスのプロパティ、及びメソッド]への静的アクセス。
  private $id;
  private $name;
  private $gender;
  private static $count = 0;
  
  public function __construct($name, $gender) {
    $this->name = $name;
    $this->gender = $gender;
    self::$count++;
    $this->id = self::$count; //ユーザーIDは
  }
  
  public function getId() {
    return $this->id;
  }
  
  public function getName() {
    return $this->name;
  }

  public function getGender() {
    return $this->gender;
  }
}

?>