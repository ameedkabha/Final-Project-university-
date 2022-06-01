<?php session_start(); ?>

<?php include 'sendQR.php'; ?>




    <div class="container" id="panel">
        <br><br><br>
        <div class="row">
            <div class="col-md-6 offset-md-3" style="background-color: white; padding: 20px; box-shadow: 10px 10px 5px #888;">
                
                <div id="qrbox" style="text-align: center;">

                <?php

                
                    $con = mysqli_connect("localhost","root","");
                    mysqli_select_db($con,'hcvs');

                    $roomNumber = $_SESSION['roomId'];
                    $getDepartmentId = "select departmentId from room where room_number = $roomNumber;";
                    $doGetDepartmentId = mysqli_query($con,$getDepartmentId);

                    if($answer = mysqli_fetch_array($doGetDepartmentId)){
                        $departmentId = $answer[0];
                    }

                    $getDepartmentName = "select name from department where id = $departmentId;";
                    $doGetDepartmentName = mysqli_query($con,$getDepartmentName);

                    if($secondAnswer = mysqli_fetch_array($doGetDepartmentName)){
                        $departmentName = $secondAnswer[0];
                        $_SESSION['departmentName'] = $departmentName;
                    }

                    $getVisitationTimes = "select * from visitor_patient;";
                    $doVisitationTimes = mysqli_query($con,$getVisitationTimes);

                    $tomorrowDate = strtotime('tomorrow');

                    $departmentCounter = 0;
                    $visitorCounter = 1;
                    $patientCounter = 0;

                    while($visitAnswer = mysqli_fetch_array($doVisitationTimes)){
                        if($visitAnswer[6]  == $_SESSION['hospitalId']){
                            if($visitAnswer[5] == $departmentId){
                                $departmentCounter++;

                                if($_SESSION['patientSSN'] == $visitAnswer[1]){
                                    $patientCounter++;
                                }
                                
                            }
                            if($_SESSION['visitorSSN'] == $visitAnswer[0]){
                                if(date('Y-m-d',$tomorrowDate) == $visitAnswer[2]){
                                    $visitorCounter++;
                                }
                            }
                        }
                    }

                    if($visitorCounter == 1){
                        if($departmentCounter <=100){

                            if($patientCounter == 0 || $patientCounter == 1){
                                $d = strtotime("12:00");
                                $timeToVisit = date("H:i:s",$d);
                                $d1 = strtotime("12:30");
                                $endTimeToVisit = date("H:i:s",$d1);

                                
                            }else if($patientCounter == 2 || $patientCounter == 3){
                                $d = strtotime("12:30");
                                $timeToVisit = date("H:i:s",$d);
                                $d1 = strtotime("13:00");
                                $endTimeToVisit = date("H:i:s",$d1);

                                
                            }else if($patientCounter == 4 || $patientCounter == 5){
                                $d = strtotime("13:00");
                                $timeToVisit = date("H:i:s",$d);
                                $d1 = strtotime("13:30");
                                $endTimeToVisit = date("H:i:s",$d1);

                                
                            }else if($patientCounter == 6 || $patientCounter == 7){
                                $d = strtotime("13:30");
                                $timeToVisit = date("H:i:s",$d);
                                $d1 = strtotime("14:00");
                                $endTimeToVisit = date("H:i:s",$d1);

                                
                            }else if($patientCounter == 8 || $patientCounter == 9){
                                $d = strtotime("14:00");
                                $timeToVisit = date("H:i:s",$d);
                                $d1 = strtotime("14:30");
                                $endTimeToVisit = date("H:i:s",$d1);

                                
                            }else if($patientCounter == 10 || $patientCounter == 11){
                                $d = strtotime("14:30");
                                $timeToVisit = date("H:i:s",$d);
                                $d1 = strtotime("15:00");
                                $endTimeToVisit = date("H:i:s",$d1);

                                
                            }else if($patientCounter == 12 || $patientCounter == 13){
                                $d = strtotime("19:30");
                                $timeToVisit = date("H:i:s",$d);
                                $d1 = strtotime("20:00");
                                $endTimeToVisit = date("H:i:s",$d1);

                                
                            }else if($patientCounter == 14 || $patientCounter == 15){
                                $d = strtotime("20:00");
                                $timeToVisit = date("H:i:s",$d);
                                $d1 = strtotime("20:30");
                                $endTimeToVisit = date("H:i:s",$d1);

                               
                            }else if($patientCounter == 16 || $patientCounter == 17){
                                $d = strtotime("20:30");
                                $timeToVisit = date("H:i:s",$d);
                                $d1 = strtotime("21:00");
                                $endTimeToVisit = date("H:i:s",$d1);

                            }

                            
                                
                            $_SESSION['visitStartTime'] = $timeToVisit;
                            $_SESSION['visitEndTime'] = $endTimeToVisit;

                            $visitorSSN = $_SESSION['visitorSSN'];
                            $patientSSN = $_SESSION['patientSSN'];
                            $hospitalId = $_SESSION['hospitalId'];
                            $dateToVisit = date("Y-m-d", strtotime('tomorrow'));

                            $insertIntoVP = "insert into visitor_patient values($visitorSSN,$patientSSN,'$dateToVisit','$timeToVisit','$endTimeToVisit',$departmentId,$hospitalId);";
                            mysqli_query($con,$insertIntoVP);

                            $qrData = "Visitor name : ".$_SESSION['visitorName'].
                            "
                            Visitor ID : ".$_SESSION['visitorSSN'].
                            "
                            Hospital name : ".$_SESSION['hospitalName'].
                            "

                            Department name : ".$departmentName.
                            "
                            Room number : ".$roomNumber.
                            "
                            Patient name : ".$_SESSION['patientName'].
                            "
                            Visit starts at : ".$timeToVisit.
                            "
                            Visit ends at : ".$endTimeToVisit.
                            "
                            Parking number : ".$_SESSION['parkingNumber'].
                            "
                            Parking row : ".$_SESSION['parkingRow']. 
                            "
                            Parking column".$_SESSION['parkingColumn']; 
                            
                            
                            $_SESSION['qrData'] = $qrData;
                            

                            header("location:show.php");
                            echo '<div>';
                                echo "<h4>Your Qr code is ready, press next to show it.</h4>";
                            echo "</div>";  
                            echo '<div>';
                            echo "";
                        echo "</div>";  
                        echo '<div>';
                        echo "";
                    echo "</div>";  

                            echo "<form action='visitorInfo.php'>";
                                echo "<div class='form-group col-md-6'>";
                                    echo "<input  type='submit' name='submit' class='btn btn-md btn-primary btn-block' style='color:#bd5d38; background-color:#fff' value='Back'> ";
                                echo "</div>";
                            echo "</form>";

                            echo "<form action='show.php'>";
                                echo "<div class='form-group col-md-6'>";
                                    echo "<input  type='submit' name='submit' class='btn btn-md btn-primary btn-block' style='color:#bd5d38; background-color:#fff' value='Next'> ";
                                echo "</div>";
                            echo "</form>";
                            
                        }else{
                            echo "we are sorry, the limit for visitation has been exceeded!";
                        }
                    }else{
                        echo "you can't register 2 visitation in the same day!";
                    }

                    
                    
                    ?>
                    
                    
                    
                        
                    

                </div>
                
            </div>
        </div>

        
    </div>

    


<?php
require("layout.php");

?>

