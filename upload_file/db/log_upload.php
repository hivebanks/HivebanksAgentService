<?php
/**
 * Created by PhpStorm.
 * User: ahino
 * Date: 2018/9/6
 * Time: 下午2:08
 */

/**
 * @param $data
 * @return bool
 * 记录上传记录
 */
function action_log_upload($data){

    $db = new DB_COM();
    $sql = $db->sqlInsert("log_upload",$data);
    $q_id = $db->query($sql);
    if($q_id==0)
        return false;
    return true;

}

function list_log_upload($la_id){

}