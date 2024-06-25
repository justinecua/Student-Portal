<?php
namespace MyApp;

class ChatUserInfo{
    public $mysqli;

    public function __construct(){ //initialize object properties
        $this->mysqli = new \mysqli("localhost", "root", "", "chs_studentportal");
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }
    
    function IncludeUserInfo($accID){
        $accID = $this->mysqli->real_escape_string($accID);

        $query = "SELECT student.*, accounts.*
                  FROM accounts
                  LEFT JOIN student ON accounts.Student_ID = student.Student_ID
                  WHERE accounts.Account_ID = '$accID'";

        $result = $this->mysqli->query($query);
        
		$UserInfo = [
			'FName' => [],
			'ImageProf' => []
		];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $UserInfo['FName'][] = $row["FirstName"];
				$UserInfo['ImageProf'][] = $row["Student_PicturePath"];
            }
            $result->free();
        } else {
            echo "Error in query: " . $this->mysqli->error;
        }

        return $UserInfo;
	}

	
}

?>