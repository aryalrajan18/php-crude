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
<div class="high">
<div class="main">
    <div class="firsthalf">
    <form  action="insert.php" method="post" autocomplete="off">
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
          <button class="refresh" type="refresh" name="refresh"><i class="fas fa-sync"></i></button>
        </div>
    </form>
</div>
</div>
      <script src="https://kit.fontawesome.com/fbe32d5adc.js" crossorigin="anonymous"></script>
</body>
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
  padding: 5px;
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
  <div class="side">
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
    echo "<th> update </th>";
    echo "<th> delete </th>";
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
        echo "<td>" ?> <a href="update.php?id=<?php echo $id?>"><i class="fas fa-pen-alt"> </i></a></td>
<?php  echo "<td>"?> <a href="delete.php?id=<?php echo $id?>"><i class="fas fa-trash"> </i></a></td>
 <?php
    
    }
    echo "</tbody>";
    echo "</table>";

    } else {
        echo "0 result";
    }
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/fbe32d5adc.js" crossorigin="anonymous"></script>
  </div>
    </body>
    <?php
    mysqli_stmt_close($result);
    mysqli_close($conn);
    ?>
