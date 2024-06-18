<?php 
  session_start();
  include('includes/config.php');
  error_reporting(0);
  if(isset($_POST['submit']))
  {
    $datedebut=$_POST['datedebut'];
    $datefin=$_POST['datefin']; 
    $message=$_POST['message'];
    $useremail=$_SESSION['login'];
    $status=0;
    $vhid=$_GET['vhid'];
    $noreservation=mt_rand(100000000, 999999999);
    $ret="SELECT * FROM tblreservation where (:datedebut BETWEEN date(DateDebut) and date(DateFin) || :datefin 
      BETWEEN date(DateDebut) and date(DateFin) || date(DateDebut) BETWEEN :datedebut and :datefin) and VehiculeId=:vhid";
    $query1 = $dbh -> prepare($ret);
    $query1->bindParam(':vhid',$vhid, PDO::PARAM_STR);
    $query1->bindParam(':datedebut',$datedebut,PDO::PARAM_STR);
    $query1->bindParam(':datefin',$datefin,PDO::PARAM_STR);
    $query1->execute();
    $results1=$query1->fetchAll(PDO::FETCH_OBJ);

  if($query1->rowCount()==0)
  {

    $sql="INSERT INTO  tblreservation(NumReservation,Email,VehiculeId,DateDebut,DateFin,message,Status) VALUES(:noreservation,:useremail,:vhid,:datedebut,:datefin,:message,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':noreservation',$noreservation,PDO::PARAM_STR);
    $query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
    $query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
    $query->bindParam(':datedebut',$datedebut,PDO::PARAM_STR);
    $query->bindParam(':datefin',$datefin,PDO::PARAM_STR);
    $query->bindParam(':message',$message,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId)
  {
    echo "<script>alert('Réservation réussie.');</script>";
    echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
  }
  else 
  {
    echo "<script>alert('Quelque chose s'est mal passé. Veuillez réessayer');</script>";
    echo "<script type='text/javascript'> document.location = 'car-listing.php'; </script>";
  } }  else{
    echo "<script>alert('Voiture déjà réservée pour ces jours');</script>"; 
    echo "<script type='text/javascript'> document.location = 'car-listing.php'; </script>";
  }

  }

?>


<!DOCTYPE HTML>
<html lang="fr">
<head>

<title>Details Vehicule</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>


<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Listing-Image-Slider-->

<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT tblvehicules.*,tblmarques.NomMarque,tblmarques.id as bid  from tblvehicules 
join tblmarques on tblmarques.id=tblvehicules.MarqueVehicule where tblvehicules.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  

<section id="listing_img_slider">
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage);?>" class="img-responsive" alt="image" width="700" height="360"></div>
  
</section>



<!--Détail de l'annonce-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-6">
        <h2><?php echo htmlentities($result->NomMarque);?>  <?php echo htmlentities($result->TitreVehicule);?></h2>
      </div>
      
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
          
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->Annee);?></h5>
              <p>Année</p>
            </li>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->TypeCarburant);?></h5>
              <p>Type de carburant</p>
            </li>
       
            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5><?php echo htmlentities($result->NombrePlaces);?></h5>
              <p> Places</p>
            </li>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active">
                <a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Aperçu du véhicule </a>
              </li>
          
              <li role="presentation">
                <a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessoires</a>
              </li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              
              
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Accessoires</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Climatiseur</td>
<?php if($result->Climatiseur==1)
{
?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?> 
   <td><i class="fa fa-close" aria-hidden="true"></i></td>
   <?php } ?> </tr>

                   
 <tr>
  <td>Lecteur CD</td>
  <?php if($result->LecteurCD==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else { ?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
</tr>

<tr>
  <td>Sièges en cuir</td>
  <?php if($result->SiegesCuir==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else { ?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>  
</tr>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
<?php }} ?>
   
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3">
      
        <div class="share_vehicle">
          <p>Partager: 
            <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> 
            <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> 
            <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> 
            <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> 
          </p>
        </div>
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Réservez maintenant</h5>
          </div>
          <form method="post">
            <div class="form-group">
              <label>Date de début:</label>
              <input type="date" class="form-control" name="datedebut" placeholder="Date de Début" required>
            </div>
            <div class="form-group">
              <label>Date de fin:</label>
              <input type="date" class="form-control" name="datefin" placeholder="Date de Fin" required>
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
            </div>
          <?php if($_SESSION['login'])
              {?>
              <div class="form-group">
                <input type="submit" class="btn"  name="submit" value="Reserve maintenant">
              </div>
              <?php } else { ?>
              <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Connectez-vous pour réserver</a>

              <?php } ?>
          </form>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    <div class="similar_cars">
      <h3>Les voitures similaires</h3>
      <div class="row">
        <?php 
          $bid=$_SESSION['brndid'];
          $sql="SELECT tblvehicules.TitreVehicule,tblvehicules.Immatriculation,tblmarques.NomMarque,tblvehicules.PrixParJour,tblvehicules.TypeCarburant,tblvehicules.Annee,tblvehicules.id,tblvehicules.NombrePlaces,tblvehicules.ModelVehicule,tblvehicules.Vimage 
          from tblvehicules join tblmarques on tblmarques.id=tblvehicules.MarqueVehicule where tblvehicules.MarqueVehicule=:bid";
          $query = $dbh -> prepare($sql);
          $query->bindParam(':bid',$bid, PDO::PARAM_STR);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
          if($query->rowCount() > 0)
          {
          foreach($results as $result)
          { 
        ?>      
        <div class="col-md-3 grid_listing">
          <div class="product-listing-m gray-bg">
            <div class="product-listing-img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage);?>" class="img-responsive" alt="image" /> </a>
            </div>
            <div class="product-listing-content">
              <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->NomMarque);?>   <?php echo htmlentities($result->TitreVehicule);?></a></h5>
              <p class="list-price"><?php echo htmlentities($result->PrixParJour);?> FCFA/Jour</p>
          
              <ul class="features_list">
                
             <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->NombrePlaces);?> Places</li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i> Model <?php echo htmlentities($result->Annee);?> </li>
                <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->TypeCarburant);?></li>
              </ul>
            </div>
          </div>
        </div>
        <?php }} ?>       

      </div>
    </div>
    <!--/Similar-Cars--> 
    
  </div>
</section>
<!--/Listing-detail--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>