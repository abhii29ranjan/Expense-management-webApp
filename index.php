<?php
error_reporting(0);
session_start();
if($_SESSION["user"])
{
    header('location:signin.php');
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
body {
  background-image: url('https://i.pinimg.com/originals/85/97/c5/8597c5979590d4054f5f13082c3c41f3.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
.abh {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 30px;
  margin: 4px 2px;
  cursor: pointer;
}
.abb {
  background-color: red; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 30px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<body>
<?php
if(isset($_POST["signin"]))
{
    $con=mysqli_connect('localhost','root','','myproject');
    $ema=$_POST["username"];
    $pa=$_POST["pass"];
    $ch="select * from user where email='$ema' and password='$pa' ";
    $check=mysqli_query($con,$ch);
    $row=mysqli_num_rows($check);
    if($row<1)
    {
 ?>
        <script>
    alert('User  id or password doest not match');
    window.open('index.php','_self');
    </script>
    <?php
    }
    else
    {
        $data=mysqli_fetch_assoc($check);
        $id=$data["email"];

        $_SESSION["user"]=$id;
        header('location:signin.php');

    }
}
else
{
?>
    <div style="background-color:tomato ";>
    <p style ="font-size:80px;color:yellow"  align="center" > EXPENSE MANAGEMENT</p>
    </div>
    <form action="signup.php">
    <input type="image" src="https://www.freeiconspng.com/uploads/sign-up-button-png-18.png" alt="Submit" width="150" height="100">
    </form>
    <br>
    <form action="" method="POST">
    <h1 style="font-size:40px;color:rgb(102, 0, 51)" align ="center">User: <input type="text" name="username" size="30" width="100" height="60"></h1><br>
    <h1 style="font-size:40px;color:rgb(102, 0, 51)" align="center"> Password: <input type="password" name="pass"></h1><br>
    <h1 style="font-size:40px"align="center"><input type="submit" value="SIGN IN" width="150" height="100" name="signin" class="abh"> <input type="reset" class="abb"><br></h1> 
    

    </form>
<?php
}
?>

</body>
</html>