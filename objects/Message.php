<?php
    class Post {
        // database connection and table name
        private $conn;
        private $table_name = 'messages';
 
        // object properties
        private $mss_id;
        private $mss_content;
        private $mss_from;
        private $mss_to;
        private $mss_status;
        private $mss_type;
        private $mss_datetime;

        function __construct($db) {
            $this->conn = $db;
        }

        function getAll() {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }
    }
?>