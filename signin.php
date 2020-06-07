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
<style>
body
 {
        background-image: url('https://i.pinimg.com/originals/85/97/c5/8597c5979590d4054f5f13082c3c41f3.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
 }
</style>



        <body >
        <div style="background-color:tomato ";>
        <p style ="font-size:80px;color:yellow"  align="center" > WELCOME <?php echo $_SESSION["user"]?></p>
        </div>
        <div align="right" style ="color:yellow">
        <form action="logout.php">
        <input type="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTyxfx55fCnSmyVYRs8kQUWs8Wca2lqb0F2cuJwALIBQL-I49AN&usqp=CAU" alt="Submit" width="100" height="70" >
        </form>
        </div>
        <div>
        <form action="profile.php">
        <input type="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSjeV7NeQHDpH08Fj2IVMeo3m2xZlKwM3hG5oik8-4UiKtV0dJz&usqp=CAU" alt="Submit" width="130" height="70" >
        </form>
        </div>
        <br><br>
        <div align ="center">
        <span style="font-size:40px;color:yellow"><a href="insert.php" style="color:rgb(102, 0, 51)">Bought something??Add it to the record</a></span><br><br>
        <span style="font-size:40px;color:red"><a href="unidisplay.php" style="color:rgb(102, 0, 51)">Want to see your records??</a></span><br><br>
        <span style="font-size:40px;color:red"><a href="display.php" style="color:rgb(102, 0, 51)">Want to see full record??</a></span><br><br>
        </div>
        

</html>