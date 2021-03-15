<!DOCTYPE html>
<html>
<head>
<title>Piotr Pistelok</title>
</head>
<body>
<?php
echo("<li>info z dockera,:) ");

$servername = "db";
$username = "root";
$password = "root";
$dbname = "tom";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("<li>Connection failed: " . $conn->connect_error);
}else{
    echo("<li>Connection ok");
}
    $sql = "SELECT * FROM pracownicy, organizacja where id_org=dzial";
    echo("<br>");
    echo($sql);
    $result = mysqli_query($conn, $sql);
    if ( $result) {
        echo "<li>ok";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }
    echo('<table border="1">');
        echo('<th>Id_pracownika</th><th>imię</th><th>dział</th><th>zarobki</th><th>data urodzenia</th><th>id_org</th><th>nazwa działu</th>');
        while($row=mysqli_fetch_assoc($result)){
            echo('<tr>');
            echo('<td>'.$row['id_pracownicy'].'</td><td>'.$row['imie'].'</td><td>'.$row['dzial'].'</td><td>'.$row['zarobki'].'</td><td>'.$row['data_urodzenia'].'</td><td>'.$row['id_org'].'</td><td>'.$row['nazwa_dzial'].'</td>');
            echo('</tr>');
     }
        echo('</table>'."<br>");
        echo("zmiany");
        $d=strtotime("now");
        echo "<li>".date("Y-m-d h:i:sa", $d) . "<br>";

?>
    <form action="insert2.php" method="POST">
	    	<label>Imię: </label><input type="text" name="imie"></br>
		    <label>Dział: </label><input type="number" name="dzial"></br>
		    <label>Zarobki: </label><input type="number" name="zarobki"></br>
		    <label>Data urodzenia: </label><input type="date" name="data_urodzenia"></br>
	    	<input type="submit" value="dodaj pracownika">
	</form>
</body>
</html>