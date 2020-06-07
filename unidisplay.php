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


    $ema=$_SESSION["user"];
   // echo "$ema";
    //include('connect.php');
    $con=mysqli_connect('localhost','root','','myproject');
    $qry="SELECT * FROM EXPENSE WHERE email='$ema' ";
    $run=mysqli_query($con,$qry);
    $res=mysqli_num_rows($run);
    if($res)
    {
        ?>
        <div style="font-size:30px" align="center">
        <table style="width:70%">
        <tr>
        <th>Serial no</th>
        <th>USER</th>
        <th>ITEM</th>
        <th>PRICE</th>
        <th>DATE</th>
        <th>UPDATE</th>
        <th>DELETE</th>
        </tr>
        </div>
        <?php
        while($res=mysqli_fetch_assoc($run))
        {
            ?>
            <br>
            <?php
            echo" <div align='center'> <tr>
                <td>".$res['sno']."</td>
                <td>".$res['email']."</td>
                <td>".$res['itemtype']."</td>
                <td>".$res['price']."</td>
                <td>".$res['date']."</td>
                <td> <a href='update.php?it=$res[itemtype]&p=$res[price]&d=$res[date]' style='color:red'>EDIT</td>
                <td><a href='delete.php?em=$res[sno]' onclick=' return ask()'>REMOVE</td>
                </tr> </div>";
        }
        ?>
        <script>
        function ask()
        {
                return confirm("Do you realy want to delete ?");
        }
        </script>
        </table>
        <?php
    }
    else
    {
        echo "<p align ='center' style='font-size:40px ;color:red'>No record exists..!!please add some data</p>";
    }
}
else
{
    header('location:index.php');
}
    ?>
</body>
</html>