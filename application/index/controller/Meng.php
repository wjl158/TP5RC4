<?php
namespace app\index\controller;
use think\Db;
use think\log;
use think\Controller;
use think\Request;
use think;

class Meng extends Controller{


//��ʶ	��������	����·�ɹ���	��Ӧ����������Ĭ�ϣ�
//index	 GET	       blog	             index
//create GET	       blog/create	     create
//save	 POST	       blog	             save
//read	 GET	       blog/:id	         read
//edit	 GET	       blog/:id/edit	 edit
//update PUT	       blog/:id	         update
//delete DELETE	       blog/:id	         delete
//


    //http://localhost/TP5RC4/public/Index.php/Index/Meng/Index
    //GET  ����·�ɹ��� Meng
    public function Index()
    {
        return "a";
    }

    //http://serverName/index.php/module/controller/action/param/value/...
    //http://localhost/TP5RC4/public/Index.php/ģ��/������/����/��������/����ֵ
    //http://server/module/controller/action/param/value/...
    //http://localhost/TP5RC4/public/Index.php/Index/Meng/read/id/8

    //������·�� http://localhost/TP5RC4/public/Index.php/meng/1     common.php Route::resource('Meng','index/Meng');
    //GET	Meng/:id
    public function read($id){
       return json(Db::query("Select P.UserIDA, P.UserIDB, P.Caption, P.DramaContent, P.CreateTime, P.BkImg, "
           ." U.xm xmA, U.xb xbA, U.HeadImgFileName HeadImgFileNameA,  "
           ." U1.xm xmB, U1.xb xbB, U1.HeadImgFileName HeadImgFileNameB "
           ." from performShow P "
           ." Left Join user U On P.UserIDA = U.UserID"
           ." Left Join user U1 On P.UserIDB = U1.UserID"));
    }

    public function edit($id){
        return "edit";
    }
}