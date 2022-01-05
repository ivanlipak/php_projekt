<?php 
define('__APP__', TRUE);
session_start();
if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
if (!isset($menu)) { $menu = 1; }
include ("dbconn.php");
include_once ("functions.php");
print '
<!DOCTYPE html>
<html leng="hr">
    <head>
        
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="test">
        <meta name="keywords" content="majstor, građevinski radovi, elektro radovi, montaža, popravci">
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <meta name="author" content="Eduard Špoljar">
        <meta name="viewport" content="width=device-width;initial-scale=1.0; maximum-scale=1.0; user-scale=0;">
        <link href="https://fonts.googleapis.com/css?famili=Oswald" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
        <title> majstor</title>   
    </head>
<body>
	<header>
	<div style="width: 100%;">
    <div style="width: 100%;float:right;">
        	
		<div id="nav">';
			include("menu.php");
		print'
		</nav>
		</div>
		<br/>
		<br/>
		<br/>
		<div class="slika" ><img src="img/alat.jpg" width="10%"></div>
	</header>
	<main>';
		
	
	if (!isset($_GET['menu']) || $_GET['menu'] == 1) { include("main.php"); }
	
	
	else if ($_GET['menu'] == 2) { include("vijesti.php"); }
	
	
	else if ($_GET['menu'] == 3) { include("o_nama.php"); }
	
	
	else if ($_GET['menu'] == 4) { include("galerija.php"); }


	else if ($_GET['menu'] == 5) { include("kontakt.php"); }


	else if ($_GET['menu'] == 6) { include("register.php"); }
	
	
	else if ($_GET['menu'] == 7) { include("signin.php"); }
	
	
	else if ($_GET['menu'] == 8) { include("admin.php"); }

	else if ($_GET['menu'] == 10) { include("send-contact.php"); }
	
	print '
	</main>
	<footer>
	<p>Copyright &copy; ' . date("Y"). ' Eduard Špoljar.  <a href="https://github.com/espolj1?tab=repositories"><img src="img/GitHub.svg" title="Github" alt="Github" style="width:24px; margin-top:0.4em"></a></p>	
	</footer>
</body>
</html>';
?>
