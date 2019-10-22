<?php
require_once('menu.php');
require_once('data.php');
//引数受取
$menuName = $_GET['name'];
//[staic]メニュー名から$menu(メニュー名,値段,メニュー画像)を返す
$menu = Menu::findByName($menus, $menuName);
//レビュー[]から該当メニュのレビューのみを返す
$menuReviews = $menu->getReviews($reviews);


//【要】切り分け--------------------------------------------------------------------------
//チャートデータ(グラフデータ[],平均,件数)を返す
$oneCount = 0;
$twoCount = 0;
$threeCount = 0;
$foreCount = 0;
$fiveCount = 0;
$totalNumber = 0;
$totalCount = 0;
$average = 0;

    foreach ($menuReviews as $review) {
       //評価を変数セット
       $evaluation = $review->getEvaluation();
       //件数 ループ回数取得メソッドで簡単に取りたい
       $totalCount ++;
       //評価トータル
       $totalNumber += $evaluation;
       //評価毎にカウント
       switch ($evaluation) {
           case 1:
               $oneCount ++;
               break;
           case 2:
               $twoCount ++;
               break;
           case 3:
               $threeCount ++;
               break;
           case 4:
               $foreCount ++;
               break;
           case 5:
               $fiveCount ++;
               break;
           default:
               break;
       }
    }

    //平均算出 小数点以下第1位を四捨五入
  $average  = round($totalNumber / $totalCount, 1);

//------------------------------------------------------

//戻り値格納
$data = array();
$data["barData"] = array($fiveCount,  $foreCount, $threeCount, $twoCount, $oneCount);
$data["average"] = $average;
$data["totalCount"] = $totalCount;

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
?>