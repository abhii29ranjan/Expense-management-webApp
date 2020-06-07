<?php
session_start();
if(!$_SESSION["user"])
{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
   
   $ema=$_GET["em"];
  $con= mysqli_connect('localhost','root','','myproject');
  $qry="DELETE FROM user WHERE email='$ema' ";
  $run=mysqli_query($con,$qry);
  if($run)
  {
      ?>
    <script>
    alert('Acount has been deleted');
    window.open('logout.php','_self');
    </script>
    <?php
   }
  else
  {
      ?>
      <script>
     alert (' Account cannot be deleted');
     window.open('profile.php','_self');
    </script>
    <?php     

  }
  ?>
  
</body>
</html>