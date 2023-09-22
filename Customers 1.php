<html>
	<head>
		<link rel="shortcut icon" href="icons/Logo.png" type="image/x-icon" />
        <link rel="stylesheet" href="css/customer-main-manger.css">
		<title>Pharmacy</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="jquery-3.6.0.min.js"></script>
		<script src="javascript/customers.js"></script>
	<head>
	<body>
		<?php
			include("php/cust.php");
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
                    <a class="Medicines" href="Medicine stock.php"><img class="icon" src="icons/icons8-medicines-64.png"><span>Medicines</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="active" href="Customers 1.php"><img class="icon" src="icons/icons8-customers-64.png"><span>Customers</span></a>
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
            <h2><img id="page-name-logo" src="icons/icons8-customers-64.png" height="35" width="35" style="margin-top:3px;"><span>Customer</span></h1>
        </div>
		<div id="content">
			<form method="post">
				<input type="text" placeholder="search" id="search">
				<label id="search-label"><h3>Search:</h3></label>
				<div id="table-size">
					<table id="table">
						<tr id="table-header">
							<th>Customer id</th>
							<th>Customer name</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Gender</th>
							<th>Date of birth</th>
							<th>Insurance company</th>
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
				<label id="ci-label"><h3>Customer ID:</h3></label>
				<input type="text" id="Customer-id" name="custID" readonly style="background:#cccccc;">
				<label id="cn-label"><h3>Customer Name:</h3></label>
				<input type="text" placeholder="Customer name" id="Customer-name" name="custName">
				<label id="P-label"><h3>Phone:</h3></label>
				<input type="number" placeholder="Phone" id="Phone" name="custPhone">
				<label id="a-label"><h3>Address:</h3></label>
				<input type="text" placeholder="Address" id="Address" name="custAddress">
				<label id="g-label"><h3>Gender:</h3></label>
				<input list="gender" placeholder="Gender" id="Gender" name="custGender">
				<datalist id="gender">
					<option value="Male">
					<option value="Female">
				</datalist>
				<label id="dob-label"><h3>Date Of Birth:</h3></label>
				<input type="date" id="Date" name="custBirth">
				<label id="ic-label"><h3>Insurance Company:</h3></label>
				<input type="text" placeholder="Insurance company" id="Insurance-company" name="custIC">
				<button type="submit" class="rainbow-button" onclick="addHtmlTableRow();" id="add" name="add"><img id="iconadd" src="icons/icons8-add-30.png">Add</button>
				<button type="submit" class="rainbow-button" onclick="updateHtmlTableSelectedRow();" id="update" name="update"><img id="iconupdate" src="icons/icons8-available-updates-30.png">Update</button>
				<button type="submit" class="rainbow-button" onclick="deleteSelectedRow();" id="delete" name="delete"><img id="icondelete" src="icons/icons8-delete-32.png">Delete</button>
			</form>
		</div>
		<script src="jquery-3.6.0.min.js"></script>
		<script src="javascript/customers.js"></script>
	<body>
<html>