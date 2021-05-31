<?php

include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");
       
       
       $sql = "select * from students";
       $result = mysqli_query($conn,$sql);
       
       
       
       echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");


?>

<html>
<body>
    <form enctype="multipart/form-data" name="frmAdd" action="" method="post">
        Enter Student ID (2xxxxxxx): 
            <input type='text' name='txtId' /><br/>
        Enter First Name:
            <input type='text' name='txtFName' /><br/>
        Enter Last Name:
            <input type='text' name='txtLName' /><br/>
        Enter DOB (yyyy-mm-dd):
            <input type='text' name='txtDob' /><br/>
        Enter Number and Street:
            <input type='text' name='txtHouse' /><br/>
        Enter Town:
            <input type='text' name='txtTown' /><br/>
        Enter County:
            <input type='text' name='txtCounty' /><br/>
        Enter Country:
            <input type='text' name='txtCountry' /><br/>
        Enter Postcode:
            <input type='text' name='txtPostcode' /><br/>
        Enter Password:
            <input type='text' name='txtPassword' /><br/>
        Student Picture:
        <input  type='file' name='studentImage' accept='image/jpeg' class='form-control' /> <br/>
        <input type="submit" onclick="save_confirm();" name="btnsave" value="Save Entry" />
    </form>
</body>
</html>

<script>
function save_confirm(){
    if(confirm("Are you sure you want to add this student?")){
        document.frmAdd.action= "addconfirm.php";
        document.frmAdd.submit();
    }
}
</script>