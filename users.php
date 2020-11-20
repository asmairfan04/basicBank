<?php

$servername="sql204.epizy.com";
$username="epiz_27192693";
$password="TOCBIhby2a7Bm7";
$dbname="epiz_27192693_basicbank";
$conn=mysqli_connect($servername,$username,$password,$dbname);


$result=mysqli_query($conn,"SELECT * FROM customers");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            
        }

        div.container{
            background-image: url("money4.jpg"); 
            background-position:center ;
            background-repeat: no-repeat;
            height: 787px;
            width: 1534px;
            

        }
        button{
            background-color: green;
            font-size: 20px;
            padding: 10px;
            color: white;
            margin-top: 105px;
            margin-left:700px;
            
            
            

        }
        button:hover {
            background-color:yellowgreen;
            color:green;
        }
        
        </style>
</head>
<body>
   
    <div class="container">
    <h1 style="size:50px;text-align:center;position:relative;top:70px; color: green; font-size: 60px">Users List</h1>
        <div style="height:450px;width:600px;background-color:green ;position:relative;top:110px;left:500px;padding:20px;text-align:center">
        


        
        <table style="text-align:center;position:relative;top:20px;left:70px">
            <thead>
                <tr>
                    <th><h1 style="color:silver">Name</h1></th>
                    <th><h1 style="color:silver">Email</h1></th>
                    <th><h1 style="color:silver">Amount</h1></th>

                </tr>
            </thead>
            <tbody style="text-align:center">
                <?php
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <td style="font-size:18px;color:silver;padding:5px"><?php echo $row['Name']; ?></td>
                    <td style="font-size:18px;color:silver;padding:5px"><?php echo $row['Email']; ?></td>
                    <td style="font-size:18px;color:silver;padding:5px"><?php echo $row['Amount']; ?></td>

                    </tr>
                    <?php 
                    }
                    ?>
            </tbody>

           
        
        </table>

                </div>
                <br>
                <a href="home.html" ><button >Go To Homepage</button></a>

    </div>
    
</body>
</html>