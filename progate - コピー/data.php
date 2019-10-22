<?php
require_once('drink.php');
require_once('alcohol.php');
require_once('food.php');
require_once('review.php');
require_once('user.php');

$juice = new Drink('JUICE', 600, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/juice.png', 'アイス');
$coffee = new Drink('COFFEE', 500, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/coffee.png', 'ホット');
$beer = new Alcohol('BEER', 700, 'https://cdn.macaro-ni.jp/assets/img/shutterstock/shutterstock_155354765.jpg', 'アイス', 8);
$curry = new Food('CURRY', 900, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/curry.png', 3);
$pasta = new Food('PASTA', 1200, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/pasta.png', 1);
$sarada = new Food('SARADA', 400, 'https://img.cpcdn.com/recipes/4491418/280x487s/11a4a2a9c1b792598a460d8f7fddae77.jpg?u=11000068&p=1501231688', 1);

$menus = array($juice, $coffee, $curry, $pasta, $sarada, $beer);

$user1 = new User('suzuki', 'male');
$user2 = new User('tanaka', 'female');
$user3 = new User('suzuki', 'female');
$user4 = new User('sato', 'male');

$users = array($user1, $user2, $user3, $user4);

// レビューデータ作成[メニュー名, ユーザーID, レビュー文, 評価(1～5)]
$review1 = new Review($juice->getName(), $user1->getId(), '果肉たっぷりのオレンジジュースです！' ,5);
$review2 = new Review($curry->getName(), $user1->getId(), '具がゴロゴロしていてとてもおいしいです' ,4);
$review3 = new Review($coffee->getName(), $user2->getId(), '香りがいいです', 3);
$review4 = new Review($pasta->getName(), $user2->getId(), 'ソースが絶品です。また食べたい。', 5);
$review5 = new Review($juice->getName(), $user3->getId(), '普通のジュース', 2);
$review6 = new Review($curry->getName(), $user3->getId(), '値段の割においしいカレーだと思いました', 3);
$review7 = new Review($coffee->getName(), $user4->getId(), '苦味がちょうどよくて、おすすめです', 4);
$review8 = new Review($pasta->getName(), $user4->getId(), '具材にこだわりを感じました。', 4);
$review9 = new Review($sarada->getName(), $user4->getId(), '野菜が新鮮。', 3);
$review10 = new Review($beer->getName(), $user1->getId(), 'この一杯の為に生きてます！！', 5);
$review11 = new Review($coffee->getName(), $user1->getId(), '', 1);

$reviews = array($review1, $review2, $review3, $review4, $review5, $review6, $review7, $review8, $review9, $review10, $review11);

?>