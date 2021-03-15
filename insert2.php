<?php

echo("<br>"."<br>");
echo("DODAŁEŚ PRACOWNIKA<br>");
echo "<li>". $_POST['imie'];
echo "<li>". $_POST['dzial'];
echo "<li>". $_POST['zarobki'];
echo "<li>". $_POST['data_urodzenia'];

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

$sql = "INSERT INTO pracownicy (id_pracownicy, imie, dzial, zarobki, data_urodzenia) 
       VALUES (null, '".$_POST['imie']."', '".$_POST['dzial']."','".$_POST['zarobki']."','".$_POST['data_urodzenia']."')";
echo ("<br>");

echo $sql;
if ($conn->query($sql) === TRUE) {
  echo ("<br>"."Pracownik został pomyślnie dodany.");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>