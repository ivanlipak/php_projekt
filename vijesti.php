<?php
	
	if (isset($action) && $action != '') {
		$query  = "SELECT * FROM news";
		$query .= " WHERE id=" . $_GET['action'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
			print '
			<div class="news">
				<img src="img/' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">
				<h2>' . $row['title'] . '</h2>
				<p>'  . $row['description'] . '</p>
				<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time>
				<hr>
			</div>';
	}
	else {
		print '<h1>Vijesti</h1>';
		$query  = "SELECT * FROM news";
		$query .= " WHERE archive='N'";
		$query .= " ORDER BY date DESC";
		$result = @mysqli_query($MySQL, $query);
		while($row = @mysqli_fetch_array($result)) {
			print '
			<div style="width: 80%; margin-left: 12%">
				<div style="text-allign:left; height: 300PX">
				<img style="padding-right: 15px; width: 30%; float: left" src="img/' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">
				<h2 >' . $row['title'] . '</h2>';
				if(strlen($row['description']) > 250) {
					echo '<p>' . substr(strip_tags($row['description']), 0, 250).'... <a href="index.php?menu=' . $menu . '&amp;action=' . $row['id'] . '">Više...</a> <br>' . '</p>';
				} else {
					echo '<p>' . strip_tags($row['description']) . '</p>';
				}
				print '
				<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time> </div>
				<hr>
			</div>';
		}
	}
?>
