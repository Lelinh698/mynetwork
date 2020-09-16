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
                'userid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(16),
                password VARCHAR(16),
                email VARCHAR(255),
                gender VARCHAR(16),
                birthdate DATE,
                address VARCHAR(255)');
                
    // createTable('messages',
    //             'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //             auth VARCHAR(16),
    //             recip VARCHAR(16),
    //             pm CHAR(1),
    //             time INT UNSIGNED,
    //             message VARCHAR(4096),
    //             INDEX(auth(6)),
    //             INDEX(recip(6))');

    createTable('messages',
                'mss_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                mss_content VARCHAR(4096),
                mss_from VARCHAR(145),
                mss_to VARCHAR(145),
                mss_status CHAR(1), 
                mss_type CHAR(1),
                mss_datetime INT UNSIGNED');

    createTable('friends',
                'user VARCHAR(16),
                friend VARCHAR(16),
                INDEX(user(6)),
                INDEX(friend(6))');

    // createTable('profiles',
    //             'user VARCHAR(16),
    //             text VARCHAR(4096),
    //             INDEX(user(6))');

     createTable('post',
                'postid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                content VARCHAR(4096),
                time INT UNSIGNED,
                author VARCHAR(255)');
?>
<br>...done.
</body>
</html>