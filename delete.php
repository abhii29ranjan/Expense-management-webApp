<?php
error_reporting(0);
session_start();
if($_SESSION["user"])
{
    
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
    $qry="DELETE FROM expense WHERE sno=$ema ";
    $run=mysqli_query($con,$qry);
    if($run)
    {
       header('location:unidisplay.php');
     }
    else
    {
       echo ('cannot be deleted');
    }
    }
else
{
    header('location:index.php');
}
   ?> 
</body>
</html>