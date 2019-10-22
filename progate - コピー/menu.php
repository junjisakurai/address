<?php
class Menu {
  // protected ���N���X�A�p���N���X�ŗ��p��
  // static �O���[�o���ϐ�(�C���X�^���X�������g����) ��:���N���X�������C���X�^���X�����ꂽ���J�E���g�ł���
  //�C���X�^���X�����ꂽ�N���X�I�u�W�F�N�g����[ static �ȃv���p�e�B]�ɃA�N�Z�X�o���Ȃ�(static �ȃ��\�b�h�͉�)
  //self [���N���X�̃v���p�e�B�A�y�у��\�b�h]�ւ̐ÓI�A�N�Z�X�B
  protected $name;
  protected $price;
  protected $image;
  private $orderCount = 0;
  protected static $count = 0; //���N���X�������C���X�^���X�����ꂽ��
  
  public function __construct($name, $price, $image) {
    $this->name = $name;
    $this->price = $price;
    $this->image = $image;
    self::$count++; //���N���X�������C���X�^���X�����ꂽ��(���N���X��static�ϐ��ɃA�N�Z�X����ɂ�self::���K�v)
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
  //���r���[[]����Y�����j���̃��r���[�݂̂�Ԃ�
  public function getReviews($reviews) {
    $reviewsForMenu = array();
    foreach ($reviews as $review) {
      if ($review->getMenuName() == $this->name) {
        $reviewsForMenu[] = $review;
      }
    }
    return $reviewsForMenu;
  }
  
  //���N���X�̃C���X�^���X������Ԃ�
  public static function getCount() {
    return self::$count;
  }
  //���j���[������$menu(���j���[��,�l�i,���j���[�摜)��Ԃ�
  public static function findByName($menus, $name) {
    foreach ($menus as $menu) {
      if ($menu->getName() == $name) {
        return $menu;
      }
    }
  }
  
}
?>