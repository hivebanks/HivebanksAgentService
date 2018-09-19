<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/6
 * Time: 上午10:27
 */


require_once "../inc/common.php";
require_once "db/la_base.php";
$args = array('key_code');
chk_empty_args('POST', $args);
$key_code = get_arg_str('POST', 'key_code');

$row = get_upload_file_la_base_info($key_code);
// 返回数据做成
$rtn_ary = array();
$rtn_ary['errcode'] = '0';
$rtn_ary['errmsg'] = '';
$rtn_ary['rows'] = $row ? $row:[];

$rtn_str = json_encode($rtn_ary);
php_end($rtn_str);

