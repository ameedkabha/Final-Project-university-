<?php session_start(); ?>

<?php include 'sendQR.php'; ?>


<section class="testimonial py-8" id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-4 py-6   text-center ">
                <div class="">
                    <div class="">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h2 style="font-size: 20px;" class="py-3">Registration</h2>
                        <p>Final Step
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5 border">



                <div class="panel-heading">
                    <h1 style="font-size: 20px;">your Qr code </h1>
                </div>
                <hr>
                <div id="qrbox" style="text-align: center;">
                    <?php


                    //$qrData = "Patient name is: (" . $_SESSION["Pname"] . "), \n\n 
                    //Patient ID is: (" . $_SESSION["Pid"] . "), \n\nPatient Phone Is: (" . $_SESSION["Pphone"] . "),\n\n 
                    //Visitor name is: (" . $_SESSION['Vname'] . "),\n\n Visitor id is (" . $_SESSION['Vid'] . "),\n\n 
                    //Visitor Email is (" . $_SESSION['Vemail'] . ").";

                   
                    $qrData = $_SESSION['qrData'];

                    ?>

                    <!--alert messages start-->
                    <?php echo $alert; ?>
                    <!--alert messages end-->

                    

                    <img src="generate.php?text=<?php echo $qrData; ?>" alt="">
                    <br>
                    
                </div>
                <hr>
                <div class='form-group col-md-6'>
                    <form action="" method="post">
                        
                        <input class="alert alert-info" role="alert" type="submit" name="submit" class="send-btn" value="Send To Email!">
                        
                    </form>
                </div>




            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php
require("layout.php");

?>