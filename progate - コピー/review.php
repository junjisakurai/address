<?php
class Review {
  private $menuName;
  private $userId;
  private $body;
 //メニュー名, ユーザーID, レビュー内容(文), 評価(1～5)
  public function __construct($menuName, $userId, $body, $evaluation) {
    $this->menuName = $menuName;
    $this->userId = $userId;
    $this->body = $body;
    $this->evaluation = $evaluation;
  }

  public function getMenuName() {
    return $this->menuName;
  }

  public function getBody() {
    return $this->body;
  }

  public function getEvaluation() {
    return $this->evaluation;
  }

  public function getUser($users) {
    foreach ($users as $user) {
      if ($user->getId() == $this->userId) {
        return $user;
      }
    }
  }
  
}

?>