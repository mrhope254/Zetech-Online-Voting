<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explode</title>
</head>
<body>
   <form action="" method="post">
   <input type="text" placeholder="Enter Reg no" name="reg"><br><br>
   <input type="email" placeholder="Enter Email" name="email"><br><br>
   <input type="submit" value="Register" name="submit"> <br><br>
   </form>
</body>
</html>

<?php
 
     if(isset($_POST["submit"])){

        $reg_No = $_POST["reg"];

 
        $course = substr($reg_No, 0,3);

        echo $course;


       

     }

?>