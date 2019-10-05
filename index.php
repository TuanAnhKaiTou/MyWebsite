<?require("config/init.php");?>
<!DOCTYPE html>
<html>
	<head>
		<title><?=$data['name']?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8" lang="vi"/>
		<meta name="keywords" content=""/>
		<meta name="desription" content=""/>
		<script src="js/jquery-3.2.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="api/bootstrap/css/bootstrap.min.css" >
		<link rel="stylesheet" href="api/bootstrap/css/bootstrap-theme.min.css" >
		<script src="api/bootstrap/js/bootstrap.min.js" ></script>
		<link rel="icon" href="img/logo.jpg"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="api/owlcarousel/owl.carousel.min.css">
		<link rel="stylesheet" href="api/owlcarousel/owl.theme.default.min.css">
		<script src="api/owlcarousel/owl.carousel.min.js"></script>
		<script src="api/backtop/quick-up.js"></script>
		<script src="api/elevatezoom/jquery.elevatezoom.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
		<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
	</head>
	<body>
		<?
		include("src/web_header.php");
		include("src/web_".$cmd.".php");
		include("src/web_footer.php");
		?>
		</body>
</html>
