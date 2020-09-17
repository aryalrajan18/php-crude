<?php
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gces_sports');
$conn = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn==false){
    die('Error:cannot connected');
}
    extract($_POST);
    extract($_GET);
$sql= "DELETE from football_player where id='$id'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
}
 else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
header('location:index.php');
?>
