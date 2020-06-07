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
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 15px;
  background-color: #f1f1c1;
}
table th {
  background-color: black;
  color: white;
}
table td {
  color: rgb(102, 0, 51);
}
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
        <div align="right" style ="color:yellow">
        <form action="logout.php">
        <input type="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTyxfx55fCnSmyVYRs8kQUWs8Wca2lqb0F2cuJwALIBQL-I49AN&usqp=CAU" alt="Submit" width="100" height="70" >
        </form>
        </div>
        <div>
        <form action="signin.php">
        <input type="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSNnHdGyu_VGgmBOJxljvr_eIiYVEZ9wW5jDP581t7GqfAB0jwa&usqp=CAU" alt="Submit" width="100" height="60">
        </form>
        </div>
    <?php
    //include('connect.php');
    $con=mysqli_connect('localhost','root','','myproject');
    $qry="SELECT * FROM expense";
    $run=mysqli_query($con,$qry);
    
    if($run)
    {
        ?>
        <div style="font-size:30px" align="center">
        <table width="70%">
        <tr>
        <th>USER</th>
        <th>ITEM</th>
        <th>PRICE</th>
        <th>DATE</th>
        </tr>
        </div>
        <?php
        while($res=mysqli_fetch_assoc($run))
        {
            echo"<tr>
                <td>".$res['email']."</td>
                <td>".$res['itemtype']."</td>
                <td>".$res['price']."</td>
                <td>".$res['date']."</td>
                </tr>";
        }
        ?>
        
        </table>
        <?php
    }
    else
    {
        echo "No record exists..!!please add some data";
    }
}
else{
    header('location:index.php');
}
    ?>
</body>
</html>