<?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "pms";
			
			$conn = mysqli_connect($host,$user,$pass,$db);
			
			$show = "SELECT * FROM cust";
			$result = mysqli_query($conn,$show);

			

			
			if( isset($_POST['custID']) )
			{
				$custID = strip_tags($_POST['custID']);
			}
			if( isset($_POST['custName']) )
			{
				$custName = strip_tags($_POST['custName']);
			}
			if( isset($_POST['custPhone']) )
			{
				$custPhone = strip_tags($_POST['custPhone']);
			}
			if( isset($_POST['custAddress']) )
			{
				$custAddress = strip_tags($_POST['custAddress']);
			}
			if( isset($_POST['custGender']) )
			{
				$custGender = strip_tags($_POST['custGender']);
			}
			if( isset($_POST['custBirth']) )
			{
				$custBirth = strip_tags($_POST['custBirth']);
			}
			if( isset($_POST['custIC']) )
			{
				$custIC = strip_tags($_POST['custIC']);
			}
			
			$sqls = "";
			
			if(isset($_POST['add']))
			{ 	
				$dup = mysqli_query($conn,"SELECT * FROM cust where custPhone='$custPhone'");
				
				if(mysqli_num_rows($dup)>0)
				{
					echo "<script> alert('This phone number already exists');</script>";
				}
				else if($custName==="")
				{
					echo "<script> alert('Customer name can't be empty');</script>";
				}
				else if($custPhone==="")
				{
					echo "<script> alert('Phone can't be empty');</script>";
				}
				else if($custAddress==="")
				{
					echo "<script> alert('Address can't be empty');</script>";
				}
				else if($custGender==="")
				{
					echo "<script> alert('Gender can't be empty');</script>";
				}
				else if($custBirth==="")
				{
					echo "<script> alert('Date can't be empty');</script>";
				}
				else if($custIC==="")
				{
					echo "<script> alert('Insurance company can't be empty');</script>";
				}
				else
				{
					$sqls = "INSERT INTO cust (custName,custPhone,custAddress,custGender,custBirth,custIC)
							VALUES ('$custName','$custPhone','$custAddress','$custGender','$custBirth','$custIC')";
							mysqli_query($conn,$sqls);
							header("Location: Customers 1.php");
				}
			}
				
			else if(isset($_POST['update']))
			{
				$dup = mysqli_query($conn,"SELECT * FROM cust where custPhone='$custPhone'");
				
				// if(mysqli_num_rows($dup)>0)
				// {
				// 	echo "<script> alert('This phone number already exists');</script>";
				// }
				 if($custName==="")
				{
					echo "<script> alert('Customer name can't be empty');</script>";
				}
				else if($custPhone==="")
				{
					echo "<script> alert('Phone can't be empty');</script>";
				}
				else if($custAddress==="")
				{
					echo "<script> alert('Address can't be empty');</script>";
				}
				else if($custGender==="")
				{
					echo "<script> alert('Gender can't be empty');</script>";
				}
				else if($custBirth==="")
				{
					echo "<script> alert('Date can't be empty');</script>";
				}
				else if($custIC==="")
				{
					echo "<script> alert('Insurance company can't be empty');</script>";
				}
				else
				{
				$sqls = "UPDATE cust SET custName='$custName',custPhone='$custPhone',custAddress='$custAddress',custGender='$custGender',custBirth='$custBirth',custIC='$custIC' 
						 WHERE custID=$custID";
				mysqli_query($conn,$sqls);
				header("Location: Customers 1.php");
				}
			}
			else if(isset($_POST['delete']))
			{
				$sqls = "DELETE FROM cust WHERE custID=$custID";
				mysqli_query($conn,$sqls);
				header("Location: Customers 1.php");
			}
		?>