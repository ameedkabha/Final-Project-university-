<?php session_start(); ?>
 
 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style>
/* body{
  width: 80%;
} */
</style>

<section class="testimonial py-8" id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-4 py-6   text-center ">
                <div class="">
                    <div  class="">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h2 style="font-size: 20px;" class="py-3">Registration</h2>
                        <h5 style ="color:#bd5d38">
                          sixth step
                        </h5>
                        <br>
                        <p>press the first button to reserve a parking, otherwise press next</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5 border">
                <h4 class="pb-4">Reserve a parking</h4>

                <form method="post" onchange="">
                    <div class="form-row">

                        <div class="form-group col-md-10">
                            <input  type="submit" name="yes" class="btn btn-md btn-primary btn-block" value="Yes, reserve one for me please.">
                        </div>
                   
                        <div class="form-group col-md-10" >
                            <input  type="submit" name="no" class="btn btn-md btn-primary btn-block" value="No, thank you i prefer to walk.">
                        </div>
                       
                        <div class="form-group col-md-5">
                            <input  type="submit" name="back" class="btn btn-md btn-primary btn-block" style="color:#bd5d38; background-color:#fff" value="Back">
                        </div>
                   
                        <div class="form-group col-md-5" >
                            <input  type="submit" name="submit" class="btn btn-md btn-primary btn-block" style="color:#bd5d38; background-color:#fff" value="Next">
                        </div>
                        
                    </div>
                </form>


                <?php
                    if(isset($_POST['back'])){
                        header("location:visitorInfo.php");
                    }
                    if(isset($_POST['yes'])){

                        $con = mysqli_connect("localhost","root","");
                        mysqli_select_db($con,'hcvs');

                        $hospitalName = $_SESSION['hospitalName'];
                        $getHospitalId = "select id from hospital where name = '$hospitalName';";
                        $doGetHospitalId = mysqli_query($con,$getHospitalId);
                        $hospitalId = mysqli_fetch_array($doGetHospitalId);

                        $checkParking = "select id,parking_number,parking_row,parking_column from parking where is_reserved = 0 and hospitalId = $hospitalId[0];";
                        $doCheckParking = mysqli_query($con,$checkParking);

                        if($answer = mysqli_fetch_array($doCheckParking)){
                            $updateQuery = "update parking
                            set is_reserved = 1
                            where id = $answer[0];";
                            $doUpdateQuery = mysqli_query($con,$updateQuery);

                            $parkingNumber = $answer[1];
                            $parkingRow = $answer[2];
                            $parkingColumn = $answer[3];
                            $_SESSION['parkingNumber'] = $parkingNumber;
                            $_SESSION['parkingRow'] = $parkingRow;
                            $_SESSION['parkingColumn'] = $parkingColumn;

                            echo "<div class='form-row'>
                                Go to Parking number ".$parkingNumber." Row ".$parkingRow." Column ".
                                $parkingColumn." its for you!
                                </div>";


                        }else{
                            echo "<div class='form-row'>
                                Sorry, there is no parking area available right now!
                            </div>";
                        }
                    }
                    if(isset($_POST['submit'])){

                        
                        header("location:doQrCode.php");
                    }
                   
                ?>


            </div>
        </div>
    </div>
</section>
<?php
      require("layout.php");

   ?>