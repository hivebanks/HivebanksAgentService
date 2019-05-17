<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/6
 * Time: 上午9:54
 */


require_once "../inc/common.php";
require_once "db/log_sms.php";
require_once "../plugin/sms/sendSms.php";
require_once "db/la_base.php";

$args = array('cellphone','code');
chk_empty_args('POST', $args);
$cellphone = get_arg_str('POST', 'cellphone');
$code = get_arg_str('POST', 'code');
$country_code = get_arg_str('POST', 'country_code');
$key_code = get_arg_str('POST', 'key_code');

$row = get_la_base_info($key_code);
if (!$row)
    exit_error("1","非法字段");


$callback = array();

if($country_code == 86) {
// 验证发送短信(SendSms)接口
    $sms      = new \Aliyun\DySDKLite\Sms\SMS();
    $res_obj  = $sms->send_sms($cellphone, $code);
    $res_arr  = (array)$res_obj;
    $res_code = $res_arr['Code'];

    $log_data = [];
    switch ($res_code) {

        case 'OK':
            $data_log['status']    = 1;
            $data_log['log_id']    = get_guid();
            $data_log['key_code']  = $key_code;
            $data_log['action_id'] = 'action_id';
            $data_log['phone']     = $cellphone;
            $data_log['ctime']     = time();
            $data_log['code']      = $code;
            action_log_sms($data_log);
            $callback["errcode"] = '0';
            $callback['errmsg']  = "发送成功";
            echo json_encode($callback);
            exit();


            break;
        default;
            $data_log['status']    = 0;
            $data_log['log_id']    = get_guid();
            $data_log['key_code']  = $key_code;
            $data_log['action_id'] = 'action_id';
            $data_log['phone']     = $cellphone;
            $data_log['ctime']     = time();
            $data_log['code']      = $code;
            action_log_sms($data_log);
            $callback["errcode"] = '1';
            $callback['errmsg']  = "短信发送失败请稍后重试！";
            echo json_encode($callback);
            exit();
            break;
    }

}else{

    $url = "http://intapi.253.com/send/json";
    $post_data = array();
    $post_data["account"] = 'I2605473';
    $post_data["password"] = 'OjJfYT1ouU48e5';
    $post_data["msg"] = 'Your code is '. $code . ' . [Windwin Tec] . ';
    $post_data["mobile"] = $country_code.$cellphone;
    $data_string = json_encode($post_data);

    $ch = curl_init('http://intapi.253.com/send/json');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $output = curl_exec($ch);

    curl_close($ch);
    $output_array = json_decode($output, true);
    if($output_array['code'] == 0)
    {
        $callback["errcode"] = '0';
        $callback['errmsg']  = "发送成功";
        echo json_encode($callback);
        exit();
    }
    $callback["errcode"] = '1';
    $callback['errmsg']  = "短信发送失败请稍后重试！";
    echo json_encode($callback);
    exit();
}