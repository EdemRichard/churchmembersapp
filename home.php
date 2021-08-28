<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	// header('Location: index.html');
	echo "<script>window.open('index.php', '_self')</script>";
	exit;
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'mydb';
// Try and connect using the info above.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}



if(isset($_POST['submit']))
{
    $name=$_POST['m_Name'];
    $phone=$_POST['m_Phone'];
    $email=$_POST['m_email'];
    $residence=$_POST['m_Residence'];
    $gender=$_POST['m_Gender'];
    $status=$_POST['m_Status'];
    $service=$_POST['service'];

    $target_dir="images/";
    $target_file=$target_dir.basename($_FILES['m_Image']["name"]);
    move_uploaded_file($_FILES['m_Image']["tmp_name"], $target_file);

    $sql="INSERT INTO members_table (member_name,member_phone,member_residence,member_sex,member_status,email,servic,member_image) VALUES('$name','$phone','$residence','$gender','$status','$email','$service','$target_file')";

    if(mysqli_query($conn,$sql)){
        $msg="Product added to the database successfully!";
    }else{
        $msg="Fail to add product to the database!";
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body class="loggedin">
	<?php include 'navbar.php'; ?>
    
		<div class="content  mt-5">
			<h2>Home Page</h2>
			<p>
			<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
        <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
            <nav id="sidebar">
				<div >
				
	        <ul class="list-unstyled components mb-5">
	          
	          <li>
              <a href="" class="list-group-item active text-decoration-none" style="background-color:#3498DB; color:#ffffff; border-color:#3498DB">DASHBOARD</a>
              <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed list-group-item text-decoration-none"> VIEW MEMBERS </a>
	            <ul class="list-unstyled collapse" id="pageSubmenu2" style="">
                
                <li><a href="main.php" class=" text-decoration-none"> ALL MEMBERS  </a></li>
                <li><a href="members1.php" class=" text-decoration-none"> SERVICE 1 MEMBERS </a></li>
                <li><a href="members2.php" class=" text-decoration-none"> SERVICE 2 MEMBERS </a></li>
                <li><a href="members3.php" class=" text-decoration-none"> SERVICE 3 MEMBERS </a></li>
                
	            </ul>
	          </li>
              <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
                
	          <a href="index.php" class="list-group-item text-decoration-none">LOG IN PAGE </a>
              <a href="logout.php?logout" class="list-group-item text-decoration-none">LOG OUT</a>
              
              <!-- <form action="welcome.php" method="post">
                <input type="submit" name="logout" value="Logout !">
              </form> -->
	        </ul>
					
	      </div>
    	</nav>
     
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body" style="background-color:#3498DB; color:#ffffff">ADD NEW MEMBER</div>
                <div class="card-body">
                <!-- form-->
                <div class="form-group">
                SERVICE 1<input type="radio" name="service" class="mr-2" value="service1"/> 
                SERVICE 2<input type="radio" name="service" class="mr-2" value="service2"/> 
                SERVICE 3<input type="radio" name="service" class="mr-2" value="service3"/> 
                </div>
                <div class="form-group">
                    <input type="text" name="m_Name" class="form-control"  placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="m_Phone" class="form-control"  placeholder="Phone Number" required>
                </div>
                <div class="form-group">
                    <input type="email" name="m_email" class="form-control"  placeholder="email" >
                </div>
                <div class="form-group">
                    <input type="text" name="m_Residence" class="form-control"  placeholder="Residence" required>
                </div>
                <div class="form-group">
                    <input type="text" name="m_Status" class="form-control"  placeholder="Status" required>
                </div>
                <div class="form-group">
                    <input type="text" name="m_Gender" class="form-control"  placeholder="Gender" required>
                </div>
                <div class="form-group">
                   <div class="custom-file">
                    <input type="file" name="m_Image" class="custom-file-input"  id="customFile" required>
                    <label for="customFile" class="custom-file-label">Choose Member Image</label>
                   </div>
                </div>
                <div class="form-group">
                
                    <input type="submit" name="submit" class="btn  btn-block" style="background-color:#3498DB; color:#ffffff" value="Add">
                </div>
                <div class="form-group">
                    <!-- <h4 class="text-center"><?= $msg;?></h4> -->
                </div>
            </form>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>

    </div>
</div>
<!-- <?php
    if(isset($_POST["logout"])){
        header("Location: logout.php");
    }
?> -->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
			</p>
		</div>
	</body>
</html>