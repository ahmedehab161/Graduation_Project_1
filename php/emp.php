<?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "pms";
			
			$conn = mysqli_connect($host,$user,$pass,$db);
			
			$show = "SELECT * FROM emp";
			$result = mysqli_query($conn,$show);

			if( isset($_POST['empID']) )
			{
				$empID = strip_tags($_POST['empID']);
			}
			if( isset($_POST['empName']) )
			{
				$empName = strip_tags($_POST['empName']);
			}
			if( isset($_POST['empEmail']) )
			{
				$empEmail = strip_tags($_POST['empEmail']);
			}
			if( isset($_POST['empAge']) )
			{
				$empAge = strip_tags($_POST['empAge']);
			}
			if( isset($_POST['empSalary']) )
			{
				$empSalary = strip_tags($_POST['empSalary']);
			}
			if( isset($_POST['empPhone']) )
			{
				$empPhone = strip_tags($_POST['empPhone']);
			}
			if( isset($_POST['empPassword']) )
			{
				$empPassword = strip_tags($_POST['empPassword']);
			}
			if( isset($_POST['empSpecialization']) )
			{
				$empSpecialization = strip_tags($_POST['empSpecialization']);
			}

			$sqls = "";
			
			if(isset($_POST['add']))
			{
				$dup = mysqli_query($conn,"SELECT * FROM emp where empEmail='$empEmail'");
				$dup2 = mysqli_query($conn,"SELECT * FROM emp where empPhone='$empPhone'");
				

				if(mysqli_num_rows($dup)>0)
				{
					echo "<script> alert('This E-mail already exists');</script>";
				}
				else if(mysqli_num_rows($dup2)>0)
				{
					echo "<script> alert('This phone already exists');</script>";
				}
				else if($empName==="")
				{
					echo "<script> alert('Employee name can't be empty');</script>";
				}
				else if($empEmail==="")
				{
					echo "<script> alert('Employee email can't be empty');</script>";
				}
				else if (!filter_var($empEmail, FILTER_VALIDATE_EMAIL)) {
					echo "<script> alert('Invalid E-mail');</script>";
				}
				else if($empAge==="")
				{
					echo "<script> alert('Employee age can't be empty');</script>";
				}
				else if($empSalary==="")
				{
					echo "<script> alert('Salary can't be empty');</script>";
				}
				else if($empPhone==="")
				{
					echo "<script> alert('Phone can't be empty');</script>";
				}
				else if($empPassword==="")
				{
					echo "<script> alert('Password can't be empty');</script>";
				}
				else
				{
					$sqls = "INSERT INTO emp (empName,empEmail,empAge,empSalary,empPhone,empPassword,empSpecialization)
							VALUES ('$empName','$empEmail',$empAge,$empSalary,'$empPhone','$empPassword','$empSpecialization')";
							mysqli_query($conn,$sqls);
							$sqls2=" INSERT INTO login (username,password,usertype) 
							SELECT empEmail,empPassword,empSpecialization FROM emp ";
					mysqli_query($conn,$sqls2);

					header("Location: Employees.php");
				}	
			}
			if(isset($_POST['update']))
			{
				$dup = mysqli_query($conn,"SELECT * FROM emp where empEmail='$empEmail'");
				$dup2 = mysqli_query($conn,"SELECT * FROM emp where empPhone='$empPhone'");
				

				// if(mysqli_num_rows($dup)>0)
				// {
				// 	echo "<script> alert('This E-mail already exists');</script>";
				// }
				// else if(mysqli_num_rows($dup2)>0)
				// {
				// 	echo "<script> alert('This phone already exists');</script>";
				// }
			    if($empName==="")
				{
					echo "<script> alert('Employee name can't be empty');</script>";
				}
				else if($empEmail==="")
				{
					echo "<script> alert('Employee email can't be empty');</script>";
				}
				else if (!filter_var($empEmail, FILTER_VALIDATE_EMAIL)) {
					echo "<script> alert('Invalid E-mail');</script>";
				}
				else if($empAge==="")
				{
					echo "<script> alert('Employee age can't be empty');</script>";
				}
				else if($empSalary==="")
				{
					echo "<script> alert('Salary can't be empty');</script>";
				}
				else if($empPhone==="")
				{
					echo "<script> alert('Phone can't be empty');</script>";
				}
				else if($empPassword==="")
				{
					echo "<script> alert('Password can't be empty');</script>";
				}
				else
				{
				$sqls = "UPDATE emp SET empName='$empName',empEmail='$empEmail',empAge=$empAge,empSalary=$empSalary,empPhone='$empPhone',empPassword='$empPassword',empSpecialization='$empSpecialization'
						WHERE empID=$empID";
				mysqli_query($conn,$sqls);

				$sqls2=" UPDATE login SET password='$empPassword',usertype='$empSpecialization' WHERE username='$empEmail' "; 
				
				mysqli_query($conn,$sqls2);

				header("Location: Employees.php");
				
				}
			}
			if(isset($_POST['delete']))
			{
				$sqls = "DELETE FROM emp WHERE empID=$empID";
				mysqli_query($conn,$sqls);

				$sqls2 = "DELETE FROM login WHERE username = '$empEmail'";
				mysqli_query($conn,$sqls2);

				header("Location: Employees.php");
			}
		?>


<!-- -- JOIN emp e 
				-- ON l.username=e.empEmail
				-- SET l.password=e.empPassword 
				-- AND l.usertype=e.empSpecialization"; -->