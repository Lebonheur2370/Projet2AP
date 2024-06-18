<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

 ?>

<!doctype html>
<html lang="fr" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>confirmé une Réservation  </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">confirmé une Réservation</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Information sur la Réservation</div>
							<div class="panel-body">

								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Nom & Prénom</th>
											<th>N° Réservation</th>
											<th>Vehicule</th>
											<th>Date de Début </th>
											<th>Date de Fin</th>
											<th>Status</th>
											<th>Date d'affichage</th>
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>

									<?php 

$status=1;
									$sql = "SELECT tblusers.FullName,tblmarques.NomMarque,tblvehicules.TitreVehicule,tblreservation.DateDebut,tblreservation.DateFin,tblreservation.message,tblreservation.VehiculeId 
									as vid,tblreservation.Status,tblreservation.DateAffichage,tblreservation.id,tblreservation.NumReservation  
									from tblreservation join tblvehicules on tblvehicules.id=tblreservation.VehiculeId join tblusers on tblusers.EmailId=tblreservation.Email 
									join tblmarques on tblvehicules.MarqueVehicule=tblmarques.id   where tblreservation.Status=:status";
$query = $dbh -> prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->FullName);?></td>
											<td><?php echo htmlentities($result->NumReservation);?></td>
											<td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid);?>"><?php echo htmlentities($result->NomMarque);?> , <?php echo htmlentities($result->TitreVehicule);?></td>
											<td><?php echo htmlentities($result->DateDebut);?></td>
											<td><?php echo htmlentities($result->DateFin);?></td>
											<td><?php 
if($result->Status==0)
{
echo htmlentities('Réservation en Cour');
} else if ($result->Status==1) {
echo htmlentities('Confirmé');
}
 else{
 	echo htmlentities('Annuler');
 }
										?></td>
											<td><?php echo htmlentities($result->DateAffichage);?></td>
										<td>


<a href="bookig-details.php?bid=<?php echo htmlentities($result->id);?>"> Voir</a>
</td>

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
