<!DOCTYPE html>
<html>
<head>
	<title>Прогноз погоды города <?php echo $_GET['q'];?> </title>
</head>


<body>

<!--  -->

</form>
<br/>
<hr/>

	<center><br><br>
	<form class="userform" name= WeatherForm action="weather.php" method="GET">
			<h1>Введите Город и Страну</h1>
			<br><p>(Например London, UK)</p>
			<input type="text" name="q" required>
			<input type="submit" name="submit">


   
</form>
</center>

	

	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>

<style>
html, body, h1, h2, h3, h4, h5, h6 {
  font-family: "Century Gothic", cursive, sans-serif;
}
</style>


<?php






error_reporting(0);
$get = json_decode(file_get_contents('http://ip-api.com/json/'),true);
date_default_timezone_set($get['timezone']);
$city = $_GET['q'];
 $string = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=f7f294fddd7d52dd19f7171268cf6307";
 $data = json_decode(file_get_contents($string),true);
 
 $temp = $data['main']['temp'];
 
 $icon = $data['weather'][0]['icon'];
 $visibility = $data['visibility'];
 $visibilitykm = $visibility / 1000;
 $country =  "<h1 class='w3-xxxlarge w3-animate-zoom'><b>".$data['name'].",".$data['sys']['country']."</h1></b>";
 
 $logo = "<center><img src='http://openweathermap.org/img/w/".$icon.".png'></center>";
 $desc = "<b><p>".$data['weather'][0]['description']."</p></b>";
 
 $temperature =  "<b>Температура:".$temp."°C</b><br>";
 $clouds = "<b>Облака:".$data['clouds']['all']."%</b><br>";
 $humidity = "<b>Влажность:".$data['main']['humidity']."%</b><br>";
 $windspeed = "<b>Скорость:".$data['wind']['speed']."m/s</b><br>";
 $pressure = "<b>Давление:".$data['main']['pressure']."hpa</b><br>";
 $visibility =  "<b>Видимость:".$visibilitykm."Km</b><br>";
 $sunrise = "<b>Время восхода:".date('h:i A', $data['sys']['sunrise'])."</b><br>";
 $sunset = "<b>Время заката:".date('h:i A', $data['sys']['sunset'])."</b>";
 
 
?>

	<div class="w3-display-container w3-wide">
		<img src="http://www.designbolts.com/wp-content/uploads/2014/03/Blue-Blur-Background1.jpg" style="width:100%;height:100%;" class="w3-image">
		  <div class="w3-display-topmiddle w3-margin-top">
			
				<?php 
				echo $country;
				echo $logo; 
				echo "<center><h2>".$desc."</h1></center>";
				?>
				


			<?php echo $temperature; ?>
			<?php echo $clouds; ?>
			<?php echo $humidity; ?>
			<?php echo $$windspeed; ?>
			<?php echo $pressure; ?>
			<?php echo $$visibility; ?>
			<?php echo $sunrise; ?>
			<?php echo $sunset; ?>
			</h2>
		</div>
		
	</div>
	
	</div>
</body>
</html>









