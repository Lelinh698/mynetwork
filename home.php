<!DOCTYPE html>
<html>
	<head>
		<title>My network</title>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<meta http-equiv='x-ua-compatible' content='ie=edge'>
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="fontawesome-free/css/all.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="css/adminlte.min.css">
		<!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.bundle.min.js'></script>
		<script src='js/adminlte.min.js'></script>
	</head>
	<body class="hold-transition layout-top-nav">
    <div class="wrapper">
	<?php
		include('header.php');
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
                            insertPost($user_id); 
                        ?>
                    </div>
                </div>
                <h2 style="text-align: center;">Newfeeds</h2>
                <div class="row">
                    <!-- <div> -->
                        <?php
                            $posts = getPost($user_id);
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
                                                <p><strong>Username</strong></p>
                                                <h6>Updated at ....</h6>
                                            </div>

                                            <div class="col-sm-4"></div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet felis ullamcorper, consequat felis non, molestie velit. Proin et suscipit metus. Integer sed neque et purus imperdiet accumsan eu ac enim. Duis hendrerit purus ex, non finibus nulla ornare eget. Vestibulum vehicula ultrices tellus, vel semper urna efficitur sit amet. Vivamus tristique, dolor at volutpat ullamcorper, dui nunc feugiat ligula, eu dictum lorem risus eget nisi. Suspendisse potenti. Cras tortor dui, tempus at malesuada ut, bibendum at massa. Praesent egestas, massa at sagittis finibus, nunc nibh faucibus nisi, eu convallis lacus massa in ex. Phasellus aliquam nunc nibh. Etiam eros quam, efficitur et ullamcorper vel, hendrerit et massa. Sed consequat erat eu mauris dignissim porta. Morbi volutpat gravida turpis. Integer nisl leo, semper feugiat mauris eu, rutrum imperdiet sapien.
                                                </p>
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
                </div>

        </section>
		<!-- /.content -->
	</div>
	</div>
	</body>
</html>