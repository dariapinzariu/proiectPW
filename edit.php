<?php
	include 'config.php';
    if(isset($_GET['id']))
         $sql = "SELECT * FROM images WHERE id = '{$_GET['id']}'";
    else
         $sql = "SELECT * FROM images WHERE id = '{$_POST['id']}'";
    $result = mysqli_query($con, $sql);
    $record = mysqli_fetch_array($result);
    if(isset($_POST['submit']))
    { 
		$title = $_POST['title'];
		if ($_FILES['image']['size'] > 0) {
			$target = "./images/" . basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], $target);
		} else {
			$target = $record['image'];	
		}

		$sql1 = "UPDATE images SET title='$title', image='$target' WHERE id = '{$_POST['id']}'";
		mysqli_query($con, $sql1) or die(mysqli_error($con));
		header("location: imgg.php");
    }
?>

<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Profil</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a href="index.php" class="title">Composeline</a>
				<nav>
					<ul>
						<li><a href="index.php">Acasă</a></li>
						<li><a href="generic.php" class="active">Profil</a></li>
						<li><a href="elements.php">Elements</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
					    	
						
						</div>
					</section>
			</div>
			
            <!-- Two -->
					<section id="two" class="wrapper alt style2">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
							Name: <br> <input class="form-control" type="text" name="title" value="<?php echo $record['title']; ?>"><br>
							Image:<br><input type="file" name="image" value="<?php echo $record['image']; ?>"><br>
							<?php if (!empty($record['image'])): ?>
								<img src="<?php echo $record['image']; ?>" alt="Current Image" width="200"><br>
							<?php endif; ?>

							<input type="hidden" name="id" value="<?php echo $record['id']; ?>">
							<input type="submit" name="submit" value="Edit" class="btn btn-primary btn-outline">
						</form>
                    </section>


		<!-- Footer -->
			<footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
