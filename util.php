<?php
  /*
 * Created on Fri Jul 12 2019
 *
 * Copyright (c) 2019 BookMeBus Plc.
 */

  class Util {
    static $enable_log = false;
    static function debug($text, $data, $pretty=true) {
      
      if(!Util::$enable_log)
        return;
   
      ob_start();

      if( is_array($data) || is_object($data) ) {
        echo $text;
        print_r($data);
      }
      else {
        echo $text;
        echo $data;
      }

      $content = ob_get_clean();
      $result =  $pretty ? "<pre>$content</pre>" : $content ;
      echo $result;
    }
  }