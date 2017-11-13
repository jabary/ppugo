<?php

 class MyDb{

 	private static $connection;

 	public function connect(){

 		if(!isset(self::$connection)){
 			$config = parse_ini_file('config.ini');
 			self::$connection = new mysqli($config['servername'],$config['username'],$config['password'],$config['dbname']);
 		}

 		if(self::$connection == false){
 			echo "No connection" . self::$connection->connect_error;
 			return false;
 		}

 		return self::$connection;
 	}

 	public function addTres($lat, $lng){

 		$query = "insert into Treasures (latitude,longitude,flag) values ($lat,$lng,0)";
 		$conn = $this->connect();
 		$result = $conn->query($query);
 	}

 	public function receiveGift($player_id){
 		$query = "update players set gift = 1 where id=$player_id";
 		$conn = $this->connect();
 		$result = $conn->query($query);
 		return $result;
 	}

 	public function addPlayer($name,$mobile){
 		$conn = $this->connect();
 		$name = $conn->escape_string($name);
 		$major = $conn->escape_string($mobile);
 		$query = "Insert into players (name,mobile) values ('$name','$mobile')";

 		$result = $conn->query($query);
 		$result = $conn->insert_id;
 		return $result;
 	}

 	public function makeSafe($string){

 	}

 	public function getPlayers(){
 		$query = "Select id,name,mobile,result,ADDTIME(datecreated, '0 3:0:0') AS datefield from players";
 		$conn = $this->connect();
 		$result = $conn->query($query);

 		echo $conn->error;

 		$rows = array();

	    while($row = $result-> fetch_assoc()){

	      $rows[] = $row;

	    }
	      
	    return $rows;

 	}

 	public function getWinnerPlayers(){
 		$query = "Select players.id as pid, Treasures.id as tid, name, mobile, latitude,longitude,ADDTIME(foundtime, '0 3:0:0') AS foundtime,gift from players,Treasures where players.id=Treasures.player_id and Treasures.flag=1 order by foundtime";
 		$conn = $this->connect();
 		$result = $conn->query($query);

 		$rows = array();

	    while($row = $result-> fetch_assoc()){

	      $rows[] = $row;

	    }
	      
	    return $rows;

 	}



 	public function deletePlayer($id){
 		$query = "Delete from players where id=$id";
 		$conn = $this->connect();
 		$result = $conn->query($query);
 		return $result;
 	}

 	public function deleteTres($id){
 		$query = "Delete from Treasures where id=$id";
 		$conn = $this->connect();
 		$result = $conn->query($query);
 		return $result;
 	}

 	public function getAllTres(){

 		$query = "select * from Treasures";
 		$conn = $this->connect();
 		$result = $conn->query($query);

 		$rows = array();

	    while($row = $result-> fetch_assoc()){

	      $rows[] = $row;

	    }
	      
	    return $rows;

 	}

 	public function updateFlag($id,$player_id){
 		$query = "update Treasures set flag = 1,player_id=$player_id,foundtime=NOW() where id=$id";
 		$conn = $this->connect();
 		$result = $conn->query($query);
 		return $result;
 	}

 	public function revertFlag($id){
 		$query = "update Treasures set flag = 0,foundtime=NOW() where id=$id";
 		$conn = $this->connect();
 		$result = $conn->query($query);
 		return $result;
 	}

 	public function updatePlayer($id){
 		$query = "update players set result = 1 where id=$id";
 		$conn = $this->connect();
 		$result = $conn->query($query);
 		return $result;
 	}

 	public function getNotFoundTres(){

 		$query = "select * from Treasures where flag = 0";
 		$conn = $this->connect();
 		$result = $conn->query($query);

 		$rows = array();

	    while($row = $result-> fetch_assoc()){

	      $rows[] = $row;

	    }
	      
	    return $rows;


 	}

 	public function getTresLocations(){
 		 $sql = " SELECT id,latitude,longitude,flag FROM Treasures where flag=0";

	    $conn = $this->connect();
	    $result = $conn->query($sql);

	    echo $conn->error;

	    //create an array
	    $rows = array();

	    while($row = $result-> fetch_assoc()){

	      $rows[] = $row;

	    }
	      
	    return $rows;
 	}

	public function getNearByLocations($x,$y){


	 $sql = " SELECT id,latitude,longitude,flag,
	    ROUND(((360 + DEGREES(ATAN2(SIN(RADIANS(longitude - ".$y.")) * COS(RADIANS(latitude)), COS(RADIANS(".$x.")) * SIN(RADIANS(latitude))- SIN(RADIANS(".$x.")) * COS(RADIANS(latitude)) * COS(RADIANS(longitude - ".$y."))))) % 360) / 22.5) * 22.5
        AS direction,
       (ROUND(( ROUND(((360 + DEGREES(ATAN2(SIN(RADIANS(longitude - ".$y."))*COS(RADIANS(latitude)), COS(RADIANS(".$x.")) * SIN(RADIANS(latitude))- SIN(RADIANS(".$x.")) * COS(RADIANS(latitude))* COS(RADIANS(longitude - ".$y."))))) % 360) / 22.5) * 22.5)*8/360))%8
        AS Fdirection

	   FROM Treasures where flag=0";

	    $conn = $this->connect();
	    $result = $conn->query($sql);

	    echo $conn->error;

	    //create an array
	    $rows = array();

	    while($row = $result-> fetch_assoc()){

	      $rows[] = $row;

	    }
	      
	    return $rows;
	}



 }


?>