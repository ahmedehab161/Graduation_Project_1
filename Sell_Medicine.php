<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<link rel="shortcut icon" href="icons/Logo.png" type="image/x-icon" />
	<link rel="stylesheet" href="css/sell-medicine-main.css">
		<title>Pharmacy</title>
	</head>
	<body>
		<?php
			include("php/selling.php");
		?>
		<ul class="side-bar">
			<dev>
                    <img class="main-logo" src="icons/Logo.png" width="375px" >
            </dev>
            <li>
                <dev id="text">
                    <a class="logout" href="index.php"><img class="icon" src="icons/icons8-logout-48.png"><span>logout</span></a>
                </dev>  
			</li>
		</ul>
		<div id="main-content">
            <h2><img id="page-name-logo" src="icons/icons8-sell-stock-60.png" height="35" width="35"><span>Sell Medicine</span></h1>
        </div>
		<div class="list-div">
					<table id="list-table" >
						<tr class="list-header">
						</tr>
                        <?php
								while ( $row = mysqli_fetch_array($list_result) )
								{
									echo "<tr>";
										echo "<td>".$row[0]."</td>";
									echo "</tr>";
								}
						?>	
					</table>
				</div>
        </div>
		<div id="content">
		<form action ="" method="post">
		<input type="text" placeholder="search" name="medName" value="<?php if(isset($_POST['medName'])){echo $_POST['medName'];}?>" id="search">	
		<button type="submit" class="rainbow-button" id="fetch"><img id="sending" src="icons/icons8-send-64.png"></button>
			<div id="table-size">
				<table id="table1">
						<tr id="table-header">
						<th>Medicine id</th>
						<th>Medicine name</th>
						<th>price per unit</th>
						<th>no of units</th>
						<th>Expiration date</th>
						<th>total price</th>
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
			</div>
			<div>
				<?php
					$host = "localhost";
					$user = "root";
					$pass = "";
					$db = "pms";
					
					$conn = mysqli_connect($host,$user,$pass,$db);
					if(isset($_POST['medName']))
					{
						$medName = $_POST['medName'];
						$query = "SELECT * FROM med WHERE medName = '$medName'";
						$query_run = mysqli_query($conn,$query);
						//check record is in table or not
						if(mysqli_num_rows($query_run) > 0)
						{
							foreach($query_run as $row){
								?>

								<label id="mi-label"><h3>Medicine ID:</h3></label>
								<input type="text" value="<?= $row['medID']; ?>" id="Medicine-id" name="medID" readonly style="background:#cccccc;">
								<label id="md-label"><h3>Medicine Name:</h3></label>
								<input type="text" value="<?= $row['medName']; ?>" placeholder="Medicine name" id="Medicine-name" name="medName" readonly style="background:#cccccc;">
								<label id="ppu-label"><h3>Price Per Unit:</h3></label>
								<input type="number" value="<?= $row['medSP']; ?>" placeholder="Price per unit" id="price-per-unit" name="pricePerUnit" readonly style="background:#cccccc;">
								<label id="nou-label"><h3>No Of Units:</h3></label>
								<input type="number" placeholder="No of units" id="no-of-units" name="noOfUnits">
								
								
								<label id="tp-label"><h3>Total Price:</h3></label>

								<?php
                                    $sum="";
                                    if(isset($_POST['add'])) 
                                    {
										$a=$_POST['pricePerUnit'];
										$b=$_POST['noOfUnits'];
										echo $sum=$a * $b ;
                                    }
                                ?>
													   
								<input type="text" value="<?php echo $sum ?>" id="total-price" name="totalPrice" readonly style="background:#cccccc;">
								<label id="d-label"><h3>Date:</h3></label>
								<input type="date" value="<?= $row['medDate']; ?>" id="Date" name="date" readonly style="background:#cccccc;">
								
								
								
								<?php
							}
						}else{
							echo "NO Record Found";
						}
					}
					
				?>
				<button type="submit" class="rainbow-button" onclick="addHtmlTableRow();" id="add" name="add"><img id="iconadd" src="icons/icons8-add-to-cart-30.png">AddTocart</button>
				<button type="submit" class="rainbow-button" id="checkout" onclick='var myW=window.open("check-out.php", "mywindow", "width = 760px" + window.screen.width + ", height = 800px" + window.screen.width / 3 + "");'><img id="iconcheckout" src="icons/icons8-check-out-32.png">check out</button>
								<button type="submit" class="rainbow-button" onclick="deleteSelectedRow();" id="delete" name="remove"><img id="icondelete" src="icons/icons8-delete-32.png">Remove</button>
			</div>			
			</form>
			
		<script src="jquery-3.6.0.min.js"></script>
		<script src="javascript/sell medicine.js"></script>    
</tbody>

</table>

</div>

</body>

</html>