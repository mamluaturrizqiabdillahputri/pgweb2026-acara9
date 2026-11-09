<?php
$servername = "localhost";
$username= "root";
$password="";
$dbname="latihan";

$conn= new mysqli($servername, $username, $password, $dbname); //menghubungkan PHP dengan MySQL

if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

$sql= "SELECT * FROM penduduk";
$result= $conn->query($sql);

echo "<a href='input/index.html'>Input</a>";

if($result->num_rows > 0){
    echo "<table border='1px'><tr>
        <th>id</th>
        <th>Kecamatan</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Luas</th>
        <th>Jumlah Penduduk</th>
        <th colspan='2'>Aksi</th>
      </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>".
             "<td>".$row["id"]."</td>". // Tambahkan sel untuk ID di sini!
             "<td>".$row["Kecamatan"]."</td>".
             "<td>".$row["Longitude"]."</td>".
             "<td>".$row["Latitude"]."</td>".
             "<td>".$row["Luas"]."</td>".
             "<td align='right'>".$row["Jumlah Penduduk"]."</td>".
             "<td><a href='delete.php?id=".$row["id"]."'>hapus</a></td>".
             "<td><a href='edit/index.php?id=".$row["id"]."'>edit</a></td>". 
             "</tr>";
    }
    echo "</table>";
} else {
    echo "0 result";
}
$conn->close();
?>