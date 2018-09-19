<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/6
 * Time: 上午10:14
 */

require_once "../inc/common.php";
require_once "db/la_base.php";

$args = array('key_code');

chk_empty_args('POST', $args);


$key_code = get_arg_str('POST', 'key_code');

$callback = array();
//if(get_email_la_base_info($key_code))
//    exit_error("1","请勿重复提交");

if(upd_upload_file_service_flag($key_code)){
    $callback["errcode"] = '0';
    $callback['errmsg'] = "提交成功";
    echo json_encode($callback);
    exit();
}
else{
    $callback["errcode"] = '1';
    $callback['errmsg'] = "提交失败";
    echo json_encode($callback);
    exit();
}

