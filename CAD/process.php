<?php

require_once("config.php");

function registerUser($conn){
    
    $userID = $_POST['ID'];
    $userName = $_POST['username'];
    $userEmail = $_POST['email'];
    $userAddress = $_POST['address'];
    $userContact = $_POST['contact'];
    $userAge = $_POST['age'];
    $userGender = $_POST['gender'];
    $password = $_POST['password'];
    
    //$userPassword = password_hash($password, PASSWORD_DEFAULT);
            
    $sql = "INSERT INTO user (userID, userName, userAddress, userContact, userEmail, userAge, userGender, password)
            VALUES('$userID','$userName','$userAddress','$userContact','$userEmail', '$userAge', '$userGender', '$password')";
    if(mysqli_query($conn, $sql))   {
        header("location: index.php?response=1");
    }
    else{
        echo "ERROR:".mysqli_error($conn);
    }           
    
}

function userLogin($conn){

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $SQL = "SELECT * FROM user WHERE userName = '$username' AND password = '$password' LIMIT 1";     
    $result = mysqli_query($conn,$SQL); 

    if(mysqli_num_rows($result) == 1){

        $_SESSION['ID'] = $username;
        header("Location:userCad.php");  
    }
    else{
        header("location: index.php?status=1");
    }
}

function updateProfile($conn){
    
    $userName = $_SESSION['ID'];
    $userEmail = $_POST['email'];
    $userAddress = $_POST['address'];
    $userContact = $_POST['contact'];
    $userPassword = $_POST['password'];
    $userAge = $_POST['age'];
            
    $sql="UPDATE user SET password ='$userPassword', userEmail ='$userEmail', userAddress ='$userAddress', userContact ='$userContact', userAge ='$userAge' WHERE userName = '$userName' ";   
                
    if (mysqli_query($conn,$sql)){	
        header("Location:userProfile.php?updateStatus=1");
    }else {
        echo "ERROR! : " . mysqli_error($conn); 
    } 
}


function addFeedback($conn){
            
    $userID = $_POST['userID'];
    $userName = $_SESSION['ID'];
    $feedbackID = $_POST['feedbackID'];
    $userFeedback = $_POST['feedback'];

    $sql = "INSERT INTO feedback (feedbackID, userID, feedback, date)
            VALUES('$feedbackID','$userID','$userFeedback',CURRENT_TIMESTAMP)";

    if (mysqli_query($conn,$sql)){	
        header("location: userFeedback.php?feedback=1");
    }
    else {
        echo "ERROR! : " . mysqli_error($conn);
    }
    
}


function checkRisk($conn){
    
    $smoking = $_POST['smoking'];
    $tCholesterol = $_POST['totCholesterol'];
    $hdlCholesterol = $_POST['hdlCholesterol'];
    $bp = $_POST['bloodPressure'];
    $bpStatus = $_POST['bpStatus'];
    
    $user = $_SESSION['ID'];
    $SQL = "SELECT * FROM user WHERE userName = '$user' LIMIT 1";     
    $result = mysqli_query($conn,$SQL);
    
    $age = $gender = "";
    while($row = mysqli_fetch_assoc($result))   {
        $userID = $row['userID'];
        $age = $row['userAge'];
        $gender = $row['userGender'];
    } 
    
   $ageP = $smokingP = $tCholesterolP = $hdlCholesterolP = $bpP = $totalP = $risk = "";
    
    //risk score for female
    if($gender === "Female"){
        
        switch(true){  // score for age 
            case in_array($age, range(20,34)):
               $ageP = -7;
                break;
            case in_array($age, range(35,39)):
               $ageP = -3;
                break;  
            case in_array($age, range(40,44)):
               $ageP = 0;
                break;
            case in_array($age, range(45,49)):
               $ageP = 3;
                break;
            case in_array($age, range(50,54)):
               $ageP = 6;
                break;
            case in_array($age, range(55,59)):
               $ageP = 8;
                break;
            case in_array($age, range(60,64)):
               $ageP = 10;
                break;
            case in_array($age, range(65,69)):
               $ageP = 12;
                break;
            case in_array($age, range(70,74)):
               $ageP = 14;
                break;
            case in_array($age, range(75,79)):
               $ageP = 16;
                break;
            default:
                $ageP = 0;         
        }
        
        switch(true){       //score for total cholesterol
            case in_array($age, range(20,39)):
                switch(true){
                    case in_array($tCholesterol, range(1,159)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(160,199)):
                        $tCholesterolP = 4;
                        break;
                    case in_array($tCholesterol, range(200,239)):
                        $tCholesterolP = 8;
                        break;
                    case in_array($tCholesterol, range(240,279)):
                        $tCholesterolP = 11;
                        break;
                    case ($tCholesterol > 279):               
                        $tCholesterolP = 13; 
                        break;
                }
            break;
                
            case in_array($age, range(40,49)):
                switch(true){
                    case in_array($tCholesterol, range(1,159)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(160,199)):
                        $tCholesterolP = 3;
                        break;
                    case in_array($tCholesterol, range(200,239)):
                        $tCholesterolP = 6;
                        break;
                    case in_array($tCholesterol, range(240,279)):
                        $tCholesterolP = 8;
                        break;
                    case ($tCholesterol > 279):                          
                        $tCholesterolP = 10;
                        break;
                        
                }
            break;
                
            case in_array($age, range(50,59)):
                switch(true){
                    case in_array($tCholesterol, range(1,159)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(160,199)):
                        $tCholesterolP = 2;
                        break;
                    case in_array($tCholesterol, range(200,239)):
                        $tCholesterolP = 4;
                        break;
                    case in_array($tCholesterol, range(240,279)):
                        $tCholesterolP = 5;
                        break;
                    case ($tCholesterol > 279):                          
                        $tCholesterolP = 7;
                        break;
                }
            break;
                
            case in_array($age, range(60,69)):
                switch(true){
                    case in_array($tCholesterol, range(1,159)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(160,199)):
                        $tCholesterolP = 1;
                        break;
                    case in_array($tCholesterol, range(200,239)):
                        $tCholesterolP = 2;
                        break;
                    case in_array($tCholesterol, range(240,279)):
                        $tCholesterolP = 3;
                        break;
                    case ($tCholesterol > 279):                      
                        $tCholesterolP = 4;  
                        break;
                }
            break;
                
            case in_array($age, range(70,79)):
                switch(true){
                    case in_array($tCholesterol, range(1,159)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(160,199)):
                        $tCholesterolP = 1;
                        break;
                    case in_array($tCholesterol, range(200,239)):
                        $tCholesterolP = 1;
                        break;
                    case in_array($tCholesterol, range(240,279)):
                        $tCholesterolP = 2;
                        break;
                    case ($tCholesterol > 279):                              
                        $tCholesterolP = 2; 
                        break;
                }
            break;
        }
        
        switch($smoking){ //score for smoking status
            case "No":
                $smokingP = 0;
                break;
            case "Yes":
                switch(true){
                    case in_array($age, range(20,39)):
                        $smokingP = 9;
                        break;
                    case in_array($age, range(40,49)):
                        $smokingP = 7;
                        break;
                    case in_array($age, range(50,59)):
                        $smokingP = 4;
                        break;
                    case in_array($age, range(60,69)):
                        $smokingP = 2;
                        break;
                    case in_array($age, range(70,79)):
                        $smokingP = 1;
                        break;
                    default:
                        $smokingP = 0;
                }
                break;
        }
        
        switch(true){ //score for hdl cholesterol
            case in_array($hdlCholesterol, range(1,39)):
                $hdlCholesterolP = 2;
                break;
            case in_array($hdlCholesterol, range(40,49)):
                $hdlCholesterolP = 1;
                break;
            case in_array($hdlCholesterol, range(50,59)):
                $hdlCholesterolP = 0;
                break;
            case ($hdlCholesterol > 59):                 
                $hdlCholesterolP = -1;    
                break;  
        }
        
        switch($bpStatus){      //score for bp
            case "Untreated":
                switch(true){
                    case in_array($bp, range(1,119)):
                        $bpP = 0;
                        break;
                    case in_array($bp, range(120,129)):
                        $bpP = 1;
                        break;
                    case in_array($bp, range(130,139)):
                        $bpP = 2;
                        break;
                    case in_array($bp, range(140,159)):
                        $bpP = 3;
                        break;
                    case ($bp > 159):                  
                        $bpP = 4;
                        break;
                }
            break;
            
            case "Treated":
                switch(true){
                    case in_array($bp, range(1,119)):
                        $bpP = 0;
                        break;
                    case in_array($bp, range(120,129)):
                        $bpP = 3;
                        break;
                    case in_array($bp, range(130,139)):
                        $bpP = 4;
                        break;
                    case in_array($bp, range(140,159)):
                        $bpP = 5;
                        break;
                    case ($bp > 159): 
                        $bpP = 6;
                        break;
                }
            break;
        }
        
        $totalP = ((int)$ageP + (int)$smokingP + (int)$tCholesterolP + (int)$hdlCholesterolP + (int)$bpP);
        
        switch($totalP){        //determine the percentage of 10 year risk based on total point
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
            case 7:
            case 8:
                $risk = "less than 1%";
                break;
            case 9:
            case 10:
            case 11:
            case 12:
                $risk = "1%";
                break;
            case 13:
            case 14:
                $risk = "2%";
                break;
            case 15:
                $risk = "3%";
                break;
            case 16:
                $risk = "4%";
                break;
            case 17:
                $risk = "5%";
                break;
            case 18:
                $risk = "6%";
                break;
            case 19:
                $risk = "8%";
                break;
            case 20:
                $risk = "11%";
                break;
            case 21:
                $risk = "14%";
                break;
            case 22:
                $risk = "17%";
                break;
            case 23:
                $risk = "22%";
                break;
            case 24:
                $risk = "27%";
                break;
            case ($totalP > 24):
                $risk = "more than 30%";
                break;
        } 
    }
    
   
    else{ //risk score for male
        
        switch(true){  // score for age 
            case in_array($age, range(20,34)):
               $ageP = -9;
                break;
            case in_array($age, range(35,39)):
               $ageP = -4;
                break;  
            case in_array($age, range(40,44)):
               $ageP = 0;
                break;
            case in_array($age, range(45,49)):
               $ageP = 3;
                break;
            case in_array($age, range(50,54)):
               $ageP = 6;
                break;
            case in_array($age, range(55,59)):
               $ageP = 8;
                break;
            case in_array($age, range(60,64)):
               $ageP = 10;
                break;
            case in_array($age, range(65,69)):
               $ageP = 11;
                break;
            case in_array($age, range(70,74)):
               $ageP = 12;
                break;
            case in_array($age, range(75,79)):
               $ageP = 13;
                break;
            default:
               $ageP = 0;         
        }
        
        switch(true){ //score for total cholesterol
            case in_array($age, range(20,39)):
                switch(true){
                    case in_array($tCholesterol, range(1,159)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(160,199)):
                        $tCholesterolP = 4;
                        break;
                    case in_array($tCholesterol, range(200,239)):
                        $tCholesterolP = 7;
                        break;
                    case in_array($tCholesterol, range(240,279)):
                        $tCholesterolP = 9;
                        break;
                    default:
                        $tCholesterolP = 11;    
                }
            break;
                
            case in_array($age, range(40,49)):
                switch(true){
                    case in_array($tCholesterol, range(1,159)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(160,199)):
                        $tCholesterolP = 3;
                        break;
                    case in_array($tCholesterol, range(200,239)):
                        $tCholesterolP = 5;
                        break;
                    case in_array($tCholesterol, range(240,279)):
                        $tCholesterolP = 6;
                        break;
                    default:
                        $tCholesterolP = 8;
                        
                }
            break;
                
            case in_array($age, range(50,59)):
                switch(true){
                    case in_array($tCholesterol, range(1,159)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(160,199)):
                        $tCholesterolP = 2;
                        break;
                    case in_array($tCholesterol, range(200,239)):
                        $tCholesterolP = 3;
                        break;
                    case in_array($tCholesterol, range(240,279)):
                        $tCholesterolP = 4;
                        break;
                    default:
                        $tCholesterolP = 5;    
                }
            break;
                
            case in_array($age, range(60,69)):
                switch(true){
                    case in_array($tCholesterol, range(1,159)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(160,199)):
                        $tCholesterolP = 1;
                        break;
                    case in_array($tCholesterol, range(200,239)):
                        $tCholesterolP = 1;
                        break;
                    case in_array($tCholesterol, range(240,279)):
                        $tCholesterolP = 2;
                        break;
                    default:
                        $tCholesterolP = 3;    
                }
            break;
                
            case in_array($age, range(70,79)):
                switch(true){
                    case in_array($tCholesterol, range(1,159)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(160,199)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(200,239)):
                        $tCholesterolP = 0;
                        break;
                    case in_array($tCholesterol, range(240,279)):
                        $tCholesterolP = 1;
                        break;
                    default:
                        $tCholesterolP = 1;     
                }
            break;
        }
        
        switch($smoking){ //score for smoking status
            case "No":
                $smokingP = 0;
                break;
            case "Yes":
                switch(true){
                    case in_array($age, range(20,39)):
                        $smokingP = 8;
                        break;
                    case in_array($age, range(40,49)):
                        $smokingP = 5;
                        break;
                    case in_array($age, range(50,59)):
                        $smokingP = 3;
                        break;
                    case in_array($age, range(60,69)):
                        $smokingP = 1;
                        break;
                    case in_array($age, range(70,79)):
                        $smokingP = 1;
                        break;
                    default:
                        $smokingP = 0;
                }
                break;
        }
        
        switch(true){ //score for hdl cholesterol
            case in_array($hdlCholesterol, range(1,39)):
                $hdlCholesterolP = 2;
                break;
            case in_array($hdlCholesterol, range(40,49)):
                $hdlCholesterolP = 1;
                break;
            case in_array($hdlCholesterol, range(50,59)):
                $hdlCholesterolP = 0;
                break;
            default:
                $hdlCholesterolP = -1;       
        }
        
        switch($bpStatus){      //score for bp
            case "Untreated":
                switch(true){
                    case in_array($bp, range(1,119)):
                        $bpP = 0;
                        break;
                    case in_array($bp, range(120,129)):
                        $bpP = 0;
                        break;
                    case in_array($bp, range(130,139)):
                        $bpP = 1;
                        break;
                    case in_array($bp, range(140,159)):
                        $bpP = 1;
                        break;
                    case ($bp > 159):
                        $bpP = 2;
                        break;
                }
                break;
            
            case "Treated":
                switch(true){
                    case in_array($bp, range(1,119)):
                        $bpP = 0;
                        break;
                    case in_array($bp, range(120,129)):
                        $bpP = 1;
                        break;
                    case in_array($bp, range(130,139)):
                        $bpP = 2;
                        break;
                    case in_array($bp, range(140,159)):
                        $bpP = 2;
                        break;
                    case ($bp > 159):
                        $bpP = 3;
                        break;
                }
            break;
        }
        
        $totalP = ((int)$ageP + (int)$smokingP + (int)$tCholesterolP + (int)$hdlCholesterolP + (int)$bpP);
        
        switch($totalP){        //determine the percentage of 10 year risk based on total point
            case 0:
                $risk = "less than 1%";
                break;
            case 1:
            case 2:
            case 3:
            case 4:
                $risk = "1%";
                break;
            case 5:
            case 6:
                $risk = "2%";
                break;
            case 7:
                $risk = "3%";
                break;
            case 8:
                $risk = "4%";
                break;
            case 9:
                $risk = "5%";
                break;
            case 10:
                $risk = "6%";
                break;
            case 11:
                $risk = "8%";
                break;
            case 12:
                $risk = "10%";
                break;
            case 13:
                $risk = "12%";
                break;
            case 14:
                $risk = "16%";
                break;
            case 15:
                $risk = "20%";
                break;
            case 16:
                $risk = "25%";
                break;
            default:
                $risk = "more than 30%";
        } 
    }
      
    $sql = "INSERT INTO result (userID, resultDate, result) VALUES('$userID',CURRENT_TIMESTAMP,'$risk')";
    if(mysqli_query($conn, $sql))   {
        header("location: userResult.php");
        
    }
    else{
        echo "ERROR:".mysqli_error($conn);
    } 
   
}


function adminLogin($conn){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $SQL = "SELECT * FROM admin WHERE adminName = '$username' and password = '$password' LIMIT 1";     
                
    $result = mysqli_query($conn,$SQL);         

    if(mysqli_num_rows($result) === 1){         
        $_SESSION['ID'] = $username;
        header("Location:adminViewDoctor.php");  
    }else{
        header("location: adminLogin.php?statusLogin=1");  
    }     
}


function addDoctor($conn){
    
    $doctorID = $_POST['ID'];
    $doctorName = $_POST['name'];
    $doctorEmail = $_POST['email'];
    $doctorAddress = $_POST['address'];
    $doctorContact = $_POST['contact'];
    $doctorAge = $_POST['age'];
    $doctorGender = $_POST['gender'];
    $doctorSpecialist = $_POST['specialist'];
    
            
    $sql = "INSERT INTO doctor (docID, docName, docAddress, docContact, docEmail, docAge, docGender, docSpecialist)
            VALUES('$doctorID','$doctorName','$doctorAddress','$doctorContact','$doctorEmail', '$doctorAge', '$doctorGender', '$doctorSpecialist')";
    
    if(mysqli_query($conn, $sql))   {
        header("location: adminViewDoctor.php");
    }
    else{
        echo "ERROR:".mysqli_error($conn);
    }
}


function updateDoctor($conn){
    
    $doctorID = $_POST['ID'];
    $doctorName = $_POST['name'];
    $doctorEmail = $_POST['email'];
    $doctorAddress = $_POST['address'];
    $doctorContact = $_POST['contact'];
    $doctorAge = $_POST['age'];
    $doctorGender = $_POST['gender'];
    $doctorSpecialist = $_POST['specialist'];
         
    $sql="UPDATE doctor SET docName='$doctorName', docEmail ='$doctorEmail', docAddress='$doctorAddress', docContact = '$doctorContact', docSpecialist='$doctorSpecialist' WHERE docID='$doctorID' ";
        
    if(mysqli_query($conn, $sql))   {
        header("location: adminViewDoctor.php");
    }
    else{
        echo "ERROR:".mysqli_error($conn);
    }
}


if(isset($_POST['submit'])){
    if(!empty($_POST)){
    
    $operation = $_POST['submit'];
    
    switch($operation){
        
        case "registerUser":
            registerUser($conn);
            break;
            
        case "userLogin":
            userLogin($conn);
            break;
            
        case "updateProfile":
            updateProfile($conn);
            break;
            
        case "addFeedback":
            addFeedback($conn);
            break;
            
        case "checkRisk":
            checkRisk($conn);
            break;
            
        case "adminLogin":
            adminLogin($conn);
            break;
            
        case "addDoctor":
            addDoctor($conn);
            break;
        
        case "updateDoctor":
            updateDoctor($conn);
            break;      
    }    
    }
}