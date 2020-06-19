<?php
    require_once("api.php");
    $api = new API;
    echo $api->get_result(200,$api->get_all_sql_results('SELECT * FROM vitri',['id','name','lat','lon']),'thành công');
?>