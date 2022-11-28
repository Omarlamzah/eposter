<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Document</title>
</head>

<style>
    form{
        width: 50%;
        margin: auto;
        margin-top: 30px;
        padding: 20px;
        background-color: #3f51b5;
        border-radius: 10px;
        box-shadow: 0 0 10px;
    }
</style>

<body>
<?php

include("dbcon.php");

if(isset($_POST["btnepostersubmit"])){
$epname=$_POST["eponame"];
$fileepo=$_FILES["fileepo"];
$themid=$_POST["themid"];
$idp=$_POST["idp"];


$sql = "UPDATE `eposter` SET `url`='$fileepo[name]',`nameposter`='$epname',`idtheme`=$themid WHERE id=$idp";

if ($conn->query($sql) === TRUE) {
 echo    "<h3> eposter est bien modifier</h3>";

 //move_uploaded_file($fileepo,"../pdfs/".$val);
 echo $fileepo["name"];
} else {
  echo "Error updating record: " . $conn->error;
}
}




if(isset($_GET["mp"])){
    $idp=$_GET["mp"];
    
$sqlq = "select * FROM eposter WHERE id=".$idp;

$result = $conn->query($sqlq);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<form  enctype='multipart/form-data' action='' method='post'><div class='modal-body'> <div class='form-group'>
     
        <input type='text' class='form-control' name='eponame' value='".$row['nameposter']."'/>
          <br>
          <input type='file'
          class='form-control' name='fileepo'/>

       <br>
      </div>
      <br>";


        $sql = "SELECT * FROM themes";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
        echo "<select name='themid'>";
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row["id"]."'  class='input-select'>" .$row['name']. "</option>" ;
        
        }
        echo "</select>";


        } else {
        echo "0 results";
        }
        echo "<input name='btnepostersubmit' class='btn btn-primary' type='submit' value='modifier eposter'>";
        echo "<input name='idp' type='hidden' value='$idp'>";
        echo "</form>";
        
    }

    
  
} else {
  echo "Error deleting record:" . $conn->error;
}

    
}





if(isset($_POST["btntemesubmit"])){
$themename=$_POST["themename"];
$idt=$_POST["idt"];


$sql = "UPDATE `themes` SET `name`='$themename' WHERE id=$idt";

if ($conn->query($sql) === TRUE) {
 echo    "<h3> theme est bien modifier</h3>";

 //move_uploaded_file($fileepo,"../pdfs/".$val);

} else {
  echo "Error updating record: " . $conn->error;
}
}



if(isset($_GET["mt"])){
    $idt=$_GET["mt"];
    
$sql = "select * FROM themes WHERE id=".$idt;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<form enctype='multipart/form-data' action='' method='post'><div class='modal-body'> <div class='form-group'>
     
        <input type='text'
          class='form-control' name='themename' value='".$row['name']."'>
       <br>
      </div>
      <input name='btntemesubmit' class='btn btn-primary' type='submit' value='modifier theme'>";
      echo "<input name='idt' type='hidden' value='$idt'>";
       echo "</form>";
        
    }

    
  
}
else{

    echo 22;
}

}



?>

</body>
</html>

