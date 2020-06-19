<?php
    require_once("api.php");
    $api = new API;
    if(isset($_POST['name']) && isset($_POST['quan']) && isset($_POST['web']) && isset($_POST['diachi']) && isset($_POST['nhanxet']) && isset($_POST['danhgia']) && isset($_POST['lat']) && isset($_POST['long']))
    {
        try
        {
            $name = $_POST['name'];
            $quan = $_POST['quan'];
            $web = $_POST['web'];
            $diachi = $_POST['diachi'];
            $nhanxet = $_POST['nhanxet'];
            $danhgia = $_POST['danhgia'];
            $lat = $_POST['lat'];
            $long = $_POST['long'];
            //
            $result = $api->execute(sprintf('INSERT INTO vitri(name,address,lat,lon,description,evaluate) VALUES("%s","%s",%f,%f,"%s",%d)',$name,$diachi,$lat,$long,$nhanxet,$danhgia));
            if($result)
            {
                $data = $api->get_all_sql_results('SELECT * FROM vitri',['id','name']);
                echo $api->get_result(200,$data,'thành công');
            }else{
                echo $api->get_result(404,null,'không thể thêm vị trí');
            }
            //lấy list các dữ liệu
        }catch(Exception $e)
        {
            echo $api->get_result(404,null,'không thể thêm vị trí');
        }
        
    }else{
        echo $api->get_result(401,null,'yêu cầu đầy đủ các tham số(name,)');
        //var_dump($_POST);
    }
?>