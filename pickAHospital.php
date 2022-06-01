<?php session_start(); 
  
  
?>




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
                        <h5 style="color:#bd5d38">
                          Second step
                        </h5>
                        <br>
                        <p>Select a hospital from the bar,<br>which includes the patient<br> you want to visit</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5 border">
                <h4 class="pb-4">Pick a Hospital</h4>
                <form method="post" onchange="">
                    <div class="form-row">
                        <div class="form-group col-md-7">

                          <select id="hospital" name="hospital" placeholder="Pick a hospital" class="form-control">
                            <?php

                              $con = mysqli_connect("localhost","root","");
                              mysqli_select_db($con,'hcvs');

                              $cityId = $_SESSION['cityId'];
                              $gethospitalsQuery = "select name from hospital where cityId = $cityId;";
                              $doHospitalsQuery = mysqli_query($con,$gethospitalsQuery);

                              while($answer = mysqli_fetch_array($doHospitalsQuery)){
                                echo "<option>".$answer[0]."</option>";
                              }
                            ?>
                            
                          </select>
                        </div>

                        <div class="form-group col-md-5">
                          
                        </div>

                        <div class="form-group col-md-3">
                          <input  type="submit" name="submit" class="btn btn-md btn-primary btn-block" style="color:#bd5d38; background-color:#fff" value="Next">
                        </div>

                        
                        <div class="form-group col-md-9">
                          
                        </div>
                        <div class="form-group col-md-3">
                          <input  type="submit" name="back" class="btn btn-md btn-primary btn-block" style="color:#bd5d38; background-color:#fff" value="Back">
                        </div>
                   
                        
                    </div>
                  </form>


                  <?php

                    if(isset($_POST['back'])){
                      header("location:pickACity.php");
                    }
                    if(isset($_POST['submit'])){

                      $hospitalName = $_POST['hospital'];
                      $_SESSION['hospitalName'] = $hospitalName;

                      $getTimes = "select * from hospital where name = '$hospitalName';";
                      $doGetTimes = mysqli_query($con,$getTimes);
                      
                      if($timeAnswer = mysqli_fetch_array($doGetTimes)){
                        $_SESSION['hospitalId'] = $timeAnswer[0];
                        $_SESSION['visitStartTime'] = $timeAnswer[2];
                        $_SESSION['visitBreakStart'] = $timeAnswer[3];
                        $_SESSION['visitBreakEnd'] = $timeAnswer[4];
                        $_SESSION['visitEndTime'] = $timeAnswer[5];
                        header("Location:searchForAPatient.php");
                      }
                    }
                  ?>


            </div>
        </div>
    </div>
</section>
<?php
   require("layout.php");
?>