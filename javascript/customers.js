
	$('.container1').click(function(){
  		$('li').toggle(1000);
  });



$(document).ready(function()
			{
				$("#search").on("keyup", function()
				{
					var value = $(this).val().toLowerCase();
					$("#table tr").filter(function()
					{
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
					$("#table tr:first").show();
				});
			});

var rIndex=1,
				table=document.getElementById("table");
			
			function checkEmptyInput()
			{
				var isEmpty=false,
					customerName=document.getElementById("Customer-name").value,
					phone=document.getElementById("Phone").value,
					address=document.getElementById("Address").value,
					gender=document.getElementById("Gender").value,
					date=document.getElementById("Date").value,
					insuranceCompany=document.getElementById("Insurance-company").value;
			
				if(customerName==="")
				{
					alert("Customer name can't be empty");
					isEmpty=true;
				}
				else if(phone==="")
				{
					alert("Phone can't be empty");
					isEmpty=true;
				}
				else if(address==="")
				{
					alert("Address can't be empty");
					isEmpty=true;
				}
				else if(gender==="")
				{
					alert("Gender can't be empty");
					isEmpty=true;
				}
				else if(date==="")
				{
					alert("Date can't be empty");
					isEmpty=true;
				}
				else if(insuranceCompany==="")
				{
					alert("Insurance company can't be empty");
					isEmpty=true;
				}
				return isEmpty;
					
			}
		
			function addHtmlTableRow()
			{
				if(!checkEmptyInput())
				{
					var newRow=table.insertRow(table.length),
						cell1=newRow.insertCell(0),
						cell2=newRow.insertCell(1),
						cell3=newRow.insertCell(2),
						cell4=newRow.insertCell(3),
						cell5=newRow.insertCell(4),
						cell6=newRow.insertCell(5),
						cell7=newRow.insertCell(6),
					
					customerId=document.getElementById("Customer-id").value,
					customerName=document.getElementById("Customer-name").value,
					phone=document.getElementById("Phone").value,
					address=document.getElementById("Address").value,
					gender=document.getElementById("Gender").value,
					date=document.getElementById("Date").value,
					insuranceCompany=document.getElementById("Insurance-company").value;

					cell1.innerHTML=customerId;
					cell2.innerHTML=customerName;
					cell3.innerHTML=phone;
					cell4.innerHTML=address;
					cell5.innerHTML=gender;
					cell6.innerHTML=date;
					cell7.innerHTML=insuranceCompany;
					
					selectRowToInput()
				}	
			}
			
			function selectRowToInput()
			{
				
				for(var i=1;i<table.rows.length;i++)
				{
					table.rows[i].onclick=function()
					{
						rIndex=this.rowIndex;
						document.getElementById("Customer-id").value=this.cells[0].innerHTML;
						document.getElementById("Customer-name").value=this.cells[1].innerHTML;
						document.getElementById("Phone").value=this.cells[2].innerHTML;
						document.getElementById("Address").value=this.cells[3].innerHTML;
						document.getElementById("Gender").value=this.cells[4].innerHTML;
						document.getElementById("Date").value=this.cells[5].innerHTML;
						document.getElementById("Insurance-company").value=this.cells[6].innerHTML;
					};
				}
			}
			selectRowToInput()
			
			function updateHtmlTableSelectedRow()
			{
				var	customerId=document.getElementById("Customer-id").value,
					customerName=document.getElementById("Customer-name").value,
					phone=document.getElementById("Phone").value,
					address=document.getElementById("Address").value,
					gender=document.getElementById("Gender").value,
					date=document.getElementById("Date").value,
					insuranceCompany=document.getElementById("Insurance-company").value;
					
				if(!checkEmptyInput())
				{	
					table.rows[rIndex].cells[0].innerHTML=customerId;
					table.rows[rIndex].cells[1].innerHTML=customerName;
					table.rows[rIndex].cells[2].innerHTML=phone;
					table.rows[rIndex].cells[3].innerHTML=address;
					table.rows[rIndex].cells[4].innerHTML=gender;	
					table.rows[rIndex].cells[5].innerHTML=date;
					table.rows[rIndex].cells[6].innerHTML=insuranceCompany;	
				}		
			}
			function deleteSelectedRow()
			{
				table.deleteRow(rIndex);
			}
			function myFunction(x) {
				x.classList.toggle("change");
			  }