
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
						<li><a href="login1.php">Log in</a></li>
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

    <form method="GET" action="">
    <input type="text" name="search" placeholder="Caută imagine după nume" />
    <button type="submit">Caută</button>
</form>

				<!-- Two -->
					<section id="two" class="wrapper alt style2">
                    <?php
    include 'config.php';

    // Preluăm termenul de căutare din query string, dacă există
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    // Construim interogarea SQL
    if ($search) {
        // Escapăm termenul de căutare pentru a preveni SQL Injection
        $search = mysqli_real_escape_string($con, $search);
        $sql = "SELECT * FROM images WHERE title LIKE '%$search%';";
    } else {
        $sql = "SELECT * FROM images;";
    }

    // Executăm interogarea
    $query = mysqli_query($con, $sql) or die(mysqli_error($con));
?>

<table width="30%" cellpadding="4" cellspace="4" rules="rows">
    <tr>
        <th>Nume</th>
        <th>Imagine</th>
        <th colspan="3" align="center">Actions</th>
    </tr>

    <?php while( $row = mysqli_fetch_array($query) ) { ?>
    <tr style="border-bottom: 1px solid black;">
        <td><?php echo $row['title']; ?></td>
        <td><img src="<?php echo $row['image']; ?>"></td>
        <td>
            <?php echo "<a href=\"view.php?id=".$row['id']."\">View</a>
            <a href=\"edit.php?id=".$row['id']."\">Edit</a>
            <a href=\"delete.php?id=".$row['id']."\" onclick=\"return confirm('Are you sure?')\">Delete</a>"
            ?>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="upload.php" class="button">Incarca o imagine</a>

				
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