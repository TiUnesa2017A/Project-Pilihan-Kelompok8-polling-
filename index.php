<!DOCTYPE html>
<html>
<head>
	<title>Polling System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div style="background-color: black; color: white; text-align: center; width: 100%; padding: 7px; font-family: comic sans ms;">
		<h2>Vote For Your Favorite Sport. NOW!</h2>
	</div>

<div class="container">
<form action="index.php" method="post" align="center">
	<img src="image/Jakarta.jpg" width="280" height="250"/>
	<img src="image/Surabaya.jpg" width="280" height="250"/>
	<img src="image/Jogja.jpg" width="280" height="250"/>

<input type="submit" name="Jakarta" value="Vote Jakarta!"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="Surabaya" value="Vote Surabaya!"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="Jogja" value="Vote Jogja!"/>

</form>

<?php 
	$con = mysqli_connect("localhost","root","","polling"); 

if(isset($_POST['Jakarta']))
{
	$vote_Jakarta = "update vote set Jakarta=Jakarta+1";
	$run_Jakarta = mysqli_query($con, $vote_Jakarta);

	if($run_Jakarta)
	{
		echo "<h2 align='center'>Your Vote Has Been Cast For Jakarta!</h2>";
		echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";
	}
}
else if(isset($_POST['Surabaya']))
{
	$vote_Surabaya = "update vote set Surabaya=Surabaya+1";
	$run_Surabaya = mysqli_query($con, $vote_Surabaya);

	if($run_Surabaya)
	{
		echo "<h2 align='center'>Your Vote Has Been Cast For Surabaya!</h2>";
		echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";
	}
}
else if(isset($_POST['Jogja']))
{
	$vote_Jogja = "update vote set Jogja=Jogja+1";
	$run_Jogja = mysqli_query($con, $vote_Jogja);

	if($run_Jogja)
	{
		echo "<h2 align='center'>Your Vote Has Been Cast For Jogja!</h2>";
		echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";
	}
}
if(isset($_GET['results']))
{
	$get_vote = "select * from vote";
	$run_vote = mysqli_query($con, $get_vote);
	$row_vote = mysqli_fetch_array($run_vote);

		$Jakarta = $row_vote['Jakarta'];
		$Surabaya = $row_vote['Surabaya'];
		$Jogja = $row_vote['Jogja'];

	$count = $Jakarta+$Surabaya+$Jogja;

	$per_Jakarta = round($Jakarta*100/$count) . "%";
	$per_Surabaya = round($Surabaya*100/$count) . "%";
	$per_Jogja = round($Jogja*100/$count) . "%";

	echo "
	<div style='background-color: yellowgreen' padding: 10px; text-align: center;>
		<center>
			<h2> Updated Result: </h2>

			<p style='background-color: black; color: white; padding: 10px; width: 500px;'>
				<b>Jakarta: </b> $Jakarta ($per_Jakarta)
			</p>
			<p style='background-color: black; color: white; padding: 10px; width: 500px;'>
				<b>Surabaya: </b> $Surabaya ($per_Surabaya)
			</p>
			<p style='background-color: black; color: white; padding: 10px; width: 500px;'>
				<b>Jogja: </b> $Jogja ($per_Jogja)
			</p>

		</center>
	</div>
	";
}
?>

</div>


<div style="background-color: black; color: lightblue; text-align: center; width: 100%; padding: 7px; font-family: comic sans ms;">
	<h2>Dibuat Oleh :</h2>
	<h3>Yessy Septiani Yuono	(17051204004)</h3>
	<h3>Natanael Chrisanta R.	(17051204027)</h3>
	<h3>Tazkiyatun Nia			(17051204039)</h3>
</div>

</body>
</html>