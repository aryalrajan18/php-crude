<?php
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gces_sports');
$conn = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn==false){
    die('Error:cannot connected');
}
?>
<!DOCTYPE html>
<head>
<title> table </title>
<head>
<style>
#tablestyle {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tablestyle td, #tablestyle th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tablestyle tr:nth-child(even){background-color: #f2f2f2;}

#tablestyle tr:hover {background-color: #ddd;}

#tablestyle th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<?php
$sql = "SELECT * FROM football_player";
$result = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_result($result, $id, $name, $phone, $email, $semester,$section, $gender);
mysqli_stmt_execute($result);
mysqli_stmt_store_result($result);
if(mysqli_stmt_num_rows($result)>0)
{
    echo '<table id="tablestyle">';
    echo "<thead>";
    echo "<tr>";
    echo "<th> ID </th>";
    echo "<th> NAME</th>";
    echo "<th> PHONE </th>";
    echo "<th> EMAIL </th>";
    echo "<th> SEMESTER </th>";
    echo "<th> SECTION </th>";
    echo "<th> GENDER </th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row=mysqli_stmt_fetch($result)){
        echo "<tr>";
        echo "<td>" . $id . "</td>";
        echo "<td>" . $name . "</td>";
        echo "<td>" . $phone . "</td>";
        echo "<td>" . $email . "</td>";
        echo "<td>" . $semester . "</td>";
        echo "<td>" . $section. "</td>";
        echo "<td>" . $gender . "</td>";
    
    }
    echo "</tbody>";
    echo "</table>";

    } else {
        echo "0 result";
    }
    ?>
    </body>
    <?php
    mysqli_stmt_close($result);
    mysqli_close($conn);
    ?>
