<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="church_project";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn){
    die("could not connect to the database".mysqli_connect_error());
}else{
    // echo"success";
}



//login code start

   

//login code ends

//logout function starts

//logout function ends


    $sql="SELECT * FROM members_table";
    // $result=mysqli_query($conn,$sql);
    $result = mysqli_query($conn, $sql) or die( mysqli_error($conn));


    $sql1="SELECT * FROM members_table where servic='service1'";
    $result1 = mysqli_query($conn, $sql1) or die( mysqli_error($conn));

    $sql2="SELECT * FROM members_table where servic='service2'";
    $result2 = mysqli_query($conn, $sql2) or die( mysqli_error($conn));

    $sql3="SELECT * FROM members_table where servic='service3'";
    $result3 = mysqli_query($conn, $sql3) or die( mysqli_error($conn));

        $id = 0;
        $update = false;
        $name = " "; 
        $phone = " "; 
        $residence = " "; 
        $gender = " "; 
        $status = " "; 
        $email = " ";
        $service = " ";







if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE  FROM members_table WHERE id = $id") or die($mysqli->error());

    $_SESSION['message'] = "Record deleted";
    $_SESSION['msg_type'] = "danger";

    header("location: members.php");

}


if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM members_table WHERE id = $id") or die($mysqli->error());
    if ($result && $row = $result->fetch_array()){
        // $row = $result->fetch_array();
        // $name = $row['name'];
        // $location = $row['location'];
        $name = $row['member_name']; 
        $phone = $row['member_phone']; 
        $email = $row['email']; 
        $service = $row['servic']; 
        $residence = $row['member_residence']; 
        $gender = $row['member_sex']; 
        $status = $row['member_status']; 
        $image = $row['member_image'];
    }
}




if(isset($_POST['update'])){        
    // $id = $_POST['id'];
    $name=$_POST['m_Name'];
    $phone=$_POST['m_Phone'];
    $residence=$_POST['m_Residence'];
    $gender=$_POST['m_Gender'];
    $status=$_POST['m_Status'];
    $email=$_POST['m_email'];
    $service=$_POST['service'];

    $target_dir="images/";
    $target_file=$target_dir.basename($_FILES['m_Image']["name"]);
    move_uploaded_file($_FILES['m_Image']["tmp_name"], $target_file);

    $conn->query("UPDATE members_table SET member_name ='$name',  member_phone ='$phone' ,  member_residence ='$residence' ,  member_sex ='$gender' ,  member_status ='$status' ,  email ='$email' ,  servic ='$service' ,  member_image ='$target_file' WHERE id=$id") or      
    die($conn->error);

   $_SESSION['message'] = "Record has been updated!";       
   $_SESSION['msg_type'] = "warning";

   header('location: members.php');    
}






//service1 input function starts

//service1 input function ends


?>






