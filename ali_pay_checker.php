<?php
/*
 * Created on Fri Jul 12 2019
 *
 * The MIT License (MIT)
 * Copyright (c) 2019 BookMeBus PLC
 */

  require_once('ali_pay_config.php');

  class AliPayChecker {
    private $params;
    public $response;

    public function __construct($params){
      $this->params = $params;
    }

    public function url() {
      $t=time();
 
      $partner_trans_id = $this->params['partner_trans_id'];
      $out_trande_no    = $partner_trans_id;
      $trade_no         = $this->params['trade_no'];
      $api_key          = AliPayConfig::$API_KEY;
      $checker_endpoint = AliPayConfig::$CHECKER_ENDPOINT;

      $hashing_str = "${partner_trans_id}${trade_no}${api_key}";
      $hash = hash('sha256', $hashing_str);

      $query_params = array( "apikey" => $api_key,
                             "trade_no" => $trade_no,
                             "partner_trans_id" => $partner_trans_id,
                             "hash" => $hash);

      $query_string = http_build_query($query_params);

      $url = "${checker_endpoint}?${query_string}";
      return $url;
    }

    public function valid() {
      $url = $this->url($this->params);
      $this->response = file_get_contents($url);
      $json = json_decode($this->response);
      Util::debug("response", $json);
      Util::debug("valid", $json->response->code);
      $return_code = $json->response->code;
      return "${return_code}" == "200";
    }
  }