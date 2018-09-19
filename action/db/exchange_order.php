<?php
/**
 * Created by IntelliJ IDEA.
 * User: liangyi
 * Date: 2018/9/12
 * Time: 下午4:02
 */

function ins_exchange_order($data) {

    $db = new DB_COM();
    $sql = $db ->sqlInsert("exchange_order", $data);
    $q_id = $db->query($sql);
    if (!$q_id){
        exit_error("133", "创建订单失败");
    }

    return $q_id;
}
