<?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "pms";
			
			$conn = mysqli_connect($host,$user,$pass,$db);
			
			$show = "SELECT * FROM med";
			$result = mysqli_query($conn,$show);
			
			if( isset($_POST['medID']) )
			{
				$medID = strip_tags($_POST['medID']);
			}
			if( isset($_POST['medName']) )
			{
				$medName = strip_tags($_POST['medName']);
			}
			if( isset($_POST['medBP']) )
			{
				$medBP = strip_tags($_POST['medBP']);
			}
			if( isset($_POST['medSP']) )
			{
				$medSP = strip_tags($_POST['medSP']);
			}
			if( isset($_POST['medQuantity']) )
			{
				$medQuantity = strip_tags($_POST['medQuantity']);
			}
			if( isset($_POST['medMN']) )
			{
				$medMN = strip_tags($_POST['medMN']);
			}
			if( isset($_POST['medDate']) )
			{
				$medDate = strip_tags($_POST['medDate']);
			}
			
			$sqls = "";
			
			if(isset($_POST['add']))
			{
				$dup = mysqli_query($conn,"SELECT * FROM med where medName='$medName'");
				
				if(mysqli_num_rows($dup)>0)
				{
					echo "<script> alert('This medicine already exists');</script>";
				}
				else if($medName==="")
				{
					echo "<script> alert('Medicinen name can't be empty');</script>";
				}
				else if($medBP==="")
				{
					echo "<script> alert('Buying price can't be empty');</script>";
				}
				else if($medSP==="")
				{
					echo "<script> alert('Selling price can't be empty');</script>";
				}
				else if($medQuantity==="")
				{
					echo "<script> alert('Quantity can't be empty');</script>";
				}
				else if($medMN==="")
				{
					echo "<script> alert('Manufacturer name can't be empty');</script>";
				}
				else if($medDate==="")
				{
					echo "<script> alert('Date can't be empty');</script>";
				}
				else
				{
					$sqls = "INSERT INTO med (medName,medBP,medSP,medQuantity,medMN,medDate)
							VALUES ('$medName',$medBP,$medSP,$medQuantity,'$medMN','$medDate')";
							mysqli_query($conn,$sqls);
							header("Location: Medicine stock.php");
				}
			}	
			else if(isset($_POST['update']))
			{
				$dup = mysqli_query($conn,"SELECT * FROM med where medName='$medName'");
				
				// if(mysqli_num_rows($dup)>0)
				// {
				// 	echo "<script> alert('This medicine already exists');</script>";
				// }
				// else if($medName==="")
				// {
				// 	echo "<script> alert('Medicinen name can't be empty');</script>";
				// }
				 if($medBP==="")
				{
					echo "<script> alert('Buying price can't be empty');</script>";
				}
				else if($medSP==="")
				{
					echo "<script> alert('Selling price can't be empty');</script>";
				}
				else if($medQuantity==="")
				{
					echo "<script> alert('Quantity can't be empty');</script>";
				}
				else if($medMN==="")
				{
					echo "<script> alert('Manufacturer name can't be empty');</script>";
				}
				else if($medDate==="")
				{
					echo "<script> alert('Date can't be empty');</script>";
				}
				else
				{
				$sqls = "UPDATE med SET medName='$medName',medBP=$medBP,medSP=$medSP,medQuantity=$medQuantity,medMN='$medMN',medDate='$medDate' 
						 WHERE medID=$medID";
				mysqli_query($conn,$sqls);
				header("Location: Medicine stock.php");
				}
			}
			else if(isset($_POST['delete']))
			{
				$sqls = "DELETE FROM med WHERE medID=$medID";
				mysqli_query($conn,$sqls);
				header("Location: Medicine stock.php");
			}
		?>