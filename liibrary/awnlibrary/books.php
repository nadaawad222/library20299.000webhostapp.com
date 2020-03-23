
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  
  <!-- هنا نفحص اسم الصفحة المرسلة من شان نخلف الخلفية بناء
   على معلومات الصفحة مثلا اذا الصفحة المرسلة حاسب يتم جعل الخلفية حاسب
   -->
 <?php if($_GET['depart']=='القانون والشريعة')
 {
	 echo"<style> 
      body{
		background-image:url('img/كتب4.jpg');
			 background-size:800px; 
			 background-attachment: fixed;
	  }
	 </style>"; 
	}

	 else if($_GET['depart']=='العلوم الطبية التطبقية')
	 {
		echo"<style> 
		body{
		  background-image:url('img/صفحه الكتب6.jpg');
			   background-size:1000px; 
			   background-attachment: fixed;
		}
	   </style>"; 
	 }

	 
	 else if($_GET['depart']=='العلوم')
	 {
		echo"<style> 
		body{
		  background-image:url('img/صفحه الكتب1jpg.jpg');
			   background-size:cover; 
			   background-attachment: fixed;
		}
	   </style>"; 
		 
	 }

	 
	 else 
	 {
		 
		echo"<style> 
		body{
		  background-image:url('img/صفحه ثلاثه1.jpg');
			   background-size:cover; 
			   background-attachment: fixed;
		}
	   </style>"; 
	 }

	 
	

 
 ?>

  
  <!-- Bootstrap core CSS -->
 
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/bootstrap-rtl.min.css">

<body>


<script>
     function ImageShow(imgeUpload, previewImage) {
            if (imgeUpload.files && imgeUpload.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(previewImage).attr('src', e.target.result);
                }
                reader.readAsDataURL(imgeUpload.files[0]);

            }
        }
    </script>

  <div class="row">
  
  <div class="col-sm-4 col-sm-offset-4">
  
	<h2 class="text-center">  الكتب </h2>
	
		<form action="" method="post" enctype="multipart/form-data">
		<table class="table">
		<tr>
		<td> اسم الكتاب</td>
		<td> <input type="text" name="bookName" class="form-control" required /> </td>
		</tr>
		
		

        <tr>
		<td> اسم الناشر</td>
		<td> <input type="text" name="bookAuther" class="form-control" required /> </td>
        </tr>
        
       <tr>
		<td> المستوى </td>
		<td> <select  name="level" class="form-control"> 
		<option value=""> اختار </option>
		<option value="المستوى الاول">  المستوى الاول</option>
		<option value="المستوى الثاني">  المستوى الثاني</option>
	
	
	
		</select>
		</td>
		</tr>
		<tr>
		<td>اختيار صورة </td>
		<td>
		 <img src="img/لاب.jpg" style="margin:10px;" height="150" width="150" id="Imagepreview" class="rounded-circle z-depth-0" />
        <input type="file" name="img" id="image" onchange="ImageShow(this,document.getElementById('Imagepreview'))" value="تحميل" class="form-control" >
        </td>
		</tr>
		
		<tr> 
		<td></td> 
		<td> <input type="submit" name="addbooks" value="حفظ"  class="btn btn-success"></dt>
		</tr>
		</table>
		</form>
	</div>
	
	
	<?php    include('database.php');
	if(isset($_POST['addbooks']))
	{
     
		
		$a=$_POST['bookName'];
		
		$c=$_POST['bookAuther'];
	

		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["img"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
		move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
	
	
		$img=basename($_FILES["img"]["name"]); // used to store the filename in a variable
		$e=$_GET['depart'];

		$f=$_POST['level'];
       
        $sql="INSERT INTO `book`(`bookName`, `bookAuther`, `img`, `depart`, `level`)
         VALUES ('$a','$c','$img','$e','$f')";
         $q=mysqli_query($con,$sql);
         if($q)
         {
         echo"<script> alert('تم حفظ الكتاب  باسم $a') </script>";
         }
		
		
	}
	
	?>
	
	

	
  </div><!--row-->
  
  
	
  
  
	<div class="row">
	  <div class="col-sm-10 col-sm-offset-1">
	  
		<h2> قائمة الكتب </h2>
		

		
		<table class="display" id="mytable">
		<thead>
		<tr>
		
		<th>اسم الكتاب </th>
	

		<th> اسم الناشر </th> 
		
		<th> التخصص</th> 
		
		<th>المستوى </th>
		<th >الصورة </th>
		</tr>
		</thead>
		<tbody>
            <?php 
            
                
                $x=$_GET['depart'];
                $sql="select * from book where depart='$x'";
                $q=mysqli_query($con,$sql);
				while($p=mysqli_fetch_array($q))
				{
				echo"<tr>";
			
				echo"<td>".$p['bookName']."</td>";
          
                echo"<td>".$p['bookAuther']."</td>";
           
                echo"<td>".$p['depart']."</td>";
                echo"<td>".$p['level']."</td>";
				
				echo"<td><img src='img/".$p['img']."' class='' width='200' /></td>";
										
				echo"</tr>";
                }
            
					
			?>
			</tbody>
			
			</table>
	</div>
        </div><!--row-->
       				 
   <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>

  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- Your custom scripts (optional) -->

  <link rel="stylesheet" type="text/css" href="css/DataTable.css">
		<script src="js/jq.js"></script>
		<script src="js/DataTable.js"></script>
		
		<script language="javascript">
				$(document).ready(function() {
					$("#mytable").DataTable();
				} );
		
		</script>
		 

</body>

</html>