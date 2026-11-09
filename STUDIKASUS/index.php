<?php
$servername = "localhost";
$username= "root";
$password="";
$dbname="latihan";

$conn= new mysqli($servername, $username, $password, $dbname); //menghubungkan PHP dengan MySQL

if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

$sql= "SELECT * FROM menara_telekomunikasi";
$result= $conn->query($sql);

echo "<a href='input/index.html'>Input</a>";

if($result->num_rows > 0){
    echo "<table border='1px'><tr>
        <th>id</th>
        <th>jenis</th>
        <th>tinggi</th>
        <th>kecamatan</th>
        <th>desa</th>
        <th>latitude</th>
        <th>longitude</th>
        <th colspan='2'>Aksi</th>
      </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>".
             "<td>".$row["id"]."</td>". // Tambahkan sel untuk ID di sini!
             "<td>".$row["jenis"]."</td>".
             "<td>".$row["tinggi"]."</td>".
             "<td>".$row["kecamatan"]."</td>".
             "<td>".$row["desa"]."</td>".
             "<td>".$row["latitude"]."</td>".
             "<td>".$row["longitude"]."</td>".
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