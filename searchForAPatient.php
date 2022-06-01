<?php session_start();
  
?>
 
 
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
                          third step
                        </h5>
                        <br>
                        <p>search for a patient,<br> using his full name or<br> SSN or phone number<br> (starting with 05**)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5 border">
                <h4 class="pb-4">Insert patient information</h4>

                <form method="post" onchange="">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                          <input id="name" name="name" placeholder="Patient name" class="form-control" type="text">  
                        </div>

                        <div class="form-group col-md-6">
                          
                        </div>

                        <div class="form-group col-md-6">
                            <input id="ssn" name="ssn" placeholder="Patient ssn" class="form-control" type="number">  
                        </div>

                        <div class="form-group col-md-6">
                          
                        </div>

                        <div class="form-group col-md-6">
                            <input id="phoneNumber" name="phoneNumber" placeholder="Phone number" class="form-control" type="number"> 
                        </div>

                        <div class="form-group col-md-6">
                          
                        </div>

                        <div class="form-group col-md-3">
                            <input  type="submit" name="submit" class="btn btn-md btn-primary btn-block" style="color:#bd5d38; background-color:#fff" value="Next">
                        </div>
                        <div class="form-group col-md-9">
                          
                        </div>

                        <div class="form-group col-md-3">
                            <input  type="submit" name="back" class="btn btn-md btn-primary btn-block" style="color:#bd5d38; background-color:#fff" value="Back">
                        </div>
                   
                        
                        <div class="form-group col-md-6">
                          
                        </div>
                        <div class="form-group col-md-6">
                          
                        </div>
                        <div class="form-group col-md-6">
                          
                        </div>
                </form>


                <?php

                        if(isset($_POST['back'])){
                          header("location:pickAHospital.php");
                        }
                        if(isset($_POST['submit'])){

                          $patientNameInput = $_POST['name'];
                          $patientSSNInput = $_POST['ssn'];
                          $patientPNInput = $_POST['phoneNumber'];

                          

                          $con = mysqli_connect("localhost","root","");
                          mysqli_select_db($con,'hcvs');
                        
                          $searchForPatient = "select ssn,name,phone_number,roomId from patient where is_allowed = 1";
                          $getSearchForPatient = mysqli_query($con,$searchForPatient);

                          $flag = 0;

                          while($answer = mysqli_fetch_array($getSearchForPatient)){
                              if($patientSSNInput == $answer[0] || $patientNameInput == $answer[1] || $patientPNInput == $answer[2]  ){
                                  $flag = 1;
                                  $patientSSN = $answer[0];
                                  $patientName = $answer[1];
                                  $patientPN = $answer[2];
                                  $roomId = $answer[3];
                                  
                                  $_SESSION['patientSSN'] = $patientSSN;
                                  $_SESSION['patientName'] = $patientName;
                                  $_SESSION['patientPN'] = $patientPN;
                                  $_SESSION['roomId'] = $roomId;
                              }
                          }

                          if($flag == 0){
                              echo "<div class='form-row' style='margin-left:10px'>
                              Patient Doesn't exist!\n
                              or he's not allowed to be visited.

                              </div>";
                          }else{

                                header("location:healthQuestions.php");
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