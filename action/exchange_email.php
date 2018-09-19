<?php
/**
 * Created by IntelliJ IDEA.
 * User: liangyi
 * Date: 2018/9/12
 * Time: 下午3:50
 */


require_once '../inc/common.php';
require_once 'db/exchange_order.php';
require_once 'db/com_option_config.php';
require_once "db/la_base.php";
header("cache-control:no-cache,must-revalidate");
header("Content-Type:application/json;charset=utf-8");

php_begin();

$args = array('token','type','email_amount');
chk_empty_args('GET', $args);
$token = get_arg_str('GET', 'token', 128);
$type = get_arg_str('GET', 'type');
$email_amount = get_arg_str('GET', 'email_amount');
if ($type != "email")
    exit_error("1","非法类型");
$us_id = check_token($token);

$option_key = get_com_price($type)[0]["option_key"];

$data = array();

$data["type"] = $type;
$data["exchange_amount"] = $email_amount;
$data["base_amount"] = $option_key;
$data["us_id"] = $us_id;
ins_exchange_order($data);

$old_base_amount = get_la_base_info($us_id)["base_amount"];
$new_base_amount = $old_base_amount - $option_key;

$old_email_num = get_la_base_info($us_id)["email_num"];
$new_email_num = $old_email_num + $email_amount;

if(!upd_email_num($us_id,$new_base_amount,$new_email_num))
    exit_error("1","结算错误，请找管理员");
else
    exit_ok();

