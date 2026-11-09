<?php
$kecamatan = $_POST['kecamatan'];    //menerima daata yang dikirim dari formulir
$longitude = $_POST['longitude']; 
$latitude = $_POST['latitude']; 
$luas = $_POST['luas']; 
$jumlah_penduduk = $_POST['jumlah_penduduk']; 
 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "latihan"; 
 
$conn = new mysqli($servername, $username, $password, $dbname); 
 
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); 
} 
$sql = "INSERT INTO penduduk (`Kecamatan`, `Longitude`, `Latitude`, `Luas`, `Jumlah Penduduk`) 
        VALUES ('$kecamatan', $longitude, $latitude, $luas, $jumlah_penduduk)";
if ($conn->query($sql) === TRUE) { 
echo "New record created successfully"; 
} else { 
echo "Error: " . $sql . "<br>" . $conn->error; 
} 
$conn->close(); 
//header("Location: ../index.php"); 
?> 