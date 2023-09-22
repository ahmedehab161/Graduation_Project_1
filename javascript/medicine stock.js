$('.container1').click(function(){
    $('li').toggle(1000);
});

$(document).ready(function()
		{
			$("#search2").on("keyup", function() 
			{
				var value = $(this).val().toLowerCase();
				$("#table-medicine tr").filter(function()
				{
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
				$("#table-medicine tr:first").show();
			});
		});

$(document).ready(function(){
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table tr").filter(function() {
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
            medicineName=document.getElementById("Medicine-name").value,
            buyingPrice=document.getElementById("Buying-price").value,
            sellingPrice=document.getElementById("Selling-price").value,
            quantity=document.getElementById("Quantity").value,
            manufacturerName=document.getElementById("Manufacturer-name").value,
            date=document.getElementById("Date").value;
            
        if(medicineName==="")
        {
            alert("Medicinen name can't be empty");
            isEmpty=true;
        }
        else if(buyingPrice==="")
        {
            alert("Buying price can't be empty");
            isEmpty=true;
        }
        else if(sellingPrice==="")
        {
            alert("Selling price can't be empty");
            isEmpty=true;
        }
        else if(quantity==="")
        {
            alert("Quantity can't be empty");
            isEmpty=true;
        }
        else if(manufacturerName==="")
        {
            alert("Manufacturer name can't be empty");
            isEmpty=true;
        }
        else if(date==="")
        {
            alert("Date can't be empty");
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
                medicineId=document.getElementById("Medicine-id").value,
                medicineName=document.getElementById("Medicine-name").value,
                buyingPrice=document.getElementById("Buying-price").value,
                sellingPrice=document.getElementById("Selling-price").value,
                quantity=document.getElementById("Quantity").value,
                manufacturerName=document.getElementById("Manufacturer-name").value,
                date=document.getElementById("Date").value;
            
            cell1.innerHTML=medicineId;
            cell2.innerHTML=medicineName;
            cell3.innerHTML=buyingPrice;
            cell4.innerHTML=sellingPrice;
            cell5.innerHTML=quantity;
            cell6.innerHTML=manufacturerName;
            cell7.innerHTML=date;
        
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
                document.getElementById("Buying-price").value=this.cells[2].innerHTML;
                document.getElementById("Selling-price").value=this.cells[3].innerHTML;
                document.getElementById("Quantity").value=this.cells[4].innerHTML;
                document.getElementById("Manufacturer-name").value=this.cells[5].innerHTML;
                document.getElementById("Date").value=this.cells[6].innerHTML;
            };
        }
    }
    selectRowToInput()
    
    function updateHtmlTableSelectedRow()
    {
        var	medicineId=document.getElementById("Medicine-id").value,
            medicineName=document.getElementById("Medicine-name").value,
            buyingPrice=document.getElementById("Buying-price").value,
            sellingPrice=document.getElementById("Selling-price").value,
            quantity=document.getElementById("Quantity").value,
            manufacturerName=document.getElementById("Manufacturer-name").value,
            date=document.getElementById("Date").value;
        if(!checkEmptyInput())
        {	
            table.rows[rIndex].cells[0].innerHTML=medicineId;
            table.rows[rIndex].cells[1].innerHTML=medicineName;
            table.rows[rIndex].cells[2].innerHTML=buyingPrice;
            table.rows[rIndex].cells[3].innerHTML=sellingPrice;	
            table.rows[rIndex].cells[4].innerHTML=quantity;
            table.rows[rIndex].cells[5].innerHTML=manufacturerName;	
            table.rows[rIndex].cells[6].innerHTML=date;	
        }		
    }
    function deleteSelectedRow()
    {
        table.deleteRow(rIndex);
    }
    function myFunction(x) {
        x.classList.toggle("change");
      }