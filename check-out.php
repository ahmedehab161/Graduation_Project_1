<html>
    <head>
        <link rel="stylesheet" href="css/Check-Out.css">
    </head>
        <body>
            <?php
                session_start();
                $host = "localhost";
                $user = "root";
                $pass = "";
                $db = "pms";

                $conn = mysqli_connect($host,$user,$pass,$db);
                $show = "SELECT * FROM selling";
                $result = mysqli_query($conn,$show);  

                for($i = 1 ; $i <= 140 ; $i++)
                {
                    echo "-";
                }
                echo"<br>";
                for($j = 1 ; $j <= 140 ; $j++)
                {
                    echo " ";
                }
                ?>
                    <label id="cashier-name">Cashier Name:<?php echo $_SESSION["username"] ?></label>
                <?php
                echo"<br>";
                ?>
                    <label id="date">Date:<?php echo date(' d/m/y'); ?></label>
                    <label id="time">Time:<?php echo date(' h:i:sa'); ?></label>
                <?php
                echo"<br>";
                for($i = 1 ; $i <= 140 ; $i++)
                {
                    echo "-";
                }
                echo"<br>";
                    ?>
                        <table>
                            <tr id="table-header">
                                <th>Medicine id</th>
                                <th>Product Name</th>
                                <th>Price per unit</th>
                                <th>No Of Units</th>
                                <th>Expiration date</th>
                                <th>Total price</th>
                            </tr>
                                <?php
                                     while ( $row = mysqli_fetch_array($result) )
                                    {
                                        echo "<tr>";
                                            echo "<td>".$row[0]."</td>";
                                            echo "<td>".$row[1]."</td>";
                                            echo "<td>".$row[2]."</td>";
                                            echo "<td>".$row[3]."</td>";
                                            echo "<td>".$row[4]."</td>";
                                            echo "<td>".$row[5]."</td>";
                                        echo "</tr>";
                                    }
                                ?>
                        </table>
                    <?php    
                echo"<br>";
                for($i = 1 ; $i <= 140 ; $i++)
                {
                    echo "-";
                }
                echo"<br>";
                ?>
                <?php
                     require 'php/db_connection.php';
                       if($conn){
                        $date=date('Y-m-d');
                ?>
                    <label id="total">Total:
                        <?php
                                $total = 0;
                                $query = "SELECT totalPrice FROM selling ";
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result))
                                $total = $total + $row['totalPrice'];
                            }
                            echo " $total";
                        ?>
                    </label>
                <?php
                    echo"<br>";
                    for($i = 1 ; $i <= 140 ; $i++)
                    {
                        echo "-";
                    }
                ?>
            <br>
            <form method="POST">
                <button type="submit" class="rainbow-button" id = "Cancel-recipt"  onclick="window.close()"><img id="iconcancel" src="icons/icons8-cancel-48.png">Cancel</button>
                <button type="submit" class="rainbow-button" id = "print-recipt" name = "print"><img id="iconprint" src="icons/icons8-print-48.png">Print</button>
                <button type="submit" class="rainbow-button" id = "done-recipt" name = "done" ondblclick="window.close()"><img id="icondone" src="icons/icons8-done-64.png">Done</button>
            </form>
            <?php
                 require 'php/db_connection.php';
                 if(isset($_POST['print']))
                 {
                    $diff="UPDATE med INNER JOIN selling ON med.medName = selling.medName
                        SET med.medQuantity = (med.medQuantity - selling.noOfUnits)";
                    mysqli_query( $conn , $diff );            
                 }
                if(isset($_POST['done']))
                {
                    $sql = "DELETE FROM selling ";
                    mysqli_query( $conn , $sql );
                }
                    
            ?>
        </body>
</html>