<?php
    
$con=mysqli_connect("localhost","root","","awnlibrary");
 //هذه التعليمة لكي يكون الادخال متوفق بكل اللغوات مايظهر الكلام ملخبط
 mysqli_query($con,"set names 'utf8';");
 if(mysqli_connect_errno())
 {
   echo "failed to connect to MYSQL :".mysqli_connect_error();
 }
   
 
 ?>