<?php

include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");
       
       if(isset($_POST['btnsave'])){
           $studentid = $_POST['txtId'];
           $password = $_POST['txtPassword'];
           $hash = password_hash($password, PASSWORD_DEFAULT);
           $dob = $_POST['txtDob'];
           $firstname = $_POST['txtFName'];
           $lastname = $_POST['txtLName'];
           $house = $_POST['txtHouse'];
           $town = $_POST['txtTown'];
           $county = $_POST['txtCounty'];
           $country = $_POST['txtCountry'];
           $postcode = $_POST['txtPostcode'];
           $image = $_FILES['studentImage']['tmp_name'];
           $imagedata = addslashes(fread(fopen($image, "r"), filesize($image)));
           
           $sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode, studentimage) VALUES ('$studentid','$hash','$dob','$firstname','$lastname','$house','$town','$county','$country','$postcode','$imagedata')";
           
           $result = mysqli_query($conn,$sql);
       }
       

       
        
       
       echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>

<html>
<body>
<form action='addstudent.php' method=”post”>

	The student has been added.

	<input type=submit name=btnreturn value="Return"/>
</form>
</body>