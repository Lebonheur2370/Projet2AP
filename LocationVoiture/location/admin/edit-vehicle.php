<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0) {  
    header('location:index.php');
} else { 

    if(isset($_POST['submit'])) {
        // ... l code pour la mise à jour des données
		$titrevehicule=$_POST['titrevehicule'];
        $immatriculation=$_POST['immatriculation'];
        $marque=$_POST['nommarque'];
        $modelvehicule=$_POST['modelvehicule'];
        $prixparjour=$_POST['prixparjour'];
        $typecarburant=$_POST['typecarburant'];
        $annee=$_POST['annee'];
        $nombreplaces=$_POST['nombreplaces'];
        $climatiseur=isset($_POST['climatiseur']) ? 1 : 0;
        $lecteurcd=isset($_POST['lecteurcd']) ? 1 : 0;
        $siegescuir=isset($_POST['siegescuir']) ? 1 : 0;
        $id=intval($_GET['id']);

        $sql="UPDATE tblvehicules SET TitreVehicule=:titrevehicule, Immatriculation=:immatriculation, MarqueVehicule=:marque, ModelVehicule=:modelvehicule,
        PrixParJour=:prixparjour, TypeCarburant=:typecarburant, Annee=:annee, NombrePlaces=:nombreplaces,
        Climatiseur=:climatiseur, LecteurCD=:lecteurcd, SiegesCuir=:siegescuir WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':titrevehicule',$titrevehicule,PDO::PARAM_STR);
        $query->bindParam(':immatriculation',$immatriculation,PDO::PARAM_STR);
        $query->bindParam(':marque',$marque,PDO::PARAM_STR);
        $query->bindParam(':modelvehicule',$modelvehicule,PDO::PARAM_STR);
        $query->bindParam(':prixparjour',$prixparjour,PDO::PARAM_STR);
        $query->bindParam(':typecarburant',$typecarburant,PDO::PARAM_STR);
        $query->bindParam(':annee',$annee,PDO::PARAM_STR);
        $query->bindParam(':nombreplaces',$nombreplaces,PDO::PARAM_STR);
        $query->bindParam(':climatiseur',$climatiseur,PDO::PARAM_INT);
        $query->bindParam(':lecteurcd',$lecteurcd,PDO::PARAM_INT);
        $query->bindParam(':siegescuir',$siegescuir,PDO::PARAM_INT);
        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->execute();

        $msg="Données mises à jour avec succès";
    }
?>

<!DOCTYPE html>
<html lang="fr" class="no-js">

<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title> Modifier les Infos du Vehicule </title>

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
                    
                        <h2 class="page-title">Modifier un Vehicule</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Information de Base</div>
                                    <div class="panel-body">
									<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT tblvehicules.*,tblmarques.NomMarque,tblmarques.id as bid from tblvehicules 
join tblmarques on tblmarques.id=tblvehicules.MarqueVehicule where tblvehicules.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
	<label class="col-sm-2 control-label">Titre du Vehicule <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<input type="text" name="titrevehicule" class="form-control" value="<?php echo htmlentities($result->TitreVehicule)?>" required>
	</div>

	<label class="col-sm-2 control-label">Immatriculation <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<input type="text" name="immatriculation" class="form-control" value="<?php echo htmlentities($result->Immatriculation)?>" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Selectionner Marque <span style="color:red">*</span></label>
	<div class="col-sm-6">
		<select class="selectpicker" name="nommarque" required>
			<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->NomMarque); ?> </option>
			<?php $ret="select id,NomMarque from tblmarques";
			$query= $dbh -> prepare($ret);
			//$query->bindParam(':id',$id, PDO::PARAM_STR);
			$query-> execute();
			$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
			if($query -> rowCount() > 0)
			{
			foreach($resultss as $results)
			{
			if($results->NomMarque==$bdname)
			{
			continue;
			} else{
			?>
			<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->NomMarque);?></option>
			<?php }}} ?>

		</select>
	</div>

		<!-- <div class="hr-dashed"></div> -->
	
		<label class="col-sm-2 control-label">Modèl du Vehical<span style="color:red">*</span></label>
		<div class="col-sm-4">
			<input type="text" name="modelvehicule" class="form-control" value="<?php echo htmlentities($result->ModelVehicule)?>" required>
			<!-- <textarea class="form-control" name="modelvehicule" rows="3" required><?php echo htmlentities($result->ModelVehicule);?></textarea> -->
		</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Prix Par Jour(en FCFA)<span style="color:red">*</span></label>
	<div class="col-sm-4">
		<input type="text" name="prixparjour" class="form-control" value="<?php echo htmlentities($result->PrixParJour);?>" required>
	</div>

	<label class="col-sm-2 control-label ">Type de carburant<span style="color:red">*</span></label>
	<div class="col-sm-4">
		<select class="selectpicker" name="typecarburant" required>
			<option value="<?php echo htmlentities($result->TypeCarburant);?>"> <?php echo htmlentities($result->TypeCarburant);?> </option>

			<option value="Essence">Essence</option>
			<option value="Diesel">Diesel</option>
			<option value="Gazoil">Gazoil</option>
		</select>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-2 control-label">Année<span style="color:red">*</span></label>
	<div class="col-sm-4">
		<input type="text" name="annee" class="form-control" value="<?php echo htmlentities($result->Annee);?>" required>
	</div>
	<label class="col-sm-2 control-label">Nombre de places<span style="color:red">*</span></label>
	<div class="col-sm-4">
		<input type="text" name="nombreplaces" class="form-control" value="<?php echo htmlentities($result->NombrePlaces);?>" required>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-4">
		<img src="img/vehicleimages/<?php echo htmlentities($result->Vimage);?>" width="200" height="100" style="border:solid 1px #000">
		<br><br>
		<!-- Modifier l'image avec la possibilité de télécharger -->
		<label for="changeImage">Modifier l'Image</label>
		<input type="file" name="img" id="changeImage" style="display: none;">
		<a href="#" onclick="document.getElementById('changeImage').click();">Choisir un fichier</a>
	</div>
</div>
                                       									
</div>
</div>
</div>
</div>
	
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Accessoires</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<?php if($result->Climatiseur==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="climatiseur" checked value="1">
<label for="inlineCheckbox1"> Climatiseur</label>
</div>
<?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="climatiseur" value="1">
<label for="inlineCheckbox1"> Climatiseur </label>
</div>
<?php } ?>
</div>
	

<div class="form-group">
<div class="col-sm-3">
	<?php if($result->LecteurCD==1)
	{
	?>
	<div class="checkbox checkbox-inline">
	<input type="checkbox" id="inlineCheckbox1" name="lecteurcd" checked value="1">
	<label for="inlineCheckbox1"> Lecteur CD</label>
	</div>
	<?php } else {?>
	<div class="checkbox checkbox-inline">
	<input type="checkbox" id="inlineCheckbox1" name="lecteurcd" value="1">
	<label for="inlineCheckbox1">Lecteur CD  </label>
	</div>
	<?php } ?>
</div>
	
<div class="col-sm-3">
	<?php if($result->SiegesCuir==1)
	{
	?>
	<div class="checkbox checkbox-inline">
	<input type="checkbox" id="inlineCheckbox1" name="siegescuir" checked value="1">
	<label for="inlineCheckbox3"> Sièges en Cuir </label>
	</div>
	<?php } else { ?>
	<div class="checkbox checkbox-inline">
	<input type="checkbox" id="inlineCheckbox1" name="siegescuir" value="1">
	<label for="inlineCheckbox3">Sièges en Cuir </label>
	</div>
	<?php } ?>
</div>
</div>

<?php }} ?>


											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" >
													
<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Enregistrer</button>
												</div>
											</div>

										</form>
									</div>
								</div>
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
