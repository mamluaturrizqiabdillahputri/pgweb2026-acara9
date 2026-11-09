<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data</title>
</head>
<body>

<h2>Form Edit</h2>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "latihan";

    $sconn = new mysqli($servername, $username, $password, $dbname);
    if ($sconn->connect_error){
        die("Connection failed: ".$sconn->connect_error);
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM penduduk WHERE id = $id";
    $result = $sconn->query($sql);

    if ($result && $result->num_rows > 0) { 
        echo "<form action='edit.php' onsubmit='return validateForm(event)' method='post'>"; 
        while($row = $result->fetch_assoc()) { 
            echo "<input type='hidden' name='id' value='".$row['id']."'><br>"; 
            
            echo "<label for='kec'>Kecamatan:</label><br>"; 
            echo "<input type='text' id='kec' name='kecamatan' value='".$row['Kecamatan']."'><br>"; 

            echo "<label for='long'>Longitude:</label><br>"; 
            echo "<input type='text' id='long' name='longitude' value='".$row['Longitude']."'><br>"; 

            echo "<label for='lat'>Latitude:</label><br>"; 
            echo "<input type='text' id='lat' name='latitude' value='".$row['Latitude']."'><br>"; 

            echo "<label for='luas'>Luas:</label><br>"; 
            echo "<input type='text' id='luas' name='luas' value='".$row['Luas']."'><br>"; 

            echo "<label for='jml_pddk'>Jumlah Penduduk:</label><br>"; 
            echo "<input type='text' id='jml_pddk' name='jumlah_penduduk' value='".$row['Jumlah Penduduk']."'><br><br>"; 
        } 
        echo "<input type='submit' value='Submit'>";     
        echo "</form>";   
    }    
?> 
 
<p id="informasi" style="color: red;"></p>

<script> 
    function validateForm(event) { 
        let luas = document.getElementById("luas").value; 
        let text = ""; 

        if (isNaN(luas) || luas < 1) { 
            text = "Data luas harus berupa angka dan tidak boleh bernilai negatif/nol"; 
            event.preventDefault(); 
            document.getElementById("informasi").innerHTML = text;
            return false;
        }   
        return true;
    } 
</script> 

</body>
</html>