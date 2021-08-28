<div class="container " style=" ">
<!-- header container begins -->

<!-- header container ends -->
<?php
        while($row=mysqli_fetch_array($result)){
?>
<!-- two columns begin -->
    <div class="container">
        <div class="row">
            <!-- image div begins -->
            <div class="col-sm-4 ">
            
            </div>
            <!-- side div ends -->

            <!-- image div begins -->
            <div class="col-sm-4  ">
                <div class="d-flex justify-content-center">
                    <ul class="list-group d-flex ">
                               
                         <li  class="list-group-item "> <h4><img src="<?= $row['member_image']; ?>" alt="" style="width:315px; height:240px;"/></h4></li>

                    </ul>
                </div> 
            </div>
            <!-- image div ends -->
            <!-- info div begins -->

            <div class="col-sm-4 ">
                <ul class="list-group ">
                    <li  class="list-group-item ">
                        <p ><span class="font-weight-bold" >Name: </span><?= $row['member_name']; ?></p>
                        <p><span class="font-weight-bold" >Tel: </span><?= $row['member_phone']; ?></p>
                        <p><span class="font-weight-bold" >From: </span><?= $row['member_residence']; ?></p>
                        <p><span class="font-weight-bold" >Gender: </span><?= $row['member_sex']; ?></p>
                        <p><span class="font-weight-bold" >Status: </span><?= $row['member_status']; ?></p>
                        <a href="update.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary my-1 mr-4">Update</a>
                        <a href="func.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger my-1 ">Remove</a>

                    </li>  
                </ul>
            </div>
            
            <!-- info div ends -->

        </div>
    </div>
    <!-- two columns  end -->
    <?php } ?>
</div>    

<!-- footer section -->
<footer id="footer_color" class="py-2 bg-dark mt-3">
<div class="container">
  <div class="row">
    <div class="col-md-3  pt-2">
      <img src="image/codes1.jpeg" alt="" height="100">
    </div>
    <div class="col-md-8">
    <span id="footer-cr1" class="footer-cr1">                
      <!-- <p>                            
        <a style="color: white;" href="#">Terms & Conditions</a> |                       
        <a style="color: white;" href="#">Privacy Policy</a> | 
        <a style="color: white;" href="#">Donation Refund Policy</a> |         
      </p> -->
      <p style="color: white;"> 
        &copy; 2010 - 2021. Miracle Manna Church, All rights reserved<br class="Apple-interchange-newline ">
      </p>
      <p> 
Designed by: <a href="#" target="_blank">edemdigital</a> - <a href="#" target="_blank">Powered by: MMC</a><br class="Apple-interchange-newline">
      </p>
    </span> 
    </div>
  </div>
</div>
</footer>
<!--end of footer section -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>