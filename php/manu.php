<?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "pms";
			
			$conn = mysqli_connect($host,$user,$pass,$db);
			
			$show = "SELECT * FROM manu";
			$result = mysqli_query($conn,$show);
			
			
			
			if( isset($_POST['compID']) )
			{
				$compID = strip_tags($_POST['compID']);
			}
			if( isset($_POST['compName']) )
			{
				$compName = strip_tags($_POST['compName']);
			}
			if( isset($_POST['compPhone']) )
			{
				$compPhone = strip_tags($_POST['compPhone']);
			}
			if( isset($_POST['compAddress']) )
			{
				$compAddress = strip_tags($_POST['compAddress']);
			}
			
			$sqls = "";
			
			if(isset($_POST['add']))
			{
				$dup = mysqli_query($conn,"SELECT * FROM manu where compName='$compName'");
				$dup2 = mysqli_query($conn,"SELECT * FROM manu where compPhone='$compPhone'");
				$dup3 = mysqli_query($conn,"SELECT * FROM manu where compAddress='$compAddress'");
				
				// if(mysqli_num_rows($dup)>0)
				// {
				// 	echo "<script> alert('This company already exists');</script>";
				// }
				if(mysqli_num_rows($dup2)>0)
				{
					echo "<script> alert('This phone already exists');</script>";
				}
				else if(mysqli_num_rows($dup3)>0)
				{
					echo "<script> alert('This address already exists');</script>";
				}
				else if($compName==="")
				{
					echo "<script> alert('Company name can't be empty');</script>";
				}
				else if($compPhone==="")
				{
					echo "<script> alert('Phone can't be empty');</script>";
				}
				else if($compAddress==="")
				{
					echo "<script> alert('Address can't be empty');</script>";
				}
				else
				{
					$sqls = "INSERT INTO manu (compName,compPhone,compAddress)
							VALUES ('$compName','$compPhone','$compAddress')";
							mysqli_query($conn,$sqls);
							header("Location: Manufacturer.php");
				}
			}
			else if(isset($_POST['update']))
			{
				$dup = mysqli_query($conn,"SELECT * FROM manu where compName='$compName'");
				$dup2 = mysqli_query($conn,"SELECT * FROM manu where compPhone='$compPhone'");
				$dup3 = mysqli_query($conn,"SELECT * FROM manu where compAddress='$compAddress'");
				
				// if(mysqli_num_rows($dup)>0)
				// {
				// 	echo "<script> alert('This company already exists');</script>";
				// }
				// else if(mysqli_num_rows($dup2)>0)
				// {
				// 	echo "<script> alert('This phone already exists');</script>";
				// }
				// else if(mysqli_num_rows($dup3)>0)
				// {
				// 	echo "<script> alert('This address already exists');</script>";
				// }
				if($compName==="")
				{
					echo "<script> alert('Company name can't be empty');</script>";
				}
				else if($compPhone==="")
				{
					echo "<script> alert('Phone can't be empty');</script>";
				}
				else if($compAddress==="")
				{
					echo "<script> alert('Address can't be empty');</script>";
				}
				else
				{
				$sqls = "UPDATE manu SET compName='$compName',compPhone='$compPhone',compAddress='$compAddress'
						 WHERE compID=$compID";
				mysqli_query($conn,$sqls);
				header("Location: Manufacturer.php");
				}
			}
			else if(isset($_POST['delete']))
			{
				$sqls = "DELETE FROM manu WHERE compID=$compID";
				mysqli_query($conn,$sqls);
				header("Location: Manufacturer.php");
			}
		?>