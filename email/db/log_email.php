<?php
/**
 * Created by PhpStorm.
 * User: ahino
 * Date: 2018/9/6
 * Time: 下午2:56
 */


/**
 * @param $data
 * @return bool
 * 记录邮箱发送记录
 */
function action_log_email($data){

    $db = new DB_COM();
    $sql = $db->sqlInsert("log_email",$data);
    $q_id = $db->query($sql);
    if($q_id==0)
        return false;
    return true;

}

function list_log_email($la_id){

}