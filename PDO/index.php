<?php
require_once __DIR__ . '/leam_api.php';
class API{
	funtion Select(){
		$db=new Connect;
		$User	= array();
		$data=$db->prepare('select * from User ORDER BY Id');
		$data->execute();
		while ($OutputData=$data->fetch(PDO::FETCH_ASSOC)) {
			$User[$OutputData['Id']]= array(
				'Id'=>$OutputData['Id'],
				'Name'=>$OutputData['Name'],
				'Lat'=>$OutputData['Lat'],
				'Lng'=>$OutputData['Lng'],
				'web'=>$OutputData['web'],
				'danhgia'=>$OutputData['danhgia']
			);
		}
		return json_encode($User);
	}
}

$API = new API;
header('Content-Type:application/json');
echo $API->Select();
?>