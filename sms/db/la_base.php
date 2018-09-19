<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/5
 * Time: 上午9:39
 */
function get_sms_la_base_info($key_code)
{
    $db = new DB_COM();
    $sql = "SELECT * FROM la_base WHERE key_code = '{$key_code}' and type = 2";
    $db->query($sql);
    $rows = $db->fetchAll();
    return $rows;
}

function ins_upload_file_service($data_base)
{
    $db = new DB_COM();
    $sql = $db ->sqlInsert("la_base", $data_base);
    $q_id = $db->query($sql);
    if ($q_id == 0)
        return false;
    return true;
}


function upd_sms_service_flag($key_code)
{
    $db = new DB_COM();
    $sql = "UPDATE la_base SET sms_service = 1 WHERE key_code = '{$key_code}'";

    $db->query($sql);
    $count = $db->affectedRows();
    return $count;
}

function get_la_base_info($key_code)
{
    $db = new DB_COM();
    $sql = "SELECT * FROM la_base where key_code = '{$key_code}' limit 1";
    $db->query($sql);
    $rows = $db->fetchRow();
    return $rows;
}