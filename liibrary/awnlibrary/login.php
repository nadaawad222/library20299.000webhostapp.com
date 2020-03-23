<!DOCTYPE html>
<html>
<head>
<title> 
Login ang Regidtration 

</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/mdb.min.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel ="stylesheet" href="css/style_100.css">

</head>
<body>
<?php 
      include('database.php');
     
     if(isset($_POST['login'])){

           
            $a=$_POST['email'];
            $b=$_POST['password'];

            $sql="SELECT * FROM `user` where email='$a' and password='$b'";
            $q=mysqli_query($con,$sql)or die(" غلط ".mysqli_error($con));
            $row=mysqli_fetch_array($q);
            $email =$row['email'];
      
       
        // Mysql_num_row is counting table row
         $count=mysqli_num_rows($q);
         // If result matched $a and $b, table row must be 1 row
         if($count>0)
           { 
             session_start();
             $_SESSION['email']=$email;
             echo"<script> alert('تم الدخول بنجاح !!')</script>";
          echo"<script> window.open('department.php','_self') </script>";
       

           }

          }


     if(isset($_POST['reg'])){
         $a=$_POST['fName'];
         $b=$_POST['lName'];
         $c=$_POST['email'];
         $d=$_POST['password'];

         $sql="INSERT INTO `user`( `fName`, `lName`, `email`, `password`)
          VALUES('$a','$b','$c','$d') ";

          $q=mysqli_query($con,$sql) or die(" غلط ".mysqli_error($con));
          echo"<div class='alert-info text-center'>  تم التسجيل بنحاح!!</div>";


     }
     ?>

<div class="login-page">
<div class="form">
    <form class="register-form"  method="post">
	<input type="text" name="fName"  placeholder="الاسم الاول">
	<input type="text"  name="lName" placeholder="اسم العائلة" >
	<input type="text"  name="email" placeholder="البريد الإكتراني">
	<input type="password"  name="password"  placeholder="كلمةالسر">
	
	<button type="submit" name="reg" > Create </button>
	<p class="message"> Aleady Registered? <a href="#"> تسجيل دخول</a>
	</p>
	
	
	</form>
	
	<form class="login-form" method="post">
	<input type="text" name="email" placeholder="البريد الإكتراني أو رقم الجوال"/>
	<input type="password" name="password" placeholder="كلمة السر"/>
	<button type="submit" name="login">تسجيل دخول</button>
    <p class="message">ليس لديك حساب؟ <a href="#"> تسجيل</a> </p>
    </form>

    <label data-error="wrong" data-success="right" 
	for="modalLRInput11"></label>
          <div class="options text-center text-md-center mt-1">
          <p><a href="#" class="blue-text">نسيت كلمه المرور؟</a></p>
        <div>
    </div>
    
    

	</div>
	
	
    
	
	
	

			<!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>

  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script>
	$('.message a').click(function(){
	$('form').animate({height:"toggle",opacity:"toggle"},"slow");
	return false;
	});
	
	</script>

</body>


</html>
