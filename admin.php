<?php 
	if ($_SESSION['user']['valid'] == 'true') {
		if (!isset($action)) { $action = 2; }
		print '
		<h1>Administracija</h1>
		<div id="admin">
			<ul class="uladmin">';
            if ($_SESSION['user']['role'] == 1){
                echo '
				<li  class="li" ><a href="index.php?menu=8&amp;action=1">Korisnici</a></li>
				<li  class="li" ><a href="index.php?menu=8&amp;action=2">Vijesti</a></li>
			    </ul>';
            }else if ($_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3){
                echo'
                <li  class="li" ><a href="index.php?menu=8&amp;action=2">Vijesti</a></li>
			    </ul>';
            }
            
			if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2)
            {
				if ($action == 1) 
                { 
                    include("admin/users.php"); 
                }
			}
			if ($action == 2) 
            { 
                include("admin/news.php"); 
            }
		print '
		</div>';
	}
	else {
		$_SESSION['message'] = '<p>Please register or login using your credentials!</p>';
		header("Location: index.php?menu=7");
	}
?>
