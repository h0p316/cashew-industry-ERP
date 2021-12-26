<?php


 
    if(isset($_POST['cal']))  
    {  
        $id = $_POST['day'];  
        $day = $_POST['amount'];  
        $sum =  $id * $day;   
        echo "<div style=\"text-align:center\">";
        echo "<h1 style=font-family:verdana >";
        echo  "<p style=color:green>";
        echo "The total salary for  $day Days is $sum /Rs";  
        echo "</p>";
        echo "</h1>";
        echo "</div>";
        
    } 
    




     
    ?>


