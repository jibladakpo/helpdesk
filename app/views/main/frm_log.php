
<div class="container">
  <form method="post" class="form-horizontal" action="DefaultC/connect" role="form">
    <div class="form-group">
     <?php if(isset($error)):?>
 <div class="alert alert-danger"> <?php echo $error;?>
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 </div>
 <?php endif;?>
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" id="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>" placeholder="Votre email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Votre password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="Connexion" class="btn btn-default">
      </div>
    </div>
  </form>
</div>