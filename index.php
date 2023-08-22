<?php
include_once("setting/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="shortcut icon" href="public/assets/icon/dimaz4.png">

	<!-- Css -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="public/assets/css/bootstrap.css">

	<!-- Page css -->
	<link rel="stylesheet" href="public/assets/vendors/iconly/bold.css">
	<link rel="stylesheet" href="public/assets/vendors/simple-datatables/style.css">

	<link rel="stylesheet" href="public/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="public/assets/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="public/assets/css/app.css">
	<link rel="shortcut icon" href="public/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
	<div id="app">
		<!-- Sidebar -->
		<div id="sidebar" class="active">
			<div class="sidebar-wrapper active">
				<div class="sidebar-header">
					<div class="d-flex justify-content-between">
						<div class="logo">
							<a href="index.html"><img src="public/assets/icon/dimaz.png" alt="Logo" srcset=""></a>
						</div>
						<div class="toggler">
							<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
						</div>
					</div>
				</div>
				<div class="sidebar-menu">
					<ul class="menu">
						<li class="sidebar-item  ">
							<a href="index.html" class='sidebarlink'>
								<i class="bi bi-grid-fill"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="sidebar-title">Data Master</li>
						<li class="sidebar-item has-sub active">
							<a href="#" class='sidebar-link'>
								<i class="bi bi-hexagon-fill"></i>
								<span>Data User</span>
							</a>
							<ul class="submenu active">
								<li class="submenu-item active">
									<a href="#">
										Data User
									</a>
								</li>
								<li class="submenu-item ">
									<a href="#">Tambah Data User</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
			</div>
		</div>
		<div id="main">
			<!-- Header -->
			<header class="mb-3">
				<a href="#" class="burger-btn d-block d-xl-none">
					<i class="bi bi-justify fs-3"></i>
				</a>
			</header>

			<div class="page-heading">
				<div class="page-title">
					<div class="row">
						<div class="col-12 col-md-6 order-md-1 order-last">
							<h3>DataTable</h3>
							<p class="text-subtitle text-muted">For user to check they list</p>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">DataTable</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<!-- Content -->
				<section class="section">
					<div class="card">
						<div class="card-header">
							Data User
						</div>
						<div class="card-body">
							<table class="table table-striped" id="table1">
								<thead>
									<tr>
										<th>Nama User</th>
										<th>Username</th>
										<th>Role</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
$query = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id asc");

$data_user = array();
while ($data = mysqli_fetch_array($query)) {
    $data_user[] = $data; //data$data_user dijadikan array
}

foreach($data_user as $user_data) {
    echo "<tr>";
    echo "<td>".$user_data['first_name']."</td>";
    echo "<td>".$user_data['username']."</td>";
    echo "<td>".$user_data['role']."</td>";
    echo "<td>".$user_data['status']."</td></tr>";
}
?>
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>

			<!-- Footer -->
			<footer>
				<div class="footer clearfix mb-0 text-muted">
					<div class="float-start">
						<p>
							<?php echo date("Y");?>
							&copy; Mazer
						</p>
					</div>
					<div class="float-end">
						<p>
							<?php
                            $starttime = microtime(true); // Top of page
$endtime = microtime(true); // Bottom of page
$time = number_format((float)($endtime - $starttime), 2, '.', '');
printf("Page loaded in %f seconds", $time);
?>
							<span>||</span>
							Crafted with
							<span class="text-danger">
								<i class="bi bi-heart"></i>
							</span> by
							Dimaz Ivan Perdana -<a href="https://linktr.ee/dimazivan"
								target="_blank">&nbsp;Developer</a>
						</p>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="public/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="public/assets/js/bootstrap.bundle.min.js"></script>

	<script src="public/assets/vendors/apexcharts/apexcharts.js"></script>
	<script src="public/assets/js/pages/dashboard.js"></script>
	<script src="public/assets/vendors/simple-datatables/simple-datatables.js"></script>

	<script>
		// Simple Datatable
		let table1 = document.querySelector('#table1');
		let dataTable = new simpleDatatables.DataTable(table1);
	</script>

	<script src="public/assets/js/main.js"></script>
</body>

</html>