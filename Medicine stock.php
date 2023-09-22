<html>
	<head>
		<link rel="shortcut icon" href="icons/Logo.png" type="image/x-icon" />
        <link rel="stylesheet" href="css/medicine stock page.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="jquery-3.6.0.min.js"></script>
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
				    <a class="Dashboard" href="Dashboard.php"><img class="icon" src="icons/icons8-dashboard-60.png"><span>Dashboard</span></a>
                </dev>    
            </li>
			<li>
                <dev id="text">
                    <a class="active" href="Medicine stock.php"><img class="icon" src="icons/icons8-medicines-64.png"><span>Medicines</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="Customer" href="Customers 1.php"><img class="icon" src="icons/icons8-customers-64.png"><span>Customers</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="Manufacturer" href="Manufacturer.php"><img class="icon" src="icons/icons8-manufacturing-48.png"><span>Manufacturer</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="Employees" href="Employees.php"><img class="icon" src="icons/icons8-employees-64.png"><span>Employees</span></a>
                </dev>  
			</li>
            <li>
                <dev id="text">
                    <a class="Logout" href="index.php"><img class="icon" src="icons/icons8-logout-48.png"><span>logout</span></a>
                </dev>  
			</li>
		</ul>
        <div id="main-content">
            <h2><img id="page-name-logo" src="icons/icons8-manufacturing-48.png" height="35" width="35"><span>Medicines</span></h1>
        </div>
		<div id="content">
			<form method="post">
				<input type="text" placeholder="Search" id="search">
				<label id="search-label"><h3>Search:</h3></label>
				<div id="table-size">
					<table id="table">
						<tr id="table-header">
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
					<label id="mi-label"><h3>Medicine ID:</h3></label>
					<input type="text" id="Medicine-id" name="medID" readonly style="background:#cccccc;">
					<label id="mn-label"><h3>Medicine Name:</h3></label>
					<input type="text" placeholder="Medicine name" id="Medicine-name" name="medName">
					<label id="bp-label"><h3>Buying Price:</h3></label>
					<input type="number" placeholder="Buying price" id="Buying-price" name="medBP">
					<label id="sp-label"><h3>Selling Price:</h3></label>
					<input type="number" placeholder="Selling price" id="Selling-price" name="medSP">
					<label id="q-label"><h3>Quantity:</h3></label>
					<input type="number" placeholder="Quantity" id="Quantity" name="medQuantity">
					<label id="ma-label"><h3>Manufacturer Name:</h3></label>
					<input list="Manufacturer name" placeholder="Manufacturer name" id="Manufacturer-name" name="medMN">
					<datalist id="Manufacturer name">
						<option value="Example1">
						<option value="Example2">
						<option value="Example3">
					</datalist>
					<label id="ed-label"><h3>Expiration Date:</h3></label>
					<input type="date" id="Date" name="medDate">
					<button type="submit" class="rainbow-button" onclick="addHtmlTableRow();" id="add" name="add"><img id="iconadd" src="icons/icons8-add-30.png">Add</button>
				<button type="submit" class="rainbow-button" onclick="updateHtmlTableSelectedRow();" id="update" name="update"><img id="iconupdate" src="icons/icons8-available-updates-30.png">Update</button>
				<button type="submit" class="rainbow-button" onclick="deleteSelectedRow();" id="delete" name="delete"><img id="icondelete" src="icons/icons8-delete-32.png">Delete</button>
				<button class="rainbow-button" id="expiration" onclick='var myW=window.open("exp.php", "mywindow", "width = 400px" + window.screen.width + ", height = 800px" + window.screen.width / 3 + "");'><img id="iconexpiration" src="icons/icons8-expired-100.png">expiration</button>
				<button class="rainbow-button" id="outofstock" onclick='var myW=window.open("outofstock.php", "mywindow", "width = 400px" + window.screen.width + ", height = 800px" + window.screen.width / 3 + "");'><img id="iconoutofstock" src="icons/icons8-out-of-stock-64.png">outofstock</button>
			</form>
		</div>
		<script src="jquery-3.6.0.min.js"></script>
		<script src="javascript/medicine stock.js"></script>
	<body>
<html>