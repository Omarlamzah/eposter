
<?php include 'dbcon.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    <title>Document</title>
</head>
<body>
    
<style>
    .ifr{
        width: 100vw;
        height: 100vh;
    }


    img{
        width: 100px;
        position: absolute;
        bottom: 0;
        transition: 0.3;
    }
    img:hover{
       filter: brightness(0.3);
    }
</style>



<?php

if(isset($_GET["n"])){

$n=$_GET["n"];
 echo "<iframe class='ifr' src='../pdfs/".   $n  ."'></iframe>
 <button><a href='".$_SERVER["HTTP_REFERER"]."'><img src='../pics/prev.jpg'></a></button>
 
 " ;

}
?>
</body>
</html>



