$(document).ready(function()
			{
				$("#search").on("keyup", function()
				{
					var value = $(this).val().toLowerCase();
					$("#list-table tr").filter(function() 
					{
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
					$("#list-table tr:first").show();
				});
			});
			var rIndex=1,
                rIndex1=1,
				table=document.getElementById("table1"),
                table1=document.getElementById("list-table");
			
			function checkEmptyInput()
			{
				var isEmpty=false,
					noofunits=document.getElementById("no-of-units").value;
							
				
				if(noofunits==="")
				{
					alert("No. of units can't be empty");
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
						medicineId=document.getElementById("Medicine-id").value,
						medicineName=document.getElementById("Medicine-name").value,
						priceperunit=document.getElementById("price-per-unit").value,
						noofunits=document.getElementById("no-of-units").value,
						date=document.getElementById("Date").value,
						totalprice=document.getElementById("total-price").value;
						
					
					cell1.innerHTML=medicineId;
					cell2.innerHTML=medicineName;
					cell3.innerHTML=priceperunit;
					cell4.innerHTML=noofunits;
					cell5.innerHTML=date;
					cell6.innerHTML=totalprice;
			
				
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
						document.getElementById("Medicine-id").value=this.cells[0].innerHTML;
						document.getElementById("Medicine-name").value=this.cells[1].innerHTML;
						document.getElementById("price-per-unit").value=this.cells[2].innerHTML;
						document.getElementById("no-of-units").value=this.cells[3].innerHTML;
						document.getElementById("Date").value=this.cells[4].innerHTML;
						document.getElementById("total-price").value=this.cells[5].innerHTML;
					
					};
				}
			}
			function selectRowToInput1()
			{
				
				for(var x=1;x<table1.rows.length;x++)
				{
					table1.rows[x].onclick=function()
					{
						rIndex1=this.rowIndex;
						document.getElementById("search").value=this.cells[0].innerHTML;
					};
				}
			}
			selectRowToInput()
            selectRowToInput1()
			function deleteSelectedRow()
			{
				table.deleteRow(rIndex);
			}