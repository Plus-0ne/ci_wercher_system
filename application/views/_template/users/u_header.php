<!--                                                 
__        _______ ____   ____ _   _ _____ ____   
\ \      / | ____|  _ \ / ___| | | | ____|  _ \  
 \ \ /\ / /|  _| | |_) | |   | |_| |  _| | |_) | 
  \ V  V / | |___|  _ <| |___|  _  | |___|  _ <  
   \_/\_/  |_____|_| \_\\____|_| |_|_____|_| \_\ 
                                                 
                                                 
  ____ ___   ___  ____                           
 / ___/ _ \ / _ \|  _ \   TM                       
| |  | | | | | | | |_) |                         
| |__| |_| | |_| |  __/                          
 \____\___/ \___/|_|                             
                                                 -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex" /> <!-- No search engine queries. Private website. -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		<?php if ($title == NULL): ?>
			<?php echo 'Title'; ?>
		<?php else: ?>
			<?php echo $title; ?>
		<?php endif ?>
	</title>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/dataTables.bootstrap4.min.css">
	<!-- FONTAWESOME -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/all.css">
	<!-- CUSTOM STYLE -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
	<link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/gif">
	<!-- CUSTOM LIBRARIES -->
	<link href="<?=base_url()?>assets/css/bootstrap4-toggle.min.css" rel="stylesheet">
</head>