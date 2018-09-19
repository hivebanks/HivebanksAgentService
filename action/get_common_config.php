<?php
require_once '../inc/common.php';
require_once 'db/la_base.php';
require_once 'db/com_option_config.php';
header("cache-control:no-cache,must-revalidate");
header("Content-Type:application/json;charset=utf-8");

php_begin();

$args = array('key_code');
chk_empty_args('GET', $args);
//$token = get_arg_str('GET', 'token', 128);
//$us_id = check_token($token);

// 密码HASH
$key_code = get_arg_str('GET', 'key_code');

$row = get_info_by_key_code($key_code);

// 返回数据做成
$rtn_ary = array();
$rtn_ary['errcode'] = '0';
$rtn_ary['errmsg'] = '';
$rtn_ary['rows'] = $row;
$rtn_str = json_encode($rtn_ary);
php_end($rtn_str);
