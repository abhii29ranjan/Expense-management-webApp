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
<?php
if(isset($_POST["signup"]))
{
    if($_POST['gmail']!=""&&$_POST['pass']!="")
    {
        $con=mysqli_connect('localhost','root','','myproject');
        $ema=$_POST["gmail"];
        $ch="select * from user where email='$ema' ";
        $check=mysqli_query($con,$ch);
        $row=mysqli_num_rows($check);
        if($row<1)
        {
             $pa=$_POST["pass"];
             $emai1=$_SESSION["user"] ;
            
            $qry="INSERT INTO user(email, password) VALUES ('$ema','$pa')";
            $qrry="UPDATE expense set email='$ema' where email='$emai1' ";
            $qrrry=" DELETE FROM user WHERE email='$emai1' ";
            $run=mysqli_query($con,$qry);
            $runn=mysqli_query($con,$qrry);
            $runnn=mysqli_query($con,$qrrry);
            if($run&&$runn)
            {
                $_SESSION["user"]=$ema;
                 ?>
                <script>
                alert("succesfully edited your account");
                window.open('signin.php','_self');
                </script>
                <?php
            }
        } 
        else
        {
             ?>
            <script>
            alert("user id already exists");
            window.open('edit.php','_self');
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
        alert("fill every field..!!");
        window.open('edit.php','_self');
        </script>
        <?php
    }

}
else
{ ?>
    <body>
    <div style="background-color:tomato ";>
    <p style ="font-size:80px;color:yellow"  align="center" > WELCOME <?php echo $_SESSION["user"]?></p>
    
    </div>
    <div>
        <form action="index.php">
        <input type="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSNnHdGyu_VGgmBOJxljvr_eIiYVEZ9wW5jDP581t7GqfAB0jwa&usqp=CAU" alt="Submit" width="130" height="60">
        </form>
        </div>
    <div>
    <form action="" method="POST">
  <h1 style="font-size:40px" align ="center"> New UserId: <input type="text" name="gmail" placeholder="give your email id"><br>
    <h1 style="font-size:40px" align ="center"> New Password: <input type="password" name="pass"><br>
    <h1 style="font-size:40px" align ="center"><input type="submit" value="EDIT" name="signup" class="abh"> <input type="reset" class="abb"><br>
    </form>
    
    </div>
    </body>
    
    <?php
}
?>
     
</html>