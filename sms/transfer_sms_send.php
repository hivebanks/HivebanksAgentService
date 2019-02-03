<?php
/**
 * Created by PhpStorm.
 * User: ahino
 * Date: 2018/10/23
 * Time: 上午11:19
 */

require_once "../inc/common.php";
require_once "db/log_sms.php";
require_once "../plugin/sms/sendSms.php";
require_once "db/la_base.php";

$args = array('cellphone','key_code');
chk_empty_args('POST', $args);
$cellphone = get_arg_str('POST', 'cellphone');

$key_code = get_arg_str('POST', 'key_code');

$row = get_la_base_info($key_code);
if (!$row)
    exit_error("1","非法字段");


$callback = array();
// 验证发送短信(SendSms)接口
$sms = new \Aliyun\DySDKLite\Sms\SMS();
$res_obj = $sms->send_transfer_status($cellphone);
$res_arr = (array) $res_obj;
$res_code = $res_arr['Code'];

$log_data = array();
switch ($res_code){

    case 'OK':
        $data_log['status'] = 1;
        $data_log['log_id'] = get_guid();
        $data_log['key_code'] = $key_code;
        $data_log['action_id'] = 'action_id';
        $data_log['phone'] = $cellphone;
        $data_log['ctime'] = time();
        $data_log['code'] = 1;
        action_log_sms($data_log);
        $callback["errcode"] = '0';
        $callback['errmsg'] = "发送成功";
        echo json_encode($callback);
        exit();


        break;
    default ;
        $data_log['status'] = 0;
        $data_log['log_id'] = get_guid();
        $data_log['key_code'] = $key_code;
        $data_log['action_id'] = 'action_id';
        $data_log['phone'] = $cellphone;
        $data_log['ctime'] = time();
        $data_log['code'] = 1;
        action_log_sms($data_log);
        $callback["errcode"] = '1';
        $callback['errmsg'] = "短信发送失败请稍后重试！";
        echo json_encode($callback);
        exit();
        break;
}

