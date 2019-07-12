<?php
/*
 * Created on Fri Jul 12 2019
 *
 * The MIT License (MIT)
 * Copyright (c) 2019 BookMeBus PLC
 */

  class AliPayRedirect {
    // @options:  assoc array()
    public $options; 

    function __construct($options){
      Util::debug("options-----", $this->options);
      $this->options = $options;
    }

    function redirect_to($order) {
      $created_time = time();

      $merchant_id       = $this->options['merchant_id'];
      $api_key_server    = $this->options['api_key'];
      $redirect_endpoint = $this->options['redirect_endpoint'];
      $return_url        = $this->options['return_url'];
      $success_url       = $this->options['success_url'];
      $failed_url        = $this->options['failed_url'];
      

      $total_fee        = $order->amount;
      $partner_trans_id = $order->token;
      $product_desc     = $order->product_desc;

      $str = "${created_time}${merchant_id}${api_key_server}${partner_trans_id}";
      $hash = hash('sha256', $str);

      $params = array(
        "apikey" => $api_key_server,
        "merchant_id" => $merchant_id,
        "total_fee" => $total_fee,
        "device_timestamp" => $created_time,
        "hash" => $hash,
        "partner_trans_id" => $partner_trans_id,
        "return_url"=> $return_url,
        "business_type" => 5,
        "other_business_type" => $product_desc,
        "refer_url" => "https://global.alipay.com", #TODO Remove
        "success_url" =>  $success_url,
        "failed_url"  => $failed_url
      );
      
      $query_string = http_build_query($params);
      Util::debug("redirect endpoint", $redirect_endpoint);
      return "${redirect_endpoint}?${query_string}";
    }
  }