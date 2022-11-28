<?php

include("dbcon.php");
// ajouter eposter
if(isset($_POST["btnajoutepo"])){
 //$filesinp =$_POST["filesinp"];
 
$i=0;
$theme="";
$title="";


if($_POST["title0"]){echo "nnbnbnbnb";}


 foreach($_FILES["filesinp"]["name"] as $key=>$val){
        move_uploaded_file($_FILES["filesinp"]["tmp_name"][$key],"../pdfs/".$val);
       $_POST["theme$i"];
        $_POST["title$i"];
        
                $sql = "INSERT INTO `eposter` ( `url`, `nameposter`,  `idtheme`) VALUES ('". $val ."','".$_POST["title$i"]."','".  $_POST["theme$i"]  ."');";

                if ($conn->query($sql) === TRUE) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
              
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }

        $i=$i+1;
 }

 print_r($_FILES);
}

?>
	