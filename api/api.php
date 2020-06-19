<?php
     
require_once("rest.php");
     
class API extends REST {
     
    public $data = "";
    //Enter details of your database
    const DB_SERVER = 'localhost';
    const DB_USER = 'root';
    const DB_PASSWORD = '123456';
    const DB = 'map';
     
    public $db = NULL;
 
    public function __construct(){
        parent::__construct();              // Init parent contructor
        $this->dbConnect();                 // Initiate Database connection
    }
     
    private function dbConnect(){
        if(!$this->db)
            $this->db = mysqli_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD,self::DB);
            if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            mysqli_set_charset($this->db,'utf8');

    }
    public function get_result($_code,$json_result,$message){
        $this->_code = $_code;
        return json_encode(array('error'=>$_code,'data'=>$json_result,'message'=>$message), JSON_UNESCAPED_UNICODE);
    }
    public function get_sql_results($query,$params){
        $result = mysqli_query($this->db,$query);
        $rows = [];
        while(($row = mysqli_fetch_row($result))) {
            for($i = 0;$i<count($params);$i++){
                $rows[$params[$i]] = $row[$i];
            }
        }
        return $rows;
    }

    // lấy list các kết quả
    //$query câu lệnh sql như SELECT,INSERT,UPDATE 
    //$param tên cột định lấy
    public function get_all_sql_results($query,$params){
        $result = mysqli_query($this->db,$query);
        $rows = [];
        $j = 0;
        while(($row = mysqli_fetch_array($result))) {
            $item = [];
            for($i = 0;$i<count($params);$i++){
                $item[$params[$i]] = $row[$params[$i]];
            }
            $rows[$j] = $item;
            $j++;
        }
        return $rows;
    }
    public function query($query){
        return mysqli_query($this->db,$query);
    }
    //đếm số các row bị ảnh hưởng khi truy vấn
    public function execute($query){
       // $result = mysqli_query($this->db,$query);
        return mysqli_query($this->db,$query);
    }
    public function encode_token_api($email){
        $key = 'Dalo-vn-Thamdinhgia';
        $header = [
            'typ' => 'JWT',
		   'alg' => 'HS256'
		  ];		
        $header = base64_encode(json_encode($header));
        $payload = [      
            "iat"=>round(microtime(true) * 1000),
		    "email" => $email];
        $payload = json_encode($payload);		
        $payload = base64_encode($payload);
        // Generates a keyed hash value using the HMAC method
        $signature = hash_hmac('sha256',$header.'.'.$payload, $key);
        return $header.'.'.$payload.'.'.$signature;
    }
}
   /* // Initiiate Library
     
    $api = new API;
    echo $api->get_result(400,'xin chào');*/
?>