<?php
/*
 * Created on Fri Jul 12 2019
 *
 * The MIT License (MIT)
 * Copyright (c) 2019 BookMeBus PLC
 */

 /**
  ** Warning:
  * This file does not mean to be used in production. This is a small utilities for testing the integration.
  * In Production mode you might extract your credentials from source code in the repo and use something like 
  * Dotenv or other similar tool
  */

  class AliPayConfig {
    static $API_KEY = '61748b04-eb3e-401e-9d78-297771e788ad';
    static $MERCHANT_ID = '965';
    
    static $BUSINESS_TYPE = 5; # Other
    # @string free text: if you have more services this shhould be dynamic
    static $REDIRECT_ENDPOINT = 'https://alipay-test.pipay.com/AlipayOnlinePayment/PaymentTran';
    static $CHECKER_ENDPOINT  = 'https://alipay-test.pipay.com/AlipayOnlinePayment/singleTradeQuery';

    # php -S localhost:8000
    static $RETURN_URL  = 'http://localhost:8000/return_url.php';
    static $SUCCESS_URL = 'http://localhost:8000/success_url.php';
    static $FAILED_URL  = 'http://localhost:8000/failed_url.php';
  }


