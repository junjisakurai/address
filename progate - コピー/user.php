<?php
class User {
  // static �O���[�o���ϐ�(�C���X�^���X�������g����) ��:���N���X�������C���X�^���X�����ꂽ���J�E���g�ł���
  //�C���X�^���X�����ꂽ�N���X�I�u�W�F�N�g����[ static �ȃv���p�e�B]�ɃA�N�Z�X�o���Ȃ�(static �ȃ��\�b�h�͉�)
  //self [���N���X�̃v���p�e�B�A�y�у��\�b�h]�ւ̐ÓI�A�N�Z�X�B
  private $id;
  private $name;
  private $gender;
  private static $count = 0;
  
  public function __construct($name, $gender) {
    $this->name = $name;
    $this->gender = $gender;
    self::$count++;
    $this->id = self::$count; //���[�U�[ID��
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