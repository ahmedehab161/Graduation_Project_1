<?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "pms";
			
			$conn = mysqli_connect($host,$user,$pass,$db);
			
			$show = "SELECT * FROM selling";
			$result = mysqli_query($conn,$show);

			$list_show = "SELECT medName FROM med";
			$list_result = mysqli_query($conn,$list_show);
			
			if( isset($_POST['medID']) )
			{
				$medID = strip_tags($_POST['medID']);
			}
			if( isset($_POST['medName']) )
			{
				$medName = strip_tags($_POST['medName']);
			}
			if( isset($_POST['pricePerUnit']) )
			{
				$pricePerUnit = strip_tags($_POST['pricePerUnit']);
			}
			if( isset($_POST['noOfUnits']) )
			{
				$noOfUnits = strip_tags($_POST['noOfUnits']);
			}
			if( isset($_POST['date']) )
			{
				$date = strip_tags($_POST['date']);
			}
			if( isset($_POST['totalPrice']) )
			{
				$totalPrice = strip_tags($_POST['totalPrice']);
			}
			
			$sqls = "";
			
			if(isset($_POST['add']))
			{
				
				
				if($noOfUnits==="")
				{
					echo "<script> alert('No of units can't be empty');</script>";
				}
				else
				{
				$totalPrice =  $pricePerUnit * $noOfUnits ;
				$sqls = "INSERT INTO selling VALUES ($medID,'$medName',$pricePerUnit,$noOfUnits,'$date',$totalPrice)";
						mysqli_query($conn,$sqls);
						header("location:sell_Medicine.php");
			}
		}	
			else if(isset($_POST['remove']))
			{
				$sqls = "DELETE FROM selling WHERE medID=$medID";
				mysqli_query($conn,$sqls);
				header("location:sell_Medicine.php");
			}
			else if(isset($_POST['check_out']))
			{
				header("location:check-out.php");
			}
		?>