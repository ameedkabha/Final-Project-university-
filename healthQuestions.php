<?php session_start(); ?>
  
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style>
/* body{
  width: 80%;
} */
#hello{
    display:none;
}

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
                          fourth step
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5 border">
                <h4 class="pb-4">Answer the Questions</h4>

                <form method="post">
                    <div class="form-row">

                        <?php
                            $con = mysqli_connect("localhost","root","");
                            mysqli_select_db($con,'hcvs');

                            $retrieveQuestions = "select question from health_question";
                            $doRetrieveQuestions = mysqli_query($con,$retrieveQuestions);

                            $c = 0;

                            while($answer = mysqli_fetch_array($doRetrieveQuestions)){
                                $c++;
                                echo 
                                "
                                <div class='form-group col-md-6'>".
                                $answer[0]
                                 
                                ."</div>".

                                "<div class='form-group col-md-6'>
                                    
                                </div>
                                ";
                            }
                            

                        ?>
                        <div class='form-group col-md-6'>
                                    
                        </div>
                        <div class='form-group col-md-6'>
                            <input name = "check" type="text" value="7" id = "hello" >
                        </div>
                        
                        <div class='form-group col-md-1'>
                            <input name = "check" id = "true" value = "1" type="radio">                        
                        </div>

                        <div class='form-group col-md-11'>
                            <label for="true">if any of the above questions answer is true</label>
                        </div>

                        <div class='form-group col-md-1'>
                            <input name = "check" id = "false" value = "0" type="radio">   
                        </div>

                        <div class='form-group col-md-11'>
                            <label for="false">if all of the above questions answer is false</label> 
                        </div>

                    <div class="form-row">
                        <input  type="submit" name="back" class="btn btn-md btn-primary btn-block" value="Back">
                    </div>
                   
                    <div class="form-row" style="margin-left:50px">
                        <input  type="submit" name="submit" class="btn btn-md btn-primary btn-block" value="Next">
                    </div>
                    
                </form>


                <?php

                    if(isset($_POST['back'])){
                        header("location:searchForAPatient.php");
                    }
                    if(isset($_POST['submit'])){

                        $value = $_POST['check'];
                           
                        if(isset($value)){
                            if($value == "1"){
                                echo "<div class='form-row'>
                                    <br>
                                </div>";
                                echo "<div class='form-row'>
                                    Sorry, you cant visit duo to your health conditions!
                                </div>";
                            }else if($value == "0"){
                                header("location:visitorInfo.php");
                            }else{
                                echo "<div class='form-group col-md-12'>
                                    Please answer the above question!
                                </div>";
                            }
                              
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