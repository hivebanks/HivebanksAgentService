<?php
/**
 * Created by IntelliJ IDEA.
 * User: liangyi
 * Date: 2018/9/10
 * Time: 下午5:31
 */


require_once "db/asset_account.php";
require_once "db/us_recharge_request.php";
require_once '../inc/common.php';

php_begin();

$args = array('token', 'base_amount');

chk_empty_args('GET', $args);

$base_amount = get_arg_str('GET', 'base_amount');


$token = get_arg_str('GET', 'token', 128);

//验证token
$us_id = check_token($token);


$bit_address_row = get_bit_account($us_id);
if (!$bit_address_row["account_id"])
    exit_error('127', "ba的地址不足");

$data = array();
$data["us_id"] = $us_id;
$data["base_amount"] = $base_amount * Config::base_unit;

$data["tx_time"] = time();
$data["account_id"] = $bit_address_row["account_id"];

$lgn_type = 'phone';
$utime = time();
$ctime = date('Y-m-d H:i:s');
$us_ip = get_ip();
$data['tx_hash'] = hash('md5', $us_id . $lgn_type . $us_ip . $utime . $ctime);

us_recharge_quest($data);

$rtn_data['errcode'] = '0';
$rtn_data['errmsg'] = '';
$rtn_data['bit_address'] = $bit_address_row["bit_address"];
php_end(json_encode($rtn_data));



