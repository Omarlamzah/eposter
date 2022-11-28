

<?php
include("dbcon.php");

if(isset($_POST["btnath"])){
    $name=$_POST["ntheme"];
    $sql = "INSERT INTO `themes` (`id`, `name`) VALUES (NULL, '$name');";

if ($conn->query($sql) === TRUE) {
  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>