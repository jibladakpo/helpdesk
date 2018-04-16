<!DOCTYPE html>
<html>
<head>
<base href="<?php echo $config["siteUrl"]?>">
<title>Helpdesk</title>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
<link rel="shortcut icon" type="image/png" href="assets/img/helpdesk.png">
</head>
<meta charset="UTF-8">
<body>
	
	<div class="bs-docs-header">
		<div class="container">
			<div class="header">
				<h1>HelpDesk</h1>
				<p>Assistance, support et gestion des incidents.</p>
				<div class="pull-right">
					<?php
					echo $infoUser;
					?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="second-header"></div>
	<div class="container">
		<ol class="breadcrumb">
		<?php if(Auth::isAuth()){?>
			<?php if(Auth::isAdmin()==0){ ?>
			<?php echo "<li><a href='Accueil/vAccueil/".$id."'><span class='glyphicon glyphicon-home'
					aria-hidden='true'></span>&nbsp;Accueil</a></li> </span> ";?>
				<?php }else{ ?>
					<?php echo "<li><a href='".$config['siteUrl']."'><span class='glyphicon glyphicon-home'
							aria-hidden='true'></span>&nbsp;Accueil</a></li> </span> ";?>
						<?php } ?>
		<?php echo"	<li><a id='mainNav-navzone-1-link-2' href='users/view/".$id."'><span class='glyphicon glyphicon-user'
					aria-hidden='true'></span>&nbsp;Mon compte</a></li> ";?>
			<li><a id='mainNav-navzone-1-link-2' href="tickets"><span class="glyphicon glyphicon-tags"
					aria-hidden="true"></span>&nbsp;Tickets</a></li>
			<li><a id='mainNav-navzone-1-link-3' href="faqs"><span class="glyphicon glyphicon-book"
					aria-hidden="true"></span>&nbsp;FAQ</a></li>
			<?php };?>
		</ol>
	</div>
