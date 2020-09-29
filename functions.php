<?php
    $dbhost = 'localhost';
    $dbname = 'mynetwork';
    $dbuser = 'root';
    $dbpass = '';
    $appname = "My Network";

    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if ($connection->connect_error) die($connection->connect_error);
    
    function createTable($name, $query)
    {
        queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
        echo "Table '$name' created or already exists.<br>";
    }

    function queryMysql($query)
    {
        global $connection;
        $result = $connection->query($query);
        if (!$result) die($connection->error);
        return $result;
    }

    function destroySession()
    {
        $_SESSION=array();
        
        if (session_id() != "" || isset($_COOKIE[session_name()]))
            setcookie(session_name(), '', time()-2592000, '/');
        
        session_destroy();
    }
    
    function sanitizeString($var)
    {
        global $connection;
        $var = strip_tags($var);
        $var = htmlentities($var);
        $var = stripslashes($var);
        return $connection->real_escape_string($var);
    }
    
    function showProfile($user)
    {
        if (file_exists("$user.jpg"))
        echo "<img src='$user.jpg' style='float:left;'>";
        
        $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
        
        if ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
        }
    }

    function getThreeMessages($user)
    {
        $data = [];
        $result = queryMysql("SELECT * FROM messages 
                            WHERE mss_from='$user' OR mss_to='$user'
                            GROUP BY (CASE WHEN mss_from='$user' THEN mss_to ELSE mss_from END) 
                            ORDER BY mss_datetime desc");

        if($result->num_rows)
        {
            for($i=0; $i<$result->num_rows; $i++)
            {
                $row = $result->fetch_array(MYSQLI_ASSOC);

                $temp = array('content' => $row['mss_content'],
                              'time' => $row['mss_datetime'],
                            );

                if ($row['mss_from'] == $user) $temp['friend'] = $row['mss_to'];
                else $temp['friend'] = $row['mss_from'];
                
                array_push($data,$temp);
            }
            return $data;
        }

    }

    function insertPost($user_id) {
        if (isset($_POST['post'])) {

            $content = $_POST['content'];
            $upload_image = $_FILES['upload_image']['name'];
            $image_tmp = $_FILES['upload_image']['tmp_name'];
            $time = time();

            if(strlen($upload_image) > 1 && strlen($content) > 1) {
                move_uploaded_file($image_tmp, 'imagepost/$upload_image');
                $query = "INSERT INTO post VALUES(NULL, '$user_id', '$content', '$upload_image', '$time')";

                $result = queryMysql($query);

                if($result) {
                    echo "<script>window.open('home.php', '_self')</script>";
                }

                exit();
            } else if($upload_image == '' && $content == '') {
                echo "<script>alert('Error when uploading.')</script>";
                echo "<script>window.open('home.php', '_self')</script>";
            } else if ($content == '') {
                move_uploaded_file($image_tmp, 'imagepost/' . $upload_image);
                
                $query = "INSERT INTO post VALUES(NULL, '$user_id', '$content', '$upload_image', '$time')";

                $result = queryMysql($query);

                if($result) {
                    echo "<script>window.open('home.php', '_self')</script>";
                }
            } else {
                $query = "INSERT INTO post VALUES(NULL, '$user_id', '$content', '$upload_image', '$time')";

                $result = queryMysql($query);

                if($result) {
                    echo "<script>window.open('home.php', '_self')</script>";
                }
            }
        }
    }

    function getPost($user_id) {

        $data = [];
        $query = "SELECT * FROM post WHERE user_id='$user_id'";

        $username = "SELECT username FROM user WHERE user_id='$user_id'";

        $result = queryMysql($query);

        if ($result->num_rows)
        {
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                // $post_id = $row['post_id'];
                // $content = $row['content'];
                // $upload_image = $row['upload_image'];
                // $time = $row['time'];

                $temp = array(
                    'post_id' => $row['post_id'],
                    'content' => $row['content'],
                    'upload_image' => $row['upload_image'],
                    'time' => $row['time']
                );

                array_push($data, $temp);
            }            
        }
        return $data;
    }
?>