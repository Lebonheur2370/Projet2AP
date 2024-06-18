<?php
  if(isset($_POST['update']))
    {
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $newpassword=md5($_POST['newpassword']);
    $sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email and ContactNo=:mobile";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':email', $email, PDO::PARAM_STR);
  $query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  if($query -> rowCount() > 0)
  {
  $con="update tblusers set Password=:newpassword where EmailId=:email and ContactNo=:mobile";
  $chngpwd1 = $dbh->prepare($con);
  $chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
  $chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
  $chngpwd1->execute();
  echo "<script>alert('Votre mot de passe a été modifié avec succès');</script>";
  }
  else {
  echo "<script>alert('L'identifiant de messagerie ou le numéro de mobile n'est pas valide');</script>"; 
  }
  }

?>
  <script type="text/javascript">
  function valid()
  {
  if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
  {
    alert("Les champs Nouveau mot de passe et Confirmer le mot de passe ne correspondent pas !!");
    document.chngpwd.confirmpassword.focus();
    return false;
  }
  return true;
  }
</script>
<div class="modal fade" id="forgotpassword">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Récupération le mot de passe</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="forgotpassword_wrap">
            <div class="col-md-12">
              <form name="chngpwd" method="post" onSubmit="return valid();">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Votre adresse mail*" required="">
                </div>
                <div class="form-group">
                  <input type="text" name="mobile" class="form-control" placeholder="Votre Num mobile Enrg*" required="">
                </div>
                <div class="form-group">
                  <input type="password" name="newpassword" class="form-control" placeholder="Nouveau mot de Passe*" required="">
                </div>
                <div class="form-group">
                  <input type="password" name="confirmpassword" class="form-control" placeholder="Confirmé le mot de Passe*" required="">
                </div>
                <div class="form-group">
                  <input type="submit" value="Réinitialiser le mot de passe" name="update" class="btn btn-block">
                </div>
              </form>
              <div class="text-center">
                <p class="gray_text">
                  Pour des raisons de sécurité, nous ne stockons pas votre mot de passe. 
                  Votre mot de passe sera réinitialisé et un nouveau vous sera envoyé.
                </p>
                <p>
                  <a href="#loginform" data-toggle="modal" data-dismiss="modal">
                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>Retour au connexion
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>