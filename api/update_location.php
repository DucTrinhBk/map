<?php
    require_once("api.php");
    $api = new API;
if(isset($_POST['lat']) && isset($_POST['long']))
{
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    //
    $result = $api->execute('Update vitri Set lat = '.$lat.' , lon = '.$long.' WHERE id = 1');
    if($result)
    {
        $data = $api->get_all_sql_results('SELECT * FROM vitri',['id','name']);
        echo $api->get_result(200,$data,'thành công');
    }else{
        echo $api->get_result(404,null,'cập nhật vị trí thất bại');
    }
    //lấy list các dữ liệu
    
}else{
    echo json_encode(array('error' => '1', 'message' => 'Không tìm thấy kinh độ vĩ độ người dùng'),JSON_UNESCAPED_UNICODE);
}
?>