<?php
/**
 * Created by IntelliJ IDEA.
 * User: liangyi
 * Date: 2018/9/12
 * Time: 下午5:21
 */

function upd_email_num($us_id,$base_amount,$email_num)
{
    $db = new DB_COM();
    $sql = "UPDATE la_base SET base_amount = '{$base_amount}' , email_num = '{$email_num}'  WHERE us_id = '{$us_id}'";
    $db -> query($sql);
    $count = $db -> affectedRows();
    return $count;
}

function upd_sms_num($us_id,$base_amount,$sms_num)
{
    $db = new DB_COM();
    $sql = "UPDATE la_base SET base_amount = '{$base_amount}' , sms_num = '{$sms_num}'  WHERE us_id = '{$us_id}'";
    $db -> query($sql);
    $count = $db -> affectedRows();
    return $count;
}

function upd_upload_file_num($us_id,$base_amount,$upload_file_num)
{
    $db = new DB_COM();
    $sql = "UPDATE la_base SET base_amount = '{$base_amount}' , upload_file_num = '{$upload_file_num}'  WHERE us_id = '{$us_id}'";
    $db -> query($sql);
    $count = $db -> affectedRows();
    return $count;
}

function get_la_base_info($us_id)
{
    $db = new DB_COM();
    $sql = "SELECT * FROM la_base WHERE us_id = '{$us_id}'";
    $db->query($sql);
    $rows = $db->fetchRow();
    return $rows;
}
function get_us_id_by_variable($email)
{
    $db = new DB_COM();
    $sql = "SELECT * FROM la_base WHERE email = '{$email}' ORDER BY utime DESC LIMIT 1 ";
    $db -> query($sql);
    $row = $db -> fetchRow();
    return $row;
}
function ins_reg_info($data)
{
    $db = new DB_COM();
    $sql = $db->sqlInsert("la_base", $data);
    $q_id = $db->query($sql);
    if ($q_id == 0)
        return false;
    return true;
}

function upd_pass_for_us_id($us_id)
{
    $db = new DB_COM();
    $sql = "UPDATE la_base SET flag = 1 WHERE us_id = '{$us_id}'";
    $db -> query($sql);
    $count = $db -> affectedRows();
    return $count;
}
function upd_reg_flag($us_id)
{
    $db = new DB_COM();
    $sql = "UPDATE la_base SET flag = 9 WHERE us_id = '{$us_id}'";
    $db -> query($sql);
    $count = $db -> affectedRows();
    return $count;
}
function check_pass($us_id,$pass_word_hash)
{
    $db = new DB_COM();
    $sql = "SELECT * FROM la_base WHERE us_id = '{$us_id}' AND pass_word_hash = '{$pass_word_hash}'  AND flag = '1'";
    $db -> query($sql);
    $count = $db -> affectedRows();
    return $count;
}

function upd_ctime_for_us_id($us_id,$time)
{
    $db = new DB_COM();
    $sql = "UPDATE la_base SET ctime = '{$time}' WHERE us_id = '{$us_id}'";
    $db -> query($sql);
    $count = $db -> affectedRows();
    return $count;
}
function get_info_by_id($us_id)
{
    $db = new DB_COM();
    $sql = "SELECT * FROM la_base WHERE us_id = '{$us_id}' ORDER BY utime DESC LIMIT 1 ";
    $db->query($sql);
    $row = $db->fetchRow();
    return $row;
}


function get_info_by_key_code($key_code)
{
    $db = new DB_COM();
    $sql = "SELECT * FROM la_base WHERE key_code = '{$key_code}' LIMIT 1 ";
    $db -> query($sql);
    $row = $db -> fetchAll();
    return $row;
}
