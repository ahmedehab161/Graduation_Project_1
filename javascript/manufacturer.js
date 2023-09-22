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
					Companyname=document.getElementById("Company-name").value,
					Phone=document.getElementById("Phone").value,
					Address=document.getElementById("Address").value;
					
				if(Companyname==="")
				{
					alert("Company name can't be empty");
					isEmpty=true;
				}
				else if(Phone==="")
				{
					alert("Phone can't be empty");
					isEmpty=true;
				}
				else if(Address==="")
				{
					alert("Address can't be empty");
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
						
						Companyid=document.getElementById("Company-id").value,
						Companyname=document.getElementById("Company-name").value,
						Phone=document.getElementById("Phone").value,
						Address=document.getElementById("Address").value;
						
					cell1.innerHTML=Companyid;
					cell2.innerHTML=Companyname;
					cell3.innerHTML=Phone;
					cell4.innerHTML=Address;
				
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
						document.getElementById("Company-id").value=this.cells[0].innerHTML;
						document.getElementById("Company-name").value=this.cells[1].innerHTML;
						document.getElementById("Phone").value=this.cells[2].innerHTML;
						document.getElementById("Address").value=this.cells[3].innerHTML;
					};
				}
			}
			selectRowToInput()
			
			function updateHtmlTableSelectedRow()
			{
				var	Companyid=document.getElementById("Company-id").value,
					Companyname=document.getElementById("Company-name").value,
					Phone=document.getElementById("Phone").value,
					Address=document.getElementById("Address").value;
				if(!checkEmptyInput())
				{	
					table.rows[rIndex].cells[0].innerHTML=Companyid;
					table.rows[rIndex].cells[1].innerHTML=Companyname;
					table.rows[rIndex].cells[2].innerHTML=Phone;
					table.rows[rIndex].cells[3].innerHTML=Address;	
				}		
			}
			function deleteSelectedRow()
			{
				table.deleteRow(rIndex);
			}
			function myFunction(x) {
				x.classList.toggle("change");
			  }