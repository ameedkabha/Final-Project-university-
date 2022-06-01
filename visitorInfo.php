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
                        <h5 style="color:#bd5d38">
                          fifth step
                        </h5>
                        <br>

                        <p>Insert your information<br>
                        (SSN,name,email)<br>
                        make sure to fill them correctly,<br>
                        the QR code will be sent to your email</p>

                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5 border">
                <h4 class="pb-4">Insert your information</h4>

                <form method="post" onchange="">
                    <div class="form-row">

                        <div class="form-group col-md-10">
                          <input id="ssn" name="ssn" placeholder="SSN" class="form-control" type="number" required="required">  
                        </div>

                        <div class="form-group col-md-6">
                          
                        </div>

                        <div class="form-group col-md-10">
                            <input id="name" name="name" placeholder="Name" class="form-control" type="text" required="required">  
                        </div>

                        <div class="form-group col-md-6">
                          
                        </div>

                        <div class="form-group col-md-6">
                          
                        </div>
                        <div class="form-group col-md-10">
                            <input id="emailAddress" name="emailAddress" placeholder="Email Address" class="form-control" type="email" required="required"> 
                        </div>
                        
                       
                   
                        <div class="form-group col-md-3" >
                            <input  type="submit" name="submit" class="btn btn-md btn-primary btn-block" style="color:#bd5d38; background-color:#fff" value="Next">
                        </div>

                        <div class="form-group col-md-9" >
                            
                        </div>
                        
                    
                </form>
                
                    <form action="healthQuestions.php">
                        <div class="form-row" style="margin-left:15px">
                            <input  type="submit" name="back" class="btn btn-md btn-primary btn-block" style="color:#bd5d38; background-color:#fff" value="Back">
                        </div>
                    </form>
                    </div>


                <?php
                    if(isset($_POST['back'])){
                        header("location:healthQuestions.php");
                    }
                    if(isset($_POST['submit'])){
                        $visitorSSN = $_POST['ssn'];
                        $visitorName = $_POST['name'];
                        $visitorEmail = $_POST['emailAddress'];

                        $_SESSION['visitorSSN'] = $visitorSSN;
                        $_SESSION['visitorName'] = $visitorName;
                        $_SESSION['visitorEmail'] = $visitorEmail;

                        $con = mysqli_connect("localhost","root","");
                        mysqli_select_db($con,'hcvs');

                        $checkVisitorRecord = "select * from moh where ssn = $visitorSSN;";
                        $doChechVisitorRecord = mysqli_query($con,$checkVisitorRecord);

                        if($answer = mysqli_fetch_array($doChechVisitorRecord)){
                            echo "<div class='form-row'>
                                Sorry, you cant visit duo to your health conditions!
                            </div>";
                        }else{
                            $insertIntoVisitorQuery = "insert into visitor values ($visitorSSN,'$visitorName','$visitorEmail');";
                            $doInsertIntoVisitorQuery = mysqli_query($con,$insertIntoVisitorQuery);
                            header("location:parking.php");
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