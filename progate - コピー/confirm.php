<!-- 注文内容確認画面  -->
<?php require_once('data.php') ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Progate</title>
  <link rel="stylesheet" type="text/css" href="stylesheet1.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="order-wrapper">
  <div class="order-wrapper">
    <h2>注文内容確認</h2>
    <?php $totalPayment = 0;
          $totalOrderCount = 0;
    ?>
    
    <?php foreach ($menus as $menu): ?>
      <?php $orderCount = $_POST[$menu->getName()]; ?>
      
      <!-- 注文個数0は表示しない  -->
      <?php if($orderCount == 0) continue; ?>
      
      <?php $menu->setOrderCount($orderCount);
            $totalPayment += $menu->getTotalPrice();
            $totalOrderCount += $orderCount;
       ?>
      <p class="order-amount">
        <?php echo $menu->getName() ?>
        x
        <?php echo $orderCount ?>
        個
      </p>
      <p class="order-price"><?php echo $menu->getTotalPrice() ?>円</p>
      
      
    <?php endforeach ?>
    
      <!-- 注文個数0なら、メッセージを表示して戻る  -->
      <?php if($totalOrderCount == 0) {
      	echo '<script type="text/javascript">alert("注文個数0。");</script>';
      }?>
     <!--  header("Location: index.php");  -->
    
    <h3>合計金額: <?php echo $totalPayment ?>円</h3>
  </div>
  <a href="index.php" >← メニュー一覧へ戻る</a>
</body>
</html>