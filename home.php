<?php
    include('header.php');
    
    // include database and object files
    include_once 'objects/Post.php';
    include_once 'objects/User.php';
  
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
    
    // pass connection to objects
    $post = new Post($db);
    $user = new User($db);
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container">
            <div class="row">
                <div id="post-block" class="col-sm-12">
                    <form action="home.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <textarea name="content" id="content" class="form-control" placeholder="What's in your mind?"></textarea>
                            <br>
                            <label class="btn btn-default" id="image_upload_button">Select image
                                <input type="file" name="upload_image" style="display: none;">
                            </label>
                            <button id="btn-post" class="btn btn-primary" name="post">Post</button>
                        </div>
                    </form>
                    <?php
                        $user_id = $_SESSION['user_id'];
                        if (isset($_POST['post'])) {
                            $post->user_id = $user_id;
                            $post->content = $_POST['content'];
                            $post->upload_image = $_FILES['upload_image']['name'];
                            $image_tmp = $_FILES['upload_image']['tmp_name'];
                            $post->time = time();
                
                            if(strlen($post->upload_image) > 1 && strlen($post->content) > 1) {
                                move_uploaded_file($image_tmp, 'imagepost/$upload_image');
                                
                                if($post->create()) {
                                    // echo "<div class='alert alert-success'>Product was created.</div>";
                                    echo "<script>window.open('home.php', '_self')</script>";
                                }
                
                                exit();
                            } else if($post->upload_image == '' && $post->content == '') {
                                echo "<script>alert('Error when uploading.')</script>";
                                echo "<script>window.open('home.php', '_self')</script>";
                            } else if ($post->content == '') {
                                move_uploaded_file($image_tmp, 'imagepost/' . $post->upload_image);
                
                                if($post->create()) {
                                    echo "<script>window.open('home.php', '_self')</script>";
                                }
                            } else {
                
                                if($post->create()) {
                                    echo "<script>window.open('home.php', '_self')</script>";
                                }
                            }
                        }
                    ?>
                </div>
            </div>
            <h2 style="text-align: center;">Newfeeds</h2>
            <!-- <div class="row"> -->
                <!-- <div> -->
                    <?php
                        $posts = $post->getAll();
                        foreach($posts as $post):
                    ?>
                    <div class="row">
                        <div class="col-sm-2"></div>

                        <div id="post" class="col-sm-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img class="img-circle img-bordered-sm" src="imagepost/$upload_image" style="height:70px; width:70px;">
                                        </div>

                                        <div class="col-sm-6">
                                            <p><strong>
                                                <?php 
                                                    $user->id = $post['user_id'];
                                                    echo($user->getName());
                                                ?>
                                            </strong></p>
                                            <h6><?php echo "Updated at " . date('M jS \'y g:ia:', $post['time'])?></h6>
                                        </div>

                                        <div class="col-sm-4"></div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p><?php echo $post['content'] ?></p>
                                            <img src="imagepost/$upload_image" style="height:auto; width:100%;">
                                        </div>
                                    </div>
                                </div>
                                    <!-- /.card-body -->

                                <div class="card-footer">
                                    <p>
                                        <span class="float-right">
                                            <a href="#" class="link-black text-sm">
                                                <i class="far fa-comments mr-1"></i> Comments (5)
                                            </a>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2"></div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                <!-- </div> -->
            <!-- </div> -->

    </section>
    <!-- /.content -->
</div>
<?php include_once('footer.php') ?>