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

		<!-- Main content -->
		<section class="content">
		<div class="container-fluid">
			<div class="row">
			<div class="col-md-3">

				<!-- Profile Image -->
				<div class="card card-primary card-outline">
				<div class="card-body box-profile">
					<div class="text-center">
					<img class="profile-user-img img-fluid img-circle"
						src="../../dist/img/user4-128x128.jpg"
						alt="User profile picture">
					</div>

					<?php $username = $_GET['uname'];
					echo "<h3 class='profile-username text-center'>". $username ."</h3> "?>
					

					<p class="text-muted text-center">Software Engineer</p>

					<ul class="list-group list-group-unbordered mb-3">
					<li class="list-group-item">
						<b>Followers</b> <a class="float-right">1,322</a>
					</li>
					<li class="list-group-item">
						<b>Following</b> <a class="float-right">543</a>
					</li>
					<li class="list-group-item">
						<b>Friends</b> <a class="float-right">13,287</a>
					</li>
					</ul>

					<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
				</div>
				<!-- /.card-body -->
				</div>
				<!-- /.card -->

				<!-- About Me Box -->
				<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">About Me</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<strong><i class="fas fa-book mr-1"></i> Education</strong>

					<p class="text-muted">
					B.S. in Computer Science from the University of Tennessee at Knoxville
					</p>

					<hr>

					<strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

					<p class="text-muted">Malibu, California</p>

					<hr>

					<strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

					<p class="text-muted">
					<span class="tag tag-danger">UI Design</span>
					<span class="tag tag-success">Coding</span>
					<span class="tag tag-info">Javascript</span>
					<span class="tag tag-warning">PHP</span>
					<span class="tag tag-primary">Node.js</span>
					</p>

					<hr>

					<strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

					<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
				</div>
				<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="card">
				<div class="card-header p-2">
					<ul class="nav nav-pills">
					<li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
					<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
					</ul>
				</div><!-- /.card-header -->
				<div class="card-body">
					<div class="tab-content">
					<!-- /.tab-pane -->
					<div class="active tab-pane" id="timeline">
						<!-- The timeline -->
						<div class="timeline timeline-inverse">
						<!-- timeline time label -->
						<div class="time-label">
							<span class="bg-danger">
							10 Feb. 2014
							</span>
						</div>
						<!-- /.timeline-label -->
						<!-- timeline item -->
						<div>
							<i class="fas fa-envelope bg-primary"></i>

							<div class="timeline-item">
							<span class="time"><i class="far fa-clock"></i> 12:05</span>

							<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

							<div class="timeline-body">
								Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
								weebly ning heekya handango imeem plugg dopplr jibjab, movity
								jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
								quora plaxo ideeli hulu weebly balihoo...
							</div>
							<div class="timeline-footer">
								<a href="#" class="btn btn-primary btn-sm">Read more</a>
								<a href="#" class="btn btn-danger btn-sm">Delete</a>
							</div>
							</div>
						</div>
						<!-- END timeline item -->
						<!-- timeline item -->
						<div>
							<i class="fas fa-user bg-info"></i>

							<div class="timeline-item">
							<span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

							<h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
							</h3>
							</div>
						</div>
						<!-- END timeline item -->
						<!-- timeline item -->
						<div>
							<i class="fas fa-comments bg-warning"></i>

							<div class="timeline-item">
							<span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

							<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

							<div class="timeline-body">
								Take me to your leader!
								Switzerland is small and neutral!
								We are more like Germany, ambitious and misunderstood!
							</div>
							<div class="timeline-footer">
								<a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
							</div>
							</div>
						</div>
						<!-- END timeline item -->
						<!-- timeline time label -->
						<div class="time-label">
							<span class="bg-success">
							3 Jan. 2014
							</span>
						</div>
						<!-- /.timeline-label -->
						<!-- timeline item -->
						<div>
							<i class="fas fa-camera bg-purple"></i>

							<div class="timeline-item">
							<span class="time"><i class="far fa-clock"></i> 2 days ago</span>

							<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

							<div class="timeline-body">
								<img src="http://placehold.it/150x100" alt="...">
								<img src="http://placehold.it/150x100" alt="...">
								<img src="http://placehold.it/150x100" alt="...">
								<img src="http://placehold.it/150x100" alt="...">
							</div>
							</div>
						</div>
						<!-- END timeline item -->
						<div>
							<i class="far fa-clock bg-gray"></i>
						</div>
						</div>
					</div>
					<!-- /.tab-pane -->

					<div class="tab-pane" id="settings">
						<form class="form-horizontal">
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Name</label>

							<div class="col-sm-10">
							<input type="email" class="form-control" id="inputName" placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-sm-2 control-label">Email</label>

							<div class="col-sm-10">
							<input type="email" class="form-control" id="inputEmail" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputName2" class="col-sm-2 control-label">Name</label>

							<div class="col-sm-10">
							<input type="text" class="form-control" id="inputName2" placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-2 control-label">Experience</label>

							<div class="col-sm-10">
							<textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="inputSkills" class="col-sm-2 control-label">Skills</label>

							<div class="col-sm-10">
							<input type="text" class="form-control" id="inputSkills" placeholder="Skills">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
								<input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
								</label>
							</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-danger">Submit</button>
							</div>
						</div>
						</form>
					</div>
					<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div><!-- /.card-body -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	</div>
	</body>
</html>