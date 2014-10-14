<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title> <?php echo ucfirst($title).' | Seasons Pokhara'; ?> </title>
	<link rel="icon" href="<?php echo base_url('favicon.png'); ?>" type="image/png">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url().'assets/css/style.css'; ?>">
			<style type="text/css">
			.darkness, .darkness1,.darkness2, .darkness3,	.darkness4{
			position:fixed;
			}
					.darkness{
							width: 1366px;
							height:100%;
							z-index:-1;
							background: #4F5367;
						}
						.darkness1{
						
							width:100%;
							height:100%;
							z-index:-2;
						}
						.darkness2{
							top: 0%;
							opacity: 0;
							width:100%;
							height:100%;
							z-index:-3;
						}
					
					.darkness3{
							top: 0%;
							opacity: 0;
							width:100%;
							height:100%;
							z-index:-4;
						}
					
					.darkness4{
							top: 0%;
							opacity: 0;
							width:100%;
							height:100%;
							z-index:-5;
						}
						

				</style>

    

</head>
<body onload="init()">
