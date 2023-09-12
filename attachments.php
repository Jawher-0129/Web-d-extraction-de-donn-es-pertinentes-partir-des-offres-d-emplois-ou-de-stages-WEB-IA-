<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="dashboard/style.css">

	<title>AdminHub</title>
	<script src="dashboard/table2excel.js"> </script>

</head>
<body>
	<?php
    require_once ('database.php');
	$conn = config::getConnexion();
	$requete="SELECT * FROM mail_data";
	$query=$conn->prepare($requete);
	$query->execute();
	$result=$query->fetchAll(PDO::FETCH_ASSOC);
    ?>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Esprit</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Tableau De Bord</span>
				</a>
			</li>
			<li>
				<a href="dashboard/page_admin.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Réclamations</span>
				</a>
			</li>
			<li>
				<a href="reclamation.html">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Envoyer une Réclamation</span>
				</a>
			</li>
			<?php
			if($_SESSION["Role"]=="admin")
			{
			echo('<li>
				<a href="signup.html">
					<i class="bx bxs-group" ></i>
					<span class="text">Créer Compte</span>
				</a>
			</li>');
			}
			?>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Paramètres
					</span>
				</a>
			</li>
			<li>
				<a href="dashboard/deconnexion.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Se déconnecter
					</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="recherche.php">
				<div class="form-input">
					<input type="search" placeholder="Rechercher..." name="search">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/jawher.jpg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Pièces jointes</h1>
					<ul class="breadcrumb">
						<li>
							<a class="active" href="dashboard/index.php">Tableau de bord</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a href="#">Pièces jointes</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download" id="downloadexcel">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Télecharger Excel</span>
				</a>		
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>Nombre des pieces jointes</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visiteurs</p>
					</span>
				</li>
			</ul>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Images</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table id="example-table">
						<thead>
							<tr>
								<th>Email</th>
								<th>Pays</th>
								<th>Type d'offre</th>
								<th>Entreprise</th>
								<th>Compétences requises</th>
								<th>Durée de stage</th>
								<th>Département</th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach($result as $row) 
						{
							echo '<tr>';
							echo '<td>' . $row['email'] . '</td>'; 
							echo '<td>' . $row['region'] . '</td>'; 
							echo '<td>' . $row['offer_type'] . '</td>'; 
							echo '<td>' . $row['comp_name'] . '</td>'; 
							echo '<td>' . $row['req_skills'] . '</td>'; 
							echo '<td>' . $row['duration'] . '</td>'; 
							echo '<td>' . $row['dept_name'] . '</td>'; 
							echo '</tr>';
						}
						?>

						</tbody>
					</table>
					<script> document.getElementById('downloadexcel').addEventListener('click',function()
					{
						var table2excel = new Table2Excel();
                        table2excel.export(document.querySelectorAll("#example-table"));
					});  
					</script>
				</div>
			</div>
			<br>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>PDF</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table id="example-table">
						<thead>
							<tr>
								<th>Email</th>
								<th>Pays</th>
								<th>Type d'offre</th>
								<th>Entreprise</th>
								<th>Compétences requises</th>
								<th>Durée de stage</th>
								<th>Département</th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach($result as $row) 
						{
							echo '<tr>';
							echo '<td>' . $row['email'] . '</td>'; 
							echo '<td>' . $row['region'] . '</td>'; 
							echo '<td>' . $row['offer_type'] . '</td>'; 
							echo '<td>' . $row['comp_name'] . '</td>'; 
							echo '<td>' . $row['req_skills'] . '</td>'; 
							echo '<td>' . $row['duration'] . '</td>'; 
							echo '<td>' . $row['dept_name'] . '</td>'; 
							echo '</tr>';
						}
						?>

						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script src="dashboard/script.js"></script>
</body>
</html>