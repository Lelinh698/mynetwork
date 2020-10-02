<?php
    class Post {
        // database connection and table name
        private $conn;
        private $table_name = 'post';
 
        // object properties
        public $post_id;
        public $user_id;
        public $content;
        public $upload_image;
        public $time;

        function __construct($db) {
            $this->conn = $db;
        }

        function getAll() {
            $data = [];
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $temp = array(
                    'post_id' => $row['post_id'],
                    'user_id' => $row['user_id'],
                    'content' => $row['content'],
                    'upload_image' => $row['upload_image'],
                    'time' => $row['time']
                );

                array_push($data, $temp);
            }
            return $data;
        }

        function create() {
            $query = "INSERT INTO " . $this->table_name . "
                SET
                    user_id=:user_id, content=:content, upload_image=:upload_image, time=:time";
    
            $stmt = $this->conn->prepare($query);
    
            // posted values
            $this->user_id=htmlspecialchars(strip_tags($this->user_id));
            $this->content=htmlspecialchars(strip_tags($this->content));
            $this->upload_image=htmlspecialchars(strip_tags($this->upload_image));
            $this->time=htmlspecialchars(strip_tags($this->time));

            // bind values 
            $stmt->bindParam(":user_id", $this->user_id);
            $stmt->bindParam(":content", $this->content);
            $stmt->bindParam(":upload_image", $this->upload_image);
            $stmt->bindParam(":time", $this->time);
    
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
?>