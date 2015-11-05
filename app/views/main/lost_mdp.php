 <div class="container">
 <form method="post" class="form-horizontal" action="DefaultC/lost" role="form">
 <div class="form-group">
 <h2>Récuperer son mot de passe</h2>
 <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" id="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>" placeholder="Votre email">
      </div>
      </div>
<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="Récupérer" class="btn btn-default">
      </div>
 </div>
  </form>
</div>
      