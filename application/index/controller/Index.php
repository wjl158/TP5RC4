<?php
namespace app\index\controller;
use think\log;

class Index
{
    public function index()
    {
        Log::write('测试日志信息，这是警告级别，并且实时写入','notice');
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }

    //http://localhost/hello/1  http://localhost/hello/1/1/1/1/1/1
    //规则匹配检测的时候只是对URL从头开始匹配，只要URL地址包含了定义的路由规则就会匹配成功，如果希望完全匹配，可以在路由表达式最后使用$符号，例如：
    public function hello()
    {
        //return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
        $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
        //return ['data'=>$data,'code'=>1,'message'=>'操作完成'];
        $a = __DIR__;
        return xml(['data2'=>$data,'code'=>1,'message'=>'操作完成', 'dir'=>$a]);
    }

    //http://localhost/new/1      Route::rule('new/:id','index/index/mynew');
    public function mynew()
    {
        //return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
        $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
        //return ['data'=>$data,'code'=>1,'message'=>'操作完成'];
        $a = __DIR__;
        return xml(['data3'=>$data,'code'=>1,'message'=>'操作完成', 'dir'=>$a]);
    }



    private function getrww(){
        $raw = '';

// (1) 请求行
        $raw .= $_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI'].' '.$_SERVER['SERVER_PROTOCOL']."\r\n";

// (2) 请求Headers
        foreach($_SERVER as $key => $value) {
            if(substr($key, 0, 5) === 'HTTP_') {
                $key = substr($key, 5);
                $key = str_replace('_', '-', $key);

                $raw .= $key.': '.$value."\r\n";
            }
        }

// (3) 空行
        $raw .= "\r\n";

// (4) 请求Body
        $raw .= file_get_contents('php://input');

        return $raw;
    }

    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        Log::write($_FILES, '图片上传开始11111');
        $file = request()->file('image');  //区分大小写
        // 移动到框架应用根目录/public/uploads/ 目录下
        $file->rule(__NAMESPACE__ .'\Index::getMyFileName');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');

        if($info){
            // 成功上传后 获取上传信息
            echo $info->getExtension(); // 输出 jpg
            echo $info->getFilename(); // 输出 42a79759f284b767dfcb2a0197904287.jpg
            $Req = apache_request_headers();
            $s = '';
            while($color=each($Req)){
                $s = $s.$color['key'];
            }

        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }

    public static function getMyFileName()
    {
        return date('Ymd');

    }



}
