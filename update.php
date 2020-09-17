
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
    if (isset($_REQUEST['insert'])){
      if(($_REQUEST['name']== "") || ($_REQUEST['phone']== "") || ($_REQUEST['email']== "") ||($_REQUEST['semester']== "") ||($_REQUEST['section']== "") ||($_REQUEST['gender']=="")){
        echo "<small> Fill all fields.. </small> <hr>";
        header('location:index.php');
      }
      else{
        $name = $_REQUEST['name'];
        $phone = $_REQUEST['phone'];
        $email = $_REQUEST['email']; 
        $semester = $_REQUEST['semester'];
        $section = $_REQUEST['section'];
        $gender = $_REQUEST['gender'];
    $sql= "UPDATE  football_player SET name='$name', phone='$phone', email='$email', semester='$semester', section='$section', gender='gender' WHERE id='$id'";
    $result= mysqli_query($conn, $sql);
    if($result==true)
    {
      echo "record updated";
      header('location:index.php');
    }
    else{
      echo "failed";
      header('location:index.php');
    }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDE</title>
    <link rel="stylesheet" href="index.css"> 
</head>
<body>
<div class="fplayer">
<p> Football player </p>
</div>
<div class="main">
    <div class="firsthalf">
    <form method="post" autocomplete="off">
      <h1 class="info"> Info </h1>
      <label for="name">Name </label>
          <input type="text" id="name" name="name">
          <label for="phone">Phone </label>
          <input type="number" id="phone" name="phone">
          <label for="email">email:</label>
          <input type="email" id="email" name="email">
      
        <label for="Semester">Semester</label>
        <select id="semester" name="semester">
                      <option value="first semester">First semester</option>
                      <option value="second semester">second semester</option>
                      <option value="third semester">third semester</option>
                      <option value="fourth semester">fourth semester</option>
                      <option value="teacher">teacher</option>
                  </select>
                  <label>Section</label>
          <input type="radio" id="computer" value="computer" name="section"><label for="computer" class="light">computer</label><br/>
          <input type="radio" id="software" value="software" name="section"><label for="software" class="light">software</label><br/>
          <input type="radio" id="teacher" value="teacher" name="section"><label for="teachwer" class="light">teacher</label><br/><br/><br/>
        <label>Gender </label>
        <input type="radio" id="male" value="male" name="gender"><label class="light" for="male">Male</label><br>
        <input type="radio" id="Female" value="Female" name="gender"><label class="light" for="femlale">female</label><br><br/>  
        </div>
        <div class="wrapper">
        <button class="insert" type="insert" name="insert"><i class="fas fa-plus"></i></button>
        </div>
        </div>
    </form>
     </div>
</body>
</html>

