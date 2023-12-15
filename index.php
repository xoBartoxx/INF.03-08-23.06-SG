<!DOCTYPE html>

<html lang="pl">

	<head>
		<meta charset="utf-8"/>
		<title>Sklep dla uczniów</title>
		
		<link rel="stylesheet" type="text/css" href="styl.css"/>
	</head>
	
	
	<body>
		<header>
			<h1>Dzisiejsze promocje naszego sklepu</h1>
		</header>
		
		
		<section id="lewy">
			<h2>Taniej o 30%</h2>
			<?php
				$dbhost = 'localhost';
				$dbuser = 'root';
				$dbpass = '';
				$dbname = 'sklep';
				
				$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
				
				$sql = 'SELECT nazwa FROM towary WHERE promocja = 1';
				
				$result = mysqli_query($db, $sql);
			
				echo '<ol>';
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){
						echo '<li>' . $row['nazwa'] . '</li>';
					}
				echo '</ol>';
				}
				
				mysqli_close($db);
			?>
		</section>
		
		
		<section id="srodkowy">
			<h2>Sprawdź cenę</h2>
			<form action="index.php" method="post">
				<select name="towar">
					<option>Gumka do mazania</option>
					<option>Cienkopis</option>
					<option>Pisaki 60 szt.</option>
					<option>Markery 4 szt.</option>
				</select>
				<input type="submit" name="submit" value="SPRAWDŹ"/>
			</form>
			<div>
				<?php
					$dbhost = 'localhost';
					$dbuser = 'root';
					$dbpass = '';
					$dbname = 'sklep';
					
					$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
					if(isset($_POST['submit'])){
						
					$towar = $_POST['towar'];
					
					$sql = "SELECT cena, cena-cena*0.3 FROM towary WHERE nazwa='$towar'";
					
					$result = mysqli_query($db, $sql);
					
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){
							echo 'cena regularna: ' . $row['cena'] . '<br>' . ' cena w promocji 30%: ' . $row['cena-cena*0.3'];
						}
					}
					}
					
					mysqli_close($db);
				?>
			</div>
		</section>
		
		
		<section id="prawy">
			<h2>Kontakt</h2>
			<p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
			<img src="promocja.png" alt="promocja"/>
		</section>
		
		
		<footer>
			<h4>Autor strony: xoBartoxx</h4>
		</footer>
	
	</body>



</html>
