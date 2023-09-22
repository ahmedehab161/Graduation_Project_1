<html>
    <head>
        <link rel="stylesheet" href="css/out of stock.css">
    </head>
    <body>
        <?php
            session_start();

            include"php/db_connection.php";

            $query = "SELECT * FROM med ";  
            $query_run = mysqli_query($conn, $query);
                                                
            while($row = mysqli_fetch_array($query_run)){

                $quantity=$row["medQuantity"];

                if($quantity==0){
                                                
                    $query1 = "SELECT medName FROM med WHERE medQuantity=$quantity";
                    $show=mysqli_query($conn,$query1);
                    $medname=$row["medName"];
                    echo $medname."<br>";
                                                
                }
            }
        ?>
    </body>
</html>