<?php
/*
 * Created on Fri Jul 12 2019
 *
 * The MIT License (MIT)
 * Copyright (c) 2019 BookMeBus PLC
 */

  class OrderModel {
    static function fetch() {
      $order = new stdClass();
      $business_types = array("Bus", "Private Transfer", "Ferry");
      shuffle($business_types);
      $business_type = $business_types[0];

      $order->token        = time();
      $order->amount       = 10;
      $order->product_desc = "${business_type} service";
      return $order;
    }
  }