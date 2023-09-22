<html>
    <head>
        <link rel="stylesheet" href="css/expiration.css">
    </head>
    <body>
        <?php
            session_start();

            include"php/db_connection.php";

            $query = "SELECT * FROM med ";  
            $query_run = mysqli_query($conn, $query);
                                                
            while($row = mysqli_fetch_array($query_run)){
                $today_date=date('Y/m/d');
                $td=strtotime($today_date);
                
                $exp_date=$row["medDate"];
                $exp=strtotime($exp_date);

                    if($td>$exp){
                        $query1 = "SELECT medName FROM med WHERE medDate=$exp_date";
                        $show=mysqli_query($conn,$query1);
                        $medname=$row["medName"];
                        echo $medname."<br>";
                                                
                    }
            }
        ?>
    </body>
</html>