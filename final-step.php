<?php session_start();?>


<section class="testimonial py-8" id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-4 py-6   text-center ">
                <div class="">
                    <div  class="">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h2 style="font-size: 20px;" class="py-3">Registration</h2>
                        <p>Final Step
</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5 border">
                <h4 class="pb-4">Please fill with your details</h4>
                <form method="post" onchange="">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <input id="myname" name="myname" placeholder="Name" class="form-control" type="text">
                        </div>
                        <div class="form-group col-md-6">
                          <input type="myemail" class="form-control" id="myemail" name="myemail" placeholder="Email">
                        </div>
                      </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input id="myphone" name="myphone" placeholder="Mobile No." class="form-control"  type="text">
                            <!-- required="required" -->
                        </div>
                        <div class="form-group col-md-6">
                                  
                        <input id="myid" name="myid" placeholder="your id." class="form-control"  type="text">

                               
                        </div>
                        <div class="form-group col-md-12">
                                  <textarea id="comment" name="comment" cols="40" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                  <label class="form-check-label" for="invalidCheck2">
                                    <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                                  </label>
                                </div>
                              </div>
                    
                          </div>
                    </div>
                    
                    <div class="form-row">
                    <input  type="submit" name="submit" class="btn btn-md btn-primary btn-block" value="Generate QR Code">
                    </div>
                </form>

                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $visitorName = $_POST["myname"];
                            $_SESSION["Vname"] = $visitorName;

                            $visitorId = $_POST["myid"];
                            $_SESSION["Vid"] = $visitorId;

                            $visitorPhone = $_POST["myphone"];
                            $_SESSION["VPhone"] = $visitorPhone;

                            $visitorEmail = $_POST["myemail"];
                            $_SESSION["Vemail"] = $visitorEmail;
                            
                            header("location: http://hcvs.ps/show.php");
                        }
                    ?>
                   

                    


                    

                </div>
            </div>
        </div>
</section>

        <?php
   require("layout.php");
  
   ?>