<?php
include("databases/users_db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hope Developers</title>
  <link rel="stylesheet" href="Assets/Css/signin.css">
</head>

<body>

  <div class="container" id="container">
         
    <!-- Sign-up -->

    <div class="form-container sign-up-container"> 
      
      <form action="" method="post">
             <div><p id="error"></p></div>
              <h1>Create Account</h1>
              <div class="progress-container">
                  <a href="#" class="social"><h1>1</h1></i></a>
                  <a href="#" class="social"><h1>2</h1></i></a>
                  <a href="#" class="social"><h1>3</h1></i></a>
              </div>

              <span>or use your email for registration</span>
                <!--  Sign up Sec-1 -->
              <div class="section-1">
                  <input type="text" placeholder="First Name" name="f-name" required/>
                  <input type="text" placeholder="Last Name"  name="l-name"  required/>
                  <input type="text" placeholder="Registration Number"  name="reg-no"  required/>
                  <button id="next-1">Next</button>
              </div>

              <!--  Sign up Sec-2 -->
              <div class="section-2">
               <input name="level" list="level" placeholder="Level of study" required>
                                   <datalist id="level">
                                         <option value="Degree">
                                         <option value="Diploma">
                                         <option value="Certificate">
                                         <option value="Artisan">
                                  </datalist>
                  <input type="text" placeholder="Course" name="course" required/>
                  <input name="year" list="year" placeholder="Year of Study" required>
                                   <datalist id="year">
                                         <option value="1st Year">
                                         <option value="2nd Year">
                                         <option value="3rd Year">
                                         <option value="4th Year">
                                  </datalist>
                  <button id="back-1">Back</button>
                  <button id="next-2">Next</button>           
              </div>

              <!--  Sign up Sec-3 -->
              <div class="section-3">
                  <input type="email" placeholder="Student Email" name="email" required/>
                  <input type="password" placeholder="Create Password" name="pass1" required/>
                  <input type="password" placeholder="Confirm Password"name="pass2"   required/>
                  <button id="back-2">Back</button>
                  <button class="submit"  name="register"><input type="submit" id="sign-up">Sign Up</button>
              </div>
        </form>
     </div>

    <!-- Sign in -->
         <div class="form-container sign-in-container">
            <form action="index.php" method="post">
                  <h1>Sign in</h1>
                  <div class="progress-container">
                      <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                      <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                      <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                  </div>
                      <span>or use your account</span>
                          <input type="email" placeholder="Email" name="u-email" required/>
                          <input type="password" placeholder="Password" name="u-password" required/>
                           <a href="reset.php">Forgot your password?</a>
                           <button name="sign-in"><input type="submit" value="" id="sign-in">Sign In</button>      
            </form>
         </div>
       <div class="overlay-container">
         <div class="overlay">
           <div class="overlay-panel overlay-left">
              <h1>Welcome Back!</h1>
              <p>To keep connected with us please login with your personal info</p>
              <button class="ghost" id="signIn">Sign In</button>
           </div>
           <div class="overlay-panel overlay-right">
              <h1>Hello, Student</h1>
              <p>Fill in Your details and Explore Our New Voting Platform</p>
              <button class="ghost" id="signUp">Sign Up</button>
          </div>
       </div>
     </div>
  </div>
  <script type="text/javascript" src="Assets/Js/login.js"></script>
</body>
</html>


<?php

if(isset($_POST['register'])){

                // Sign-Up

            $f_name = filter_input(INPUT_POST, 'f-name', FILTER_SANITIZE_SPECIAL_CHARS);
            $l_name = filter_input(INPUT_POST, 'l-name', FILTER_SANITIZE_SPECIAL_CHARS);
            $reg_no = filter_input(INPUT_POST, 'reg-no', FILTER_SANITIZE_SPECIAL_CHARS);
            $level  = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
            $course = filter_input(INPUT_POST, 'course', FILTER_SANITIZE_SPECIAL_CHARS);
            $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $pass1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_SPECIAL_CHARS);
            $pass2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_SPECIAL_CHARS);



            if($pass1 != $pass2){
              echo"<script>alert('Passwords Doesnt match!')</script>";
           
            }
            else{
              $sql ="INSERT INTO users (First_Name, Last_Name, Registration_No, Level_Study, Course, Year_Study, Student_Email, User_Pass)
                    VALUES( '$f_name','$l_name', '$reg_no','$level', '$course', '$year', '$email', '$pass1')";
              
                  try{
                    mysqli_query($conn, $sql);
                    echo"<script>alert('User successfully Registered!')</script>";
                  }

                  catch(mysqli_sql_exception){
                    echo"<script>alert('User already Exist')</script>";
                  }
             }


          }

                     
                //Sign-in

      if(isset($_POST['sign-in'])){

             $u_email = filter_input(INPUT_POST,"u-email", FILTER_SANITIZE_SPECIAL_CHARS);
             $u_pass = filter_input(INPUT_POST,"u-password", FILTER_SANITIZE_SPECIAL_CHARS);
             
          $sql = "SELECT  Student_Email, User_Pass FROM users";
          $result = mysqli_query($conn, $sql);
     
           if(mysqli_num_rows($result) >0){
     
               $row = mysqli_fetch_assoc($result);
     
            
                   if ($u_email == $row["Student_Email"] &&  $u_pass == $row["User_Pass"]) {     
                  
                    echo'<script>window.location = "Dashboard.php"</script>';


                   }else{
                   echo"<script>alert('invalid Credentials!')</script>";
             }
         }else{

          echo"<script>alert('User not Found! please register to continue!')</script>";
         }
            
    }

  mysqli_close($conn);
?>