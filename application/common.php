<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016/07/18
 * Time: 12:16
 */
use think\Route;

//http://localhost/TP5RC4/public/Index.php/meng/1
Route::resource('Meng','index/Meng');

//http://localhost/TP5RC4/public/Index.php/new/id/1
//Route::rule('new/:id','index/Meng/read');