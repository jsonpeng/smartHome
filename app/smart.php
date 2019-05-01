<?php
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

class Smart{
    //java 多个控制接口
    public static $smartUrl = "http://localhost:8090/api/device/";

    public static function mutiControlRequest($params)
    {
        $params = ['args'=>$params];
        return self::simpleGuzzleRequest(self::$smartUrl.'set_multi_devices','POST',$params);
    }

 /**
     * 简单guzzle请求func
     * @param  string $url    [description]
     * @param  string $method [description]
     * @param  array  $param  [description]
     * @return [type]         [description]
     */
    public static function simpleGuzzleRequest($url= '',$method='GET',$param= [])
    {
        try{

            $client = new Client();
            $url_suffix = '?';
            if(is_array($param) && count($param))
            {
                foreach ($param as $key => $value) 
                {
                    $url_suffix .= $key.'='.$value.'&';
                }
                $url_suffix = substr($url_suffix,0,strlen($url_suffix)-1); 
            }
            $url .= $url_suffix;
            $response = $client->request($method, $url);
            return $response->getBody();
        }catch(Exception $e){
            return '请求异常';
        }
    }

    /**
     * 发起guzzel请求
     */
    public static function guzzleRequest($request_config = array('url'=>'','method'=>'GET','form'=>'','headers'=>''), $type = "api")
    {
        try{
            $client = new Client();
            $response = $client->request($request_config['method'], $request_config['url'], [
                'headers' => isset($request_config['headers']) ? $request_config['headers'] : [] ,
                'form_params' => $request_config['form']
            ]);
            // return ($response);
            #解析结果
            $data = json_decode($response->getBody(),true);
            return zcjy_callback_data($data,0,$type);
        } catch (Exception $e) {
            return zcjy_callback_data('请求异常',1,$type);
        }
       
    }
 }