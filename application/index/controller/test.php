<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016/07/11
 * Time: 9:34
 */



  $myarray = array (
      'image' =>
          array (
              'name' => 'short.png',
              'type' => 'image/png',
              'tmp_name' => 'E:\\wampServer\\tmp\\phpD902.tmp',
              'error' => 0,
              'size' => 724063,
          ),
      'image1' => 1,
  );


foreach($myarray as $array =>$a )
{
    if (is_array($a))
    {
        foreach($a as $n => $v)
        {
            echo $n." : ".$v;
            echo "</br>";
        }
    }
    else
    {
        echo $array.':  '.$a;
        echo '</br>';
    }
    echo "</br>";
}
