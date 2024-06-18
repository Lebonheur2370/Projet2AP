<?php
  if(isset($_POST['emailsubscibe']))
  {
    $subscriberemail=$_POST['subscriberemail'];
    $sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query -> rowCount() > 0)
    {
      echo "<script>alert('Déjà inscrit.');</script>";
    }
    else{
      $sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
      $query = $dbh->prepare($sql);
      $query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
      $query->execute();
      $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
      echo "<script>alert('Abonné avec succès.');</script>";
    }
    else 
    {
      echo "<script>alert('Quelque chose s'est mal passé. Veuillez réessayer');</script>";
    }
    }
  }
?>

<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
      
        <div class="col-md-6">
          <h6>À propos de nous</h6>
          <ul>

        
          <li><a href="page.php?type=aboutus">A propos</a></li>
            <!-- <li><a href="page.php?type=faqs">FAQs</a></li> -->
            <li><a href="#">Confidentialité</a></li>
          <li><a href="#">Conditions d'utilisation</a></li>
               <li><a href="admin/">Admin Login</a></li>
          </ul>
        </div>
  
        <div class="col-md-3 col-sm-6">
          <h6>Abonnez-vous à notre service </h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Enter Email Address" />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block">S'abonner <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
            <p class="subscribed-text">*Nous envoyons chaque semaine des offres exceptionnelles et les dernières nouvelles automobiles à nos utilisateurs abonnés.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom ">
    <div class="container ">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right ">
          <div class="footer_widget">
            <p>Connecte-toi avec nous:</p>
            <ul>
              <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">Copyright &copy;Service de location de voitures Réalisé par Le Bonheur BAMBO.</p>
        </div>
      </div>
    </div>
  </div>
</footer>