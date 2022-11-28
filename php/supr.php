<?php


include("dbcon.php");

if(isset($_GET["table"])){
  $keys=$_GET["s"];


  if($_GET["table"]=="theme"){
    $sql = "DELETE FROM `themes` WHERE id=$keys";

   

    if ($conn->query($sql) === TRUE) {

      header('Location: ' . $_SERVER['HTTP_REFERER']);

    } else {
      echo "Error deleting record: " . $conn->error;
    }
    
  }



  if($_GET["table"]=="poster"){

    $sql = "DELETE FROM `eposter` WHERE id=$keys";

    if ($conn->query($sql) === TRUE) {

      unlink("../pdfs/e".$keys.".pdf");
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
      echo "Error deleting record: " . $conn->error;
    }
  }

}







?>