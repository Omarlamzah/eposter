var thems
getalldata()
 function getalldata(){
   
    $.get("./php/datapthems.php", function(data, status){
        thems=data
        var conetentdiv=document.getElementById(data)
      
      });

     
    };
       
   