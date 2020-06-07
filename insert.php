<?php
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
</style>
<?php

    $emm=$_SESSION["user"];
    if(isset($_POST["insert"]))
    {
         if($_POST["item"]!=""&&$_POST["price"]!="")
        {
              $veg=$_POST["item"];
            $pri=$_POST["price"];
            $da=date("Y-m-d");
            $con=mysqli_connect('localhost','root','','myproject');
            $qry="INSERT INTO `expense`(`email`, `itemtype`, `price`, `date`) VALUES ('$emm','$veg','$pri','$da') ";
            $run=mysqli_query($con,$qry);
            if($run)
             {
?>
                <script>
                    alert("item inserted..!!");
                     window.open('signin.php','_self');
                </script>
<?php
             }
             else
            {
?>
                <script>
                    alert("insertion unsuccesful");
                    window.open('insert.php','_self');
                </script>
<?php
             }
        }
        else
        {
?>
            <script>
                alert("please insert every fields");
                window.open('insert.php','_self');
            </script>
<?php
        }
    
    }
    else
    {
        //  echo "$emm";
?>
        <body>
        <div style="background-color:tomato ";>
        <p style ="font-size:80px;color:yellow"  align="center" > WELCOME <?php echo $_SESSION["user"]?></p>
        </div>
        <div align="right" style ="color:yellow">
        <form action="logout.php">
        <input type="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTyxfx55fCnSmyVYRs8kQUWs8Wca2lqb0F2cuJwALIBQL-I49AN&usqp=CAU" alt="Submit" width="100" height="70" >
        </form>
        </div>
        <div>
        <form action="index.php">
        <input type="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSNnHdGyu_VGgmBOJxljvr_eIiYVEZ9wW5jDP581t7GqfAB0jwa&usqp=CAU" alt="Submit" width="100" height="60">
        </form>
        </div>
        <p style="font-size:40px;color:green" align="center">Fill up the fields and click on INSERT to add the record</p>
        <div align="center">
        <form action="" method="POST">
        <label for="items" style="font-size:40px;color:rgb(102, 0, 51)">ItemType: </label>
             <select name="item" id="items" style="font-size:25px">
                 <option value="veg">Vegetables</option>
                 <option value="fruits">Fruits</option>
                 <option value="rent">Rent</option>
                 <option value="ration">Ration</option>
                    <option value="water">Water</option>
                 <option value="other">Other stuffs</option>
             </select><br>
        <p style="font-size:40px;color:rgb(102, 0, 51)">Price: <input type="text" name="price" size="30"> </p><br>
        <h1><input type="submit" value="INSERT" name="insert" size="100" class="abh"> <input type="reset" class="abb"></h1>
        <div>

        </form>
        </body>
<?php
    }

}
else
{
    header('location:index.php');
}
?>
</html>