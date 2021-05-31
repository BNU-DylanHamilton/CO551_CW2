<?php

include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


// check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

       $rowCount = count($_GET["delete"]);
       for($i=0;$i<$rowCount;$i++) {
           mysqli_query($conn, "DELETE FROM student WHERE studentid='" . $_GET["delete"][$i] . "'");
       }

      //$result = mysqli_query($conn,$sql);          
        

      // render the template
      echo template("templates/default.php", $data);

   }else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>

<html>
<body>
<form action='students.php' method=”post”>

	The selected users have been deleted.

	<input type=submit name=btnreturn value="Return"/>
</form>
</body>