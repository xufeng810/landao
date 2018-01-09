<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Db;
use think\Request;
use think\Cache;
    /**
     *无限分类树
     * @author dxf
     * @param array  需有对应的id和pid
     * @return  array
    */

    function generateTree($list){
    	foreach ($list as $k => $v){ 
    	            $arr[$v['id']]=$v;
    	 }
    	foreach($arr as $item){
    	        $arr[$item['pid']]['son'][$item['id']] = &$arr[$item['id']];
    	}
    	return isset($arr[0]['son']) ? $arr[0]['son'] : array();
    }

    /**
     * 检查邮箱是否合法 
     * @author dxf
     * @param STRING $email 要检查的邮箱名
     * @return  TRUE or FALSE
     */
    function is_email($email) {
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if (preg_match($pattern, $email)){
        	return true;
        }else{
        	return false;
        }
    }
    /**
    * 验证手机号是否正确
    * @author dxf
    * @param INT $mobile
    * @return  TRUE or FALSE
    移动：134、135、136、137、138、139、150、151、152、157、158、159、182、183、184、187、188、178(4G)、147(上网卡)；
    联通：130、131、132、155、156、185、186、176(4G)、145(上网卡)；
    电信：133、153、180、181、189 、177(4G)；
    卫星通信：1349
    虚拟运营商：170
    */
    function is_Mobile($mobile) {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
    }
   function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){  
        if(is_array($arrays)){  
            foreach ($arrays as $array){  
                if(is_array($array)){  
                    $key_arrays[] = $array[$sort_key];  
                }else{  
                    return false;  
                }  
            }  
        }else{  
            return false;  
        } 
        array_multisort($key_arrays,$sort_order,$sort_type,$arrays);  
        return $arrays;  
    } 
    //权限按钮隐藏检查
    function ruleCheck($value){
        $rule_ress=Db::name('auth_rule')->where('name',$value)->find();
        if($rule_ress){
                if($rule_ress['status']==0){
                    return 'rulecheck';
                }
                $ausess=session('ausess');
                $exit=in_array($rule_ress['id'], explode(',',$ausess['rules']));
                if(empty($exit)){
                    return 'rulecheck';
                }
            }
    }

    function tmhash($str){ 
        $hash = 0;  
        $s = md5($str);  
        $seed = 5;  
        $len  = 32;  
        for ($i = 0; $i < $len; $i++) {   
            $hash = ($hash << $seed) + $hash + ord($s{$i});  
            //echo $hash."<br/>".ord($s{$i})."<br/>";
        }   
        return $hash & 0x7FFFFFFF;  
    }
    
    //获取用户mongo的collection
    function getMongoDbCollection($uqcode){
        $surfix = fmod($uqcode,100);
        if(!$surfix){
            return 'riskdata';
        }   
        return 'riskdata_' . $surfix;
    }
    /**
     * 邮件发送
     * @param $to    接收人
     * @param string $subject   邮件标题
     * @param string $content   邮件内容(html模板渲染后的内容)
     * @throws Exception
     * @throws phpmailerException
     */ 
    function send_email($to,$subject='',$content=''){
        vendor('phpmailer.PHPMailerAutoload'); ////require_once vendor/phpmailer/PHPMailerAutoload.php';
        //判断openssl是否开启
        $openssl_funcs = get_extension_funcs('openssl');
        if(!$openssl_funcs){
            return array('status'=>-1 , 'msg'=>'请先开启openssl扩展');
        }
        $mail = new PHPMailer;
        $config = config('smtp');
        $mail->CharSet  = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //调试输出格式
        //$mail->Debugoutput = 'html';
        //smtp服务器
        $mail->Host = $config['server'];
        //端口 - likely to be 25, 465 or 587
        $mail->Port = $config['port'];

        if($mail->Port == 465) $mail->SMTPSecure = 'ssl';// 使用安全协议
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //用户名
        $mail->Username = $config['username'];
        //密码
        $mail->Password = $config['password'];
        //Set who the message is to be sent from
        $mail->setFrom($config['from']);
        //回复地址
        //$mail->addReplyTo('replyto@example.com', 'First Last');
        //接收邮件方
        if(is_array($to)){
            foreach ($to as $v){
                $mail->addAddress($v);
            }
        }else{
            $mail->addAddress($to);
        }

        $mail->isHTML(true);// send as HTML
        //标题
        $mail->Subject = $subject;
        //HTML内容转换
        $mail->msgHTML($content);
        //Replace the plain text body with one created manually
        //$mail->AltBody = 'This is a plain-text message body';
        //添加附件
        //$mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        if (!$mail->send()) {
           return array('status'=>-1 , 'msg'=>'发送失败: '.$mail->ErrorInfo);
        } else {
            return array('status'=>1 , 'msg'=>'发送成功');
        }
    }
    /**
     *日志记录，按照"Ymd.log"生成当天日志文件
     * 日志路径为：入口文件所在目录/logs/$type/当天日期.log.php，/logs/error/20120105.log.php
     * @param string $type 日志类型，对应logs目录下的子文件夹名
     * @param string $content 日志内容
     * @return bool true/false 写入成功则返回true
     */
     function writelog($type="",$content=""){
        if(!$content || !$type){
            return FALSE;
        }
        $dir=getcwd().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.$type;
        print_r($dir);
        if(!is_dir($dir)){ 
            if(!mkdir($dir)){
                return false;
            }
        }
        $filename=$dir.DIRECTORY_SEPARATOR.date("Ymd",time()).'.log.php';
        if(is_file($filename)){
            $logs=include $filename;
        }
        $logs[]=array("time"=>date("Y-m-d H:i:s"),"ip"=>Request::instance()->ip(),"content"=>$content);
        $str="<?php \r\n return ".var_export($logs, true).";";
        if(!$fp=@fopen($filename,"wb")){
            return false;
        }           
        if(!fwrite($fp, $str))return false;
        fclose($fp);
        return true;
    }
        /**
     * 发送HTTP请求
     * @param string $url 请求地址
     * @param string $method 请求方式 GET/POST
     * @param string $refererUrl 请求来源地址
     * @param array $data 发送数据
     * @param string $contentType
     * @param string $timeout
     * @param string $proxy
     * @return boolean
     */
    function send_request($url, $data, $refererUrl = '', $method = 'GET', $contentType = 'application/json', $timeout= 30, $proxy = false) {
        $ch = null;
        if('POST' === strtoupper($method)) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HEADER,0 );
            curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            if ($refererUrl) {
                curl_setopt($ch, CURLOPT_REFERER, $refererUrl);
            }
            if($contentType) {
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:'.$contentType));
            }
            if(is_string($data)){
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            }
        } else if('GET' === strtoupper($method)) {
            if(is_string($data)) {
                $real_url = $url. (strpos($url, '?') === false ? '?' : ''). $data;
            } else {
                $real_url = $url. (strpos($url, '?') === false ? '?' : ''). http_build_query($data);
            }

            $ch = curl_init($real_url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:'.$contentType));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            if ($refererUrl) {
                curl_setopt($ch, CURLOPT_REFERER, $refererUrl);
            }
        } else {
            $args = func_get_args();
            return false;
        }
        if($proxy) {
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
        }
        $ret = curl_exec($ch);
        $info = curl_getinfo($ch);
        $contents = array(
                'httpInfo' => array(
                        'send' => $data,
                        'url' => $url,
                        'ret' => $ret,
                        'http' => $info,
                )
        );  
        curl_close($ch);
        return $ret;
    }
    /**
     * 获取缓存或者更新缓存
     * @param string $config_key 缓存文件名称
     * @param array $data 缓存数据  array('k1'=>'v1','k2'=>'v3')
     * @return array or string or bool
     */
    function tpCache($type=0){
        if($type==1){
            $ress=Db::name('config')->select();
            foreach ($ress as $k => $v) {
            $list[$v['id']]=$v['value'];
            }
            Cache::set('config',$list,86400);
            $rre=Cache::get('config');
            return $rre;
        }else{
            $rre=Cache::get('config');
            if($rre){
                return $rre;
            }else{
                $ress=Db::name('config')->select();
                foreach ($ress as $k => $v) {
                    $list[$v['id']]=$v['value'];
                }
                Cache::set('config',$list,86400);
                $rre=Cache::get('config');
                return $rre;
            }  
        }
    }
