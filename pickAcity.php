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
            <div class="col-md-5 py-6   text-center ">
                <div class="">
                    <div  class="">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h2 style="font-size: 20px;" class="py-3">Registration</h2>
                        <h5 style="color:#bd5d38">
                          first step
                        </h5>
                        <br>
                        <p>Select a city from the bar,<br> which includes the hospitals<br> you need to visit</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5 border  ">
                <h4 class="pb-4">Pick a city</h4>
                
                <form method="post" onchange="">
                    <div class="form-row">
                        <div class="form-group col-md-6">

                          <select id="city" name="city" placeholder="Pick a city" class="form-control" onSubmit="return f()">
                            <?php
                              $con = mysqli_connect("localhost","root","");
                              mysqli_select_db($con,'hcvs');

                              $getEveryThingFromCityQuery = "select * from city;";
                              $doEveryThingFromCityQuery = mysqli_query($con,$getEveryThingFromCityQuery);

                              while($answer = mysqli_fetch_array($doEveryThingFromCityQuery)){
                                if($answer[1] == "ramallah"){
                                  echo "<option selected>".$answer[1]."</option>";
                                }else{
                                  echo "<option>".$answer[1]."</option>";
                                }
                               
                              }
                            ?>
                            
                          </select>
                        </div>

                        <div  class="form-group col-md-6"></div>

                        
                   
                        <div class="form-group col-md-3" >
                          <input  type="submit" name="submit" class="btn btn-md btn-primary btn-block" style="color:#bd5d38; background-color:#fff" value="next">
                        </div>
                </form>

                <?php
                  if(isset($_POST['home'])){
                    header("location:index.php");
                  }

                  if(isset($_POST['submit'])){

                    $cityName = $_POST['city'];
                    $_SESSION['cityName'] = $cityName;


                    $getIdFromCityQuery = "select id from city where name like'$cityName';";
                    $doIdFromCityQuery = mysqli_query($con,$getIdFromCityQuery);

                    while($answer = mysqli_fetch_array($doIdFromCityQuery)){
                      $cityId = $answer[0];
                    }            
                    $_SESSION['cityId'] = $cityId;
                    header("Location:pickAHospital.php");
                  }
                ?>
            </div>
        </div>
    </div>
</section>
<?php
  require("layout.php");
?>