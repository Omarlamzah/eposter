
<?php include 'dbcon.php'?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/css.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="../style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css" integrity="sha512-kwJUhJJaTDzGp6VTPBbMQWBFUof6+pv0SM3s8fo+E6XnPmVmtfwENK0vHYup3tsYnqHgRDoBDTJWoq7rnQw2+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>eposter</title>
    <link rel="stylesheet" href="../style/keybord/style.css">
</head>
<style>
  
#divshowhide{

    position: fixed;
    width: 10%;
    position: absolute;
    right: 0;
    height: 38vh;
    bottom: 0;

}

.keyboard_wrapper {
  
    width: 100%;
    left: 0;
}
</style>

<body class="bodycc">

 

<div id="info">
<?php
if(isset($_POST["txtrech"])){
   
    $sql;
    $categor=$_POST["choices-single-defaul"];
    $txtrech=$_POST["txtrech"];

    if($categor=="0"){

        $sql = "SELECT * FROM themes";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='iposter'> <a class='lien' href='../php/recharche.php?qq=".$row["id"]."'/>". $row["name"]."</a></div>" ;
            
            }
          } 
    }


    if($categor==1){ 
        $sql = "SELECT * FROM themes where name like '%".$txtrech."%'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
          
              echo "<div class='iposter'> <a class='lien' href='../php/recharche.php?qq=".$row["id"]."'/>". $row["name"]."</a></div>" ;

          
          
            }
        } 
  }


  if($categor==2){ 
    $sql = "SELECT * FROM eposter where nameposter like '%".$txtrech."%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           echo "<div class='iposter'> <a class='lien' class='lien' href='../php/displypdf.php?n=".$row["id"]."'>". $row["nameposter"]."</a>  
           </div>" ;     
        }
      } 
}
     }
     	

    
     if(isset($_GET["qq"])){
        
        $sql = "SELECT * FROM `eposter` WHERE idtheme=".$_GET["qq"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='iposter'> <a class='lien' class='lien' href='../php/displypdf.php?n=".$row["url"]."'>". $row["nameposter"]."</a>  
                </div>" ;   }
          } 
        

     }

    else{ 
        
    }

  


?>



</div>








<div class="keyboard_wrapper">
    <pre class="display"></pre>

    
    <div class="key">
        <div class="row">
            <span data-key="q">q</span>
            <span data-key="w">w</span>
            <span data-key="e">e</span>
            <span data-key="r">r</span>
            <span data-key="t">t</span>
            <span data-key="y">y</span>
            <span data-key="u">u</span>
            <span data-key="i">i</span>
            <span data-key="o">o</span>
            <span data-key="p">p</span>
        </div>

        <div class="row">
            <span data-key="a">a</span>
            <span data-key="s">s</span>
            <span data-key="d">d</span>
            <span data-key="f">f</span>
            <span data-key="g">g</span>
            <span data-key="h">h</span>
            <span data-key="j">j</span>
            <span data-key="k">k</span>
            <span data-key="l">l</span>
        </div>

        <div class="row">
            <span class="caps">caps</span>
            <span data-key="z">z</span>
            <span data-key="x">x</span>
            <span data-key="c">c</span>
            <span data-key="v">v</span>
            <span data-key="b">b</span>
            <span data-key="n">n</span>
            <span data-key="m">m</span>
            <span class="backspace">
                <i class="fa fa-angle-left"></i>
                <i class="fa fa-close"></i>
            </span>
        </div>


        <div class="row">
            <span data-key="0">0</span>
            <span data-key="1">1</span>
            <span data-key="2">2</span>
            <span data-key="3">3</span>
            <span data-key="4">4</span>
            <span data-key="5">5</span>
            <span data-key="6">6</span>
            <span data-key="7">7</span>
            <span data-key="8">8</span>
            <span data-key="9">9</span>
        </div>

        <div class="row">
            <span class="space" data-key=" ">
                Space
            </span> 
        </div>
    </div>

    <div class="s003">
      <form action="../php/recharche.php" method="post"  enctype="mu">
        <div style="width: 55vw;" class="inner-form">
          <div class="input-field first-wrap">
            <div class="input-select">
              <select data-trigger="" name="choices-single-defaul">
                <option  selected  value="0">Category</option>
                <option  value="1">thems</option>
                <option  value="2">eposter</option>
                <option  value="3">numero</option>
              
              </select>
            </div>
          </div>
          <div class="input-field second-wrap">
            <input id="inptxt" name="txtrech" id="search" type="text" placeholder="Enter Keywords?" />
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="submit">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
      </form>
      <button class="btnchome" id="btnclavie"><img id="umgvlavie" src="../pics/clavier.png" alt="" srcset=""></button>
      <button onclick="gohome()" class="btnchome btnh" style="left: -110px;bottom: 0;" id="btnclavie"><img id="umgvlavie" src="../pics/home.png" alt="" srcset=""></button>

</div> <br><br>



<div onclick="fullscreen()" id="divshowhide">
  
</div>

</div>
</body>
<!-- key board -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script src="../js/js.js"></script>
<script src="../js/extention/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js" integrity="sha512-b4rL1m5b76KrUhDkj2Vf14Y0l1NtbiNXwV+SzOzLGv6Tz1roJHa70yr8RmTUswrauu2Wgb/xBJPR8v80pQYKtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    lightGallery(document.querySelector(".info"))
</script>

<script src="../js/keyb.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>

 
var btnclavie=$("#btnclavie");
var key=$(".key");

btnclavie.click(function(){

key.toggle(1000)
});




function gohome(){
  window.location.href = "../index.php";
}


var togle=false;
function fullscreen(){

    if(togle==false)
    {
        document.documentElement.webkitRequestFullscreen()
         togle=true
    }
    else{
        togle=false
        document.exitFullscreen()

    }
    


}

    

</script>
</html>