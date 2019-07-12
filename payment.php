<?php
/*
 * Created on Fri Jul 12 2019
 *
 * The MIT License (MIT)
 * Copyright (c) 2019 BookMeBus PLC
 */

	require_once('ali_pay_config.php');
	require_once('ali_pay_redirect.php');
	require_once('util.php');
	require_once('order_model.php');

	$order = OrderModel::fetch();
	
  $merchant_id      = $_POST["merchant_id"];
	$api_key          = $_POST["api_key"];
	$partner_trans_id = $_POST["partner_trans_id"];
	$return_url       = $_POST['return_url'];
	$success_url      = $_POST['success_url'];
	$failed_url       = $_POST['failed_url'];

	$options = array(
		"merchant_id" => $merchant_id,
		"api_key"   =>  $api_key,
		"redirect_endpoint" => AliPayConfig::$REDIRECT_ENDPOINT,
		"return_url" => $return_url,
		"success_url" => $success_url,
		"failed_url" => $failed_url
	);

	Util::debug("options", $options);

	$aliredirect = new AliPayRedirect($options);
	$url = $aliredirect->redirect_to($order);
	header("Location: ${url}");