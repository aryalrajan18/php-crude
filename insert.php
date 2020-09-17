<?php 
session_start();
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gces_sports');
$conn = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn==false){
    die('Error:cannot connected');
}
?>
<?php
if (isset($_REQUEST['insert'])){
  if(($_REQUEST['name']== "") || ($_REQUEST['phone']== "") || ($_REQUEST['email']== "") ||($_REQUEST['semester']== "") ||($_REQUEST['section']== "") ||($_REQUEST['gender']=="")){
    echo "<small> Fill all fields.. </small> <hr>";
  }
  else{
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email']; 
    $semester = $_REQUEST['semester'];
    $section = $_REQUEST['section'];
    $gender = $_REQUEST['gender'];
    $sql= "INSERT INTO football_player( name,phone,email,semester,section,gender) VALUES(?,?,?,?,?,?)";
    $result = $conn->prepare($sql);
    $result->bind_param('sdssss', $name,$phone,$email,$semester,$section,$gender);
    $result->execute();
    $result->close();
   $_SESSION['msg']="data added";
   header('location:index.php');
}
}
?>
<?php
if (isset($_REQUEST['refresh'])){
header('location:index.php');
}
?>

