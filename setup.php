<!DOCTYPE html>
<html>
<head>
<title>Setting up database</title>
</head>
<body>
<h3>Setting up...</h3>
<?php
    require_once 'functions.php';

    createTable('user',
                'user_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(16) NOT NULL,
                password VARCHAR(16) NOT NULL,
                email VARCHAR(255) NOT NULL,
                gender VARCHAR(16),
                birthdate DATE,
                address VARCHAR(255)');

    createTable('messages',
                'mss_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                mss_content VARCHAR(4096),
                mss_from VARCHAR(145),
                mss_to VARCHAR(145),
                mss_status CHAR(1), 
                mss_type CHAR(1),
                mss_datetime INT UNSIGNED');

    createTable('relationships',
                'user_id_a INT NOT NULL,
                user_id_b INT NOT NULL,
                status varchar(1) NOT NULL,
                CONSTRAINT PK_Relationships PRIMARY KEY (user_id_a, user_id_b)');

     createTable('post',
                'post_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                content VARCHAR(4096),
                upload_image VARCHAR(255),
                time INT UNSIGNED');
?>
<br>...done.
</body>
</html>