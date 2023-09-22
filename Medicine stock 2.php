<html>
	<head>
		<link rel="shortcut icon" href="icons/Logo.png" type="image/x-icon" />
        <link rel="stylesheet" href="css/medicine stock page.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="jquery-3.6.0.min.js"></script>
		<script src="javascript/medicine stock.js"></script>
		<title>Pharmacy</title>
	<head>
	<body>
		<?php
			include("php/med.php");
		?>
		<ul class="side-bar">
			<dev>
                    <img class="main-logo" src="icons/Logo.png" width="375px" >
            </dev>
			<div class="container1" onclick="myFunction(this)">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>
			<li>
                <dev id="text">
                    <a class="active" href="Medicine stock 2.php"><img class="icon" src="icons/icons8-medicines-64.png"><span>Medicines</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="Customers" href="Customers 2.php"><img class="icon" src="icons/icons8-customers-64.png"><span>Customers</span></a>
                </dev>
			</li>
            <li>
                <dev id="text">
                    <a class="Logout" href="index.php"><img class="icon" src="icons/icons8-logout-48.png"><span>logout</span></a>
                </dev>  
			</li>
		</ul>
        <div id="main-content">
            <h2><img id="page-name-logo" src="icons/icons8-manufacturing-48.png" height="35" width="35"><span>Medicines</span></h2>
        </div>
		<div id="content">
			<form method="post">
				<div id="table-size2">
					<table id="table-medicine">
						<tr id="table-medicine-2">
							<th>Medicine id</th>
							<th>Medicine name</th>
							<th>Buying price</th>
							<th>Selling price</th>
							<th>Medicine quantity</th>
							<th>Manufacturer name</th>
							<th>Expiration date</th>
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
										echo "<td>".$row[6]."</td>";
									echo "</tr>";
								}
							?>
					</table>
				</div>
				<input type="text" placeholder="search" id="search2">
				<label id="search-label2"><h3>Search:</h3></label>
				<button class="rainbow-button" id="expiration" onclick='var myW=window.open("exp.php", "mywindow", "width = 400px" + window.screen.width + ", height = 800px" + window.screen.width / 3 + "");'><img id="iconexpiration" src="icons/icons8-expired-100.png">expiration</button>
				<button class="rainbow-button" id="outofstock" onclick='var myW=window.open("outofstock.php", "mywindow", "width = 400px" + window.screen.width + ", height = 800px" + window.screen.width / 3 + "");'><img id="iconoutofstock" src="icons/icons8-out-of-stock-64.png">outofstock</button>
			</div>
		</form>
		<script src="jquery-3.6.0.min.js"></script>
		<script src="javascript/medicine stock.js"></script>
	</body>
<html>