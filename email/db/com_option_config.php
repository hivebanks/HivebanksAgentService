<?php
/**
 * Created by IntelliJ IDEA.
 * User: liangyi
 * Date: 2018/9/12
 * Time: 上午11:10
 */

function get_email_la_base_info($key_code)
{
    $db = new DB_COM();
    $sql = "SELECT * FROM la_base WHERE key_code = '{$key_code}' and type = 3";
    $db->query($sql);
    $rows = $db->fetchAll();
    return $rows;
}
