<html>
<head>
	<style>
		body{
			width:960px;
			margin: 0 auto;
		}
		.userForm{
			padding-top: 50px;
		}
	</style>
</head>
<body>
	<form class="userForm" name="weatherForm" action="weather.php" method="GET">
		<h1>Your weather for Today</h1>
		City:<input type="text" name="city"><br/>
		Country:<input type="text" name="country"><br/>
		<input type="submit" name="submit" value="Submit"/>
	</form>
	<br/>
	<br/>

	<?php
		if(isset($_GET)){

			$user_city=$_GET['city'];
			$user_country = $_GET['country'];


			$api_url = "http://api.openweathermap.org/data/2.5/weather?q=". $user_city. "," .$user_country. " &APPID=7b45fe3c8192ffd302bc7bfc83153e7c";
			$weather_data = file_get_contents($api_url);
			$json = json_decode($weather_data,TRUE);


			$user_temp = $json['main']['temp'];
			$user_humidity= $json['main']['temp'];
			$user_conditions = $json['weather'][0]['main'];
			$user_wind= $json['wind']['speed'];
			$user_wind_direction = $json['wind']['deg'];


			echo "City                 :". $user_city. "<br/>";
			echo "Country:              ". $user_country. "<br/>";
			echo "Humidity:             ". $user_humidity. "<br/>";
			echo "Current Condition:    ". $user_conditions. "<br/>";
			echo "Wind Speed:           ". $user_wind. "<br/>";
			echo "Wind Direction:       ". $user_wind_direction. "<br/>";
			echo "Current Temperature:  ". $user_temp. "<br/>";

			};
			?>



			<?php 
			if (isset($_GET['submit']))
			{
				$data = "data.json";
				$json_string = json_encode($_GET,JSON_PRETTY_PRINT);
				file_put_contents($data, $json_string,FILE_APPEND);
			};
			?>
				

</body>