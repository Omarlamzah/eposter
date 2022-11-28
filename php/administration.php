<?php include 'dbcon.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>dashboard</title>
</head>
<style>
    table{text-align: center;}

    .countp{
        display: flex;
    justify-content: center;
    justify-content: space-around;
    padding: 20px;
    background-color: black;
    color: white;
    text-align: center;
    }
    p{margin: 0; padding: 0;
   
    }

    .cp{
        width: 25%;
    padding: 20px;
    
    background-color:  #3f51b5;
    border-radius: 10px;
    transition: 0.3s;
    cursor: pointer;
    font-size: 1.7rem;
    }
    .countp p:first-child:hover{background-color: #f19292;}
    .countp p:last-child{background-color:#3f51b5;}
    .countp p:last-child:hover{background-color: #2b3778;}

    .titlep{
        margin-left: 20px;
    margin-top: 20px;
    font-size: 2rem;
    }


    .theder{
        background-color: black;
        color: white;
    }
    a{text-decoration: none; color: white;}

    table{margin-top: 20px;}
    .dropzoon{width: 100%; height: 300px; border: dotted 1px black; padding: 22%;
    font-size: 2rem;}

    .colordrop{background-color: #2b3778;}


    .inputtxt {
    /* width: 50%; */
    background-color: #6212ad;
    color: white;
    width: 90%;
    margin: auto;
}

.selectopt {
    width: 50%;
    background-color: beige;
    margin: auto;
}
.btn22{
background-color: #b53810;
}
body{font-style: italic;padding: 20px; background-color: #2196f3;}


</style>
<body>


<?php 

//themes
  $sql = "SELECT * FROM themes";
  $result = $conn->query($sql);

  $sql2 = "SELECT * FROM eposter";
  $result2 = $conn->query($sql2);
  echo "<div class='countp'>   <button type='button' class=' cp btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal'>
  ajouter theme
  ".$result->num_rows .'</button>';
  echo "  <button type='button' class='btn22  cp btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal2'>
  ajouter eposter
  ".$result2->num_rows .'</button>'."</div>";

   echo  "<p class='titlep'>themes</p>";
  if ($result->num_rows > 0) {
    echo  "<table class='table table-hover'>";
     echo" <tr class='theder'><th>numero</th> <th>nom</th>  <th>action</th> </tr>";
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["id"]."</td> <td>".$row["name"]."</td>
          
          <td>  <button class='btn btn-danger'><a href='supr.php?table=theme&s=".$row['id']."'>supremer</a>   </button>
          <button class='btn btn-info'> <a href='modif.php?mt=".$row['id']."'>modifier</a>  </button></td>    </tr>" ;
      
      }
      
    } 

    //themes



    
//eposter


  $sql2 = "SELECT * FROM eposter";
  $result2 = $conn->query($sql2);



  if ($result2->num_rows > 0) {
    echo  "<table class='table table-hover'>";
     echo" <tr class='theder'><th>numero</th> <th>nom</th>  <th>action</th> </tr>";
      while($row = $result2->fetch_assoc()) {
          echo "<tr><td>".$row["id"]."</td> <td>".$row["nameposter"]."</td>
          
          <td>  <button class='btn btn-danger'><a href='supr.php?table=poster&s=".$row['id']."'>supremer</a>   </button>
          <button class='btn btn-info'> <a href='modif.php?mp=".$row['id']."'>modifier</a>  </button></td>    </tr>" ;
      
      
      }
    } 	
    	

    //eposter
?>








<!-- Button trigger modal -->

<!-- Modal -->

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ajout theme</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form action="ajoutertheme.php" method="post">
      <div class="modal-body">
       <div class="form-group">
         <label for=""></label>
         <input type="text"
           class="form-control" name="ntheme" id="" aria-describedby="helpId" placeholder="">
        <br>
       </div>
       <input name="btnath" id="" class="btn btn-primary" type="submit" value="ajouter">
      </form>
      </div>
     
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>







<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ajouter eposter</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form id="formepo" action="ajouterposter.php" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
      
            <div ondrop="drop(event)" class="dropzoon"  id="dropzoon">
               <input name="filesinp[]" style="display: none;" onchange="show(event)" id="inputfile" type="file" multiple>
            
            select les posters
              </div>

           
            <br><br>
      <!-- Modal footer -->
            <div id="titlezoone">           </div>
            <br><br>

            <select class="form-select" style="display: none;" name="themev" id="ss">
            <?php

$sql = "SELECT * FROM themes";
$result = $conn->query($sql);


            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["id"]."'>".$row["name"]."</option>" ;
              
              }


            } else {
              echo "0 results";
            }


            ?>
                   </select>

                 
       
            <div class="modal-footer">
            <input name="btnajoutepo" class="btn btn-info" type="submit" value="ajouter eposter"/>

        <button  type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </form>



      
      </div>
     
    </div>
  </div>
</div>

       


<div class="loader">
    <div class="dot"></div>
    <div class="dot2"></div>
</div>
<!-- CSS only -->
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


<script>

window.addEventListener("dragenter",function(event){ event.preventDefault();})
window.addEventListener("dragover",function(event){ event.preventDefault();})
window.addEventListener("drop",function(event){ event.preventDefault();})
var formepo =document.getElementById("formepo")
var dropzone = document.getElementById("dropzoon")
var inputfile = document.getElementById("inputfile")


const formmdata=new FormData(formepo);
dropzone.addEventListener("drop",function(event){
    $("#titlezoone").empty();
    event.preventDefault();
    inputfile.files=event.dataTransfer.files

    console.log(inputfile.files)
    console.log(111111111111111)
    console.log(event.dataTransfer.files)

    for (let e = 0; e < inputfile.files.length; e++) {
         $("#formepo").append(" <br><input class='inputtxt form-control form-select-lg mb-3' name='title"+e+"' type='text' value='"+inputfile.files[e].name+"'/>")
         $("#formepo").append("<select class='selectopt form-select form-select-lg mb-3'  name='theme"+e+"'>"+$("#ss").html()+"</select>");
         $("#formepo").append("<hr/>")
       
         console.log(inputfile.files[e].name) 

    }
     
})



dropzone.addEventListener("dragover",function(event){
    event.preventDefault();
    dropzone.classList.add("colordrop")
    
})
dropzone.addEventListener("dragleave",function(event){
    event.preventDefault();
    dropzone.classList.remove("colordrop")
    
})


   
</script>


</html>