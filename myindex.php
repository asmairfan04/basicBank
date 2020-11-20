
<?php

$flag=0;
if(isset($_POST["sender"])){
    if(isset($_POST["reciever"])){
        if(isset($_POST["amt"])){

            $servername="sql204.epizy.com";
            $username="epiz_27192693";
            $password="TOCBIhby2a7Bm7";
            $dbname="epiz_27192693_basicbank";
            $con=mysqli_connect($servername,$username,$password,$dbname);


            $sender=$_POST["sender"];
            $reciever=$_POST["reciever"];
            $amt=$_POST["amt"];
            $current_cr="select * from customers where name='".$sender."'";
            $result=mysqli_query($con,$current_cr);
            $row=mysqli_fetch_array($result);
            
            if( $reciever==$sender){
                $flag=3;
            }

            elseif ($amt>$row['Amount']) {
                $flag=2;
            }

            else {
                $sql="INSERT INTO `transactions` (`Sender`, `Reciever`, `Amount`) VALUES ('$sender', '$reciever', '$amt')";
                if ($con->query($sql)==true) {
                    $flag=1;
                }
            
                $query = "update customers set Amount=Amount-" . $amt . " where name='" . $sender . "'";
                $query2= "update customers set Amount=Amount+" . $amt . " where name='" . $reciever . "'";    
                       
                $con->query($query);
                $con->query($query2);
            }
            
                         
                                               
                       
            
            
            
            
        }
    }
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System</title>

    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        div.container{
            background-image: url("image6.jpg"); 
            background-position:center ;
            background-repeat: no-repeat;
            height: 770px;
            width: 1530px;

        }
        .container h1{
            text-align: center;
            margin: 20px;
            padding: 30px;
        }
        div.panel{
            text-align: center;
            background-color:silver;
            width: 500px;
            height: 500px;
            position: relative;
            left: 500px;
            top: 100px;
        }
        label {
            font-size: 20px;
            text-align: left;
            padding: 20px;
            margin-left: 30px;
        }
        select{
            padding: 5px;
            margin-left: 30px;
            width:150px;
            height:30px;
            margin-top:5px;
           
        }
        input{
            padding: 5px;
            margin-left: 30px;
            width:150px;
            height:30px;
            margin-top:20px;
           
        }
        button{
            font-size: 18px;
            padding: 10px;
            margin-top: 15px;
            
            
            

        }
        p{
            font-size: 18px;
            padding: 10px;
            margin-top: 15px;
            margin-left:120px;
            background-color:rgb(38, 165, 224);
            width:300px;
        }
        button:hover {
            background-color:rgb(38, 165, 224);;
        }
       
        
        
        
    </style>
        
</head>
<body>
    <div class="container">
        <div class="panel">
            <h1>Transfer Money</h1>
           
            
            
            <form action="myindex.php" method="post">
                <label >From:</label> 
                <select name="sender" >
                    <?php
                    $servername="sql204.epizy.com";
                    $username="epiz_27192693";
                    $password="TOCBIhby2a7Bm7";
                    $dbname="epiz_27192693_basicbank";
                    $con=mysqli_connect($servername,$username,$password,$dbname);
                    
                    
                    if (!$con) {
                      die("Connectionfailed: " . mysqli_connect_error());
                    }
                    $result_send =$con->query("SELECT Name FROM `customers`");
                    while($row_send=$result_send->fetch_assoc())
                    {
                        $senders=$row_send['Name'];
                        echo"<option value=$senders>$senders</options>";
                    }
                    ?>
                </select>
               

                <br><br>
                <label style="margin-left:55px" >To:</label>
                <select name="reciever">
                    <?php
                    $result_recieve =$con->query("SELECT Name FROM `customers`");
                    while($row_receive=$result_recieve->fetch_assoc())
                    {
                        $recievers=$row_receive['Name'];
                        echo"<option value=$recievers>$recievers</options>";
                    }
                    ?>
                </select>
                
                <br><br>
                <label style="margin-left:20px"> Amount:</label>
                <input type="int" name="amt" id="amt">
                <br><br>





                <button class="btn">Transfer</button>

            </form>
            <a href="home.html" ><button >Go To Homepage</button></a>
            <a href="transaction.php" ><button >Transaction History</button></a>
            <?php
                
                if($flag==3){
                    echo "<p>Sender and reciever cannot be same</p>";
                }
                if($flag==2){
                    echo "<p>Amount transferred cannot be more than user's current amount</p>";
                }
                if($flag==1){
                    echo "<p>Successfully Transferred!</p>";
                }
                
            ?>
        </div>
    </div>
</body>
</html>



