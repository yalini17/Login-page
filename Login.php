<?php

$uname1 = $_POST['unamel'];
$upswd1 = $_POST['upswdl'];
$login = $_POST['login'];



  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "form project";
  $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

  if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());
  } else {
    $SELECT = "SELECT uname1,upswd1 From register Where uname1 = ? and upswd1 = ? Limit 1";
    
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("ss",$uname1,$upswd1);
$stmt->execute();
$stmt->bind_result($uname1,$upswd1);
$stmt->store_result();
$field_row = $stmt->num_rows();
// print_r($field_row);
 if (!$field_row){
  
  //Set the URL of the HTML page you want to redirect to
 $url = 'http://localhost/validate%20form/register.html';

 // Use the echo statement to output an HTML meta tag that will redirect to the URL
 echo '<meta http-equiv="refresh" content="0;url=' . $url . '">';

  //Use the exit statement to stop the script from running any further
 exit;
 }
 else{
   $url = 'http://localhost/validate%20form/result.html';
   echo '<meta http-equiv="refresh" content="0;url=' . $url . '">';
 } 
  }
  
$stmt->close();
$conn->close();

?>