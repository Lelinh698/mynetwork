<?php
    class User {
        // database connection and table name
        private $conn;
        private $table_name = 'user';
 
        // object properties
        public $user_id;
        public $username;
        public $password;
        public $email;
        public $gender;
        public $birthdate;
        public $address;

        function __construct($db) {
            $this->conn = $db;
        }

        function getAll() {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        function getName(){
            $query = "SELECT username FROM " . $this->table_name . " WHERE user_id = ? limit 0,1";
          
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->user_id);
            $stmt->execute();
          
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
              
            return $row['username'];
        }


        function create() {
            $query = "INSERT INTO " . $this->table_name . "
                SET
                    username=:username, password=:password, email=:email, gender=:gender, birthdate=:birthdate, address=:address";
    
            $stmt = $this->conn->prepare($query);
    
            // posted values
            $this->username=htmlspecialchars(strip_tags($this->username));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->gender=htmlspecialchars(strip_tags($this->gender));
            $this->birthdate=htmlspecialchars(strip_tags($this->birthdate));
            $this->address=htmlspecialchars(strip_tags($this->address));
    
            // bind values 
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":gender", $this->gender);
            $stmt->bindParam(":birthdate", $this->birthdate);
            $stmt->bindParam(":address", $this->address);
    
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
?>