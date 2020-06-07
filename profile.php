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

<body>
<div style="background-color:tomato ";>
        <p style ="font-size:80px;color:yellow"  align="center" > WELCOME <?php echo $_SESSION["user"]?></p>
        </div>
        <p>
        <div align="right" style ="color:yellow">
        <form action="logout.php">
        <input type="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTyxfx55fCnSmyVYRs8kQUWs8Wca2lqb0F2cuJwALIBQL-I49AN&usqp=CAU" alt="Submit" width="100" height="70" >
        </form>
        </div>
        <div>
        <form action="signin.php">
        <input type="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSNnHdGyu_VGgmBOJxljvr_eIiYVEZ9wW5jDP581t7GqfAB0jwa&usqp=CAU" alt="Submit" width="130" height="70" >
        </form>
        </div>
        </p>
<div align="center">
<span style="font-size:40px;color:yellow" align="center"><a href="edit.php" style="font-size:40px;color:green"  >Edit your profile</a></span><br>
    <p style="font-size:40px;color:green" >Delete your account<br>
    <a href="del1.php?em=<?php echo $_SESSION['user'] ?>" style="font-size:40px;color:rgb(102, 0, 51)" onclick=" return askk()">1. Keep your data in the records</a><br>
    <a href="del2.php?em=<?php echo $_SESSION['user'] ?>" style="font-size:40px;color:rgb(102, 0, 51)" onclick=" return ask()">2. Delete your data as well</a>
    </p>
    <script>
        function ask()
        {
                return confirm("Do you realy want to delete your account and all your data as well?");
        }
        function askk()
        {
                return confirm("Do you realy want to delete your account?");
        }
    </script>
</div>
</body>
</html>