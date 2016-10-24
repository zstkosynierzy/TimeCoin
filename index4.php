<?php
	session_start();
	if(isset($_POST["submit"])){
			
		require_once("db.php");

  		$username=$_POST['login'];
 			$password=$_POST['haslo'];
  		$password = md5($password);
		
		
		
		  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	  $sql = mysql_query($query) or die(mysql_error());
 	 	  if (mysql_num_rows($sql) == 1) {
 	      $row = mysql_fetch_assoc($sql); 
				$_SESSION["id"] = $row['userID'];
				$_SESSION["login"] = $username;
				$_SESSION["zalogowany"] = 1;
				header("Location:wyszukiwarka.php");
  			mysql_close();
	   }
	}
	if($_SESSION['zalogowany'] == 0){
?>
<!DOCTYPE html>
<html lang="Pl">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="Shortcut icon" href="icon.png">
	<link href='http://fonts.googleapis.com/css?family=Arima+Madurai&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<title>TimeCoin</title>
</head>
<body link="black" vlink="black" alink="black">

<div class="bg500">

	<?php
	
echo "<ol>";
echo "<li><a href=\"index.php\">LOGOWANIE</a></li>"; 
echo "<li><a href=\"rejestracja.php\">REJESTRACJA</a></li>";
echo "</ol>";

	?>

	</br></br></br>
		
	<center>
	<div class="title" id="title500">
	
		<div class="maintitle">Witaj na TimeCoin!</div>
		</br></br>
		Logowanie
	
	</div>
	</center>

</div>

<div class="form" id="log">

	<div id="text">
	
		<form action="" method="post">
			
			<label for="login">Login</label>
			<input name="login" id="log" type="text"/></br></br>
			
			<label for="login">Hasło</label>
			<input name="haslo" id="log" type="password"/></br></br>
			
			<input type="submit" name="submit" value="Zaloguj"/></br>
			
		</form>	
	
	</div>

</div>

<div class="bg300">

	<center>
	<div class="title" id="title300">
	
		Czym jest TimeCoin?
	
	</div>
	</center>

</div>
<div id="text3">

TimeCoin to portal, dzięki któremu możesz się uczyć i nauczać innych. Szybko znajdziesz osoby w twojej okolicy, z którymi możesz "handlować" swoimi umiejętnościami. Taka forma nauki pozwala zaoszczędzić pieniądze, ponieważ system, nad jakim pracujemy jest kompletnie darmowy. Jedyną walutą jest tu czas. Zarabiasz ucząc innych i wydajesz zgromadzony na koncie czas ucząc się u innych.
	
</div>

</body>
</html>
<?php
	}
	else header("Location:wyszukiwarka.php");
?>