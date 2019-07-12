<?php
/*
 * Created on Fri Jul 12 2019
 *
 * The MIT License (MIT)
 * Copyright (c) 2019 BookMeBus PLC
 */

  require_once 'ali_pay_config.php';
  require_once 'order_model.php';
  $order = OrderModel::fetch();
?>

<html>
<head>
  <title>AliPay Payments</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body >

<div class="row" style="margin-top: 70px;">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <center>
      <h2 style="color: #ef5198"><u> AliPay Payment</u> </h2>
    </center>

    <form action="payment.php" method="POST">

      <div class="form-group">
        <label for="total_fee">Total Fee :</label>
        <input type="text" class="form-control"  placeholder="Enter Total Fee" name="total_fee" value="<?= $order->amount ?>">
      </div>

      <div class="form-group">
        <label for="merchant_id">Merchant ID :</label>
        <input type="text" class="form-control"  placeholder="Enter Merchant ID" name="merchant_id" value="<?= AliPayConfig::$MERCHANT_ID ?>">
      </div>

      <div class="form-group">
        <label for="api_key"> Api key:</label>
        <input type="text" class="form-control"  placeholder="Enter API Key Server" name="api_key" value="<?= AliPayConfig::$API_KEY ?>">
      </div>

      <div class="form-group">
        <label for="partner_trans_id"> Partner_trans_id(unique):</label>
        <input type="text" class="form-control"  placeholder="Partner Txn ID" name="partner_trans_id" value="<?= $order->token ?>">
      </div>

      <div class="form-group">
        <label for="return_url">Return URL :</label>
        <input type="text" class="form-control"  placeholder="Enter Return URL" name="return_url" value="<?= AliPayConfig::$RETURN_URL; ?>">
      </div>

      <div class="form-group">
        <label for="success_url">Success URL :</label>
        <input type="text" class="form-control"  placeholder="Enter Success" name="success_url" value="<?= AliPayConfig::$SUCCESS_URL; ?>">
      </div>

      <div class="form-group">
        <label for="failed_url">Failed URL :</label>
        <input type="text" class="form-control"  placeholder="Enter Faild" name="failed_url" value="<?= AliPayConfig::$FAILED_URL; ?>">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div class="col-sm-4"></div>
</div>
</body>

</html>