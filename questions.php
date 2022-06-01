<?php session_start(); ?>


<section class="testimonial py-8" id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-4 py-6   text-center ">
                <div class="">
                    <div class="">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h2 style="font-size: 20px;" class="py-3">Registration</h2>
                        <p>qustions
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5 border">
                <h4 class="pb-4">Please fill with your answers</h4>
                <form method="post" onchange="">



                <div class="form-groub" >
                <div class="alert alert-info" role="alert">

                <span >Do you have lung infections? &nbsp;&nbsp;</span>
                    <div class="form-check form-check-inline" >
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">no</label>
                    </div>
                <br><br>



                <span>Do you have flu? &nbsp;&nbsp;</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio3" value="option1">
                        <label class="form-check-label" for="inlineRadio3">yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio4" value="option2">
                        <label class="form-check-label" for="inlineRadio4">no</label>
                    </div>
                    <br><br>


                    <span>Are you older than 65 years old? &nbsp;&nbsp;</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio5" value="option5">
                        <label class="form-check-label" for="inlineRadio5">yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio6" value="option6">
                        <label class="form-check-label" for="inlineRadio6">no</label>
                    </div>
                    <br><br>


                    <span>Are you younger than 12years old? &nbsp;&nbsp;</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="inlineRadio7" value="option7">
                        <label class="form-check-label" for="inlineRadio7">yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="inlineRadio8" value="option8">
                        <label class="form-check-label" for="inlineRadio8">no</label>
                    </div>


                </div>
                </div>

                <br><br>
                    <hr>

                    <div class="form-row">
                        <input type="submit" name="submit" class="btn btn-md btn-primary btn-block" value="Next">
                    </div>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // $visitorName = $_POST["myname"];
                    // $_SESSION["Vname"] = $visitorName;

                    // $visitorId = $_POST["myid"];
                    // $_SESSION["Vid"] = $visitorId;

                    // $visitorPhone = $_POST["myphone"];
                    // $_SESSION["VPhone"] = $visitorPhone;

                    // $visitorEmail = $_POST["myemail"];
                    // $_SESSION["Vemail"] = $visitorEmail;

                    header("location: http://hcvs.ps/final-step.php");


                }


                ?>







            </div>
        </div>
    </div>
</section>

<?php
require("layout.php");

?>