<?php
/*
 * Created on Fri Jul 12 2019
 *
 * The MIT License (MIT)
 * Copyright (c) 2019 BookMeBus PLC
 */

  // http://localhost:8000/success_url.php?partner_trans_id=1562911005&currency=USD&total_fee=10.00&trade_no=2019071222001331621000228031&trade_status=TRADE_FINISHED
 
  require_once('ali_pay_checker.php');
  require_once('util.php');

  $params  = $_GET;
  $checker = new AliPayChecker($params);
  $url     = $checker->url();
  $success = $checker->valid();

?>

<?php if ($success): ?>
  <h1> Thank you for booking with us</h1>
  <p> For details transaction please check belows:</p>
  <a href='<?= $url ?>'> Transaction </a> | <a href='/'> Home </a>
<?php else: ?>
  <h1> Failed to connect to Alipay</h1>
  <p> If you think it is a problem of internet, please hit a refreshh</p>
  <a href='<?= $url ?>'> Transaction </a> | <a href='/'> Home </a>
<?php endif ?>


