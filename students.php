<?php

    include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


// check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Shows all the students 
      $sql = "select * from student";

      $result = mysqli_query($conn,$sql);          
       
      

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");


?>

<html>
<body>
<form name="frmUser" action="" method=”post”>

	<table border="1">
        <tr><th colspan='5' align='center'>Students</th></tr>
        <tr><th>Student ID</th><th>Name</th><th>Student Picture</th></tr>
        <?php
            if($result){
                while($row=mysqli_fetch_array($result)){
                    ?>
                <tr>
                    <td><?php echo $row['studentid']; ?></td>
                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                    <td><?php echo "<img src='getjpg.php?id=" . $row['studentid']. "' height='100' width='100'"; ?></td>
                    <td><input type='checkbox' name='delete[]' value="<?php echo $row['studentid']; ?>" class="checkbox"/></td>
                </tr>
                <?php } } ?>
            
        
        <tr><th><input type="button" onClick="delete_confirm();" name="btndelete" value="Delete"></th></tr>
    </table>
</form>
</body>
</html>

<script>
function delete_confirm(){
    if(confirm("Are you sure want to delete these rows?")) {
document.frmUser.action = "Delete.php";
document.frmUser.submit();
}
}
</script>