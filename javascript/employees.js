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
        employeeName=document.getElementById("Employee-name").value,
        employeeEmail=document.getElementById("Employee-email").value,
        employeeAge=document.getElementById("Employee-age").value,
        salary=document.getElementById("Salary").value,
        phone=document.getElementById("Phone").value,
        password=document.getElementById("Password").value,
        employeeSpecialization=document.getElementById("Employee-specialization").value;
        

    if(employeeName==="")
    {
        alert("Employee name can't be empty");
        isEmpty=true;
    }
    else if(employeeEmail==="")
    {
        alert("Employee email can't be empty");
        isEmpty=true;
    }
    else if(employeeAge==="")
    {
        alert("Employee age can't be empty");
        isEmpty=true;
    }
    else if(salary==="")
    {
        alert("Salary can't be empty");
        isEmpty=true;
    }
    else if(phone==="")
    {
        alert("Phone can't be empty");
        isEmpty=true;
    }
    else if(password==="")
    {
        alert("Password can't be empty");
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
            cell8=newRow.insertCell(7),
            employeeId=document.getElementById("Employee-id").value,
            employeeName=document.getElementById("Employee-name").value,
            employeeEmail=document.getElementById("Employee-email").value,
            employeeAge=document.getElementById("Employee-age").value,
            salary=document.getElementById("Salary").value,
            phone=document.getElementById("Phone").value,
            password=document.getElementById("Password").value,
            employeeSpecialization=document.getElementById("Employee-specialization").value;
        
        cell1.innerHTML=employeeId;
        cell2.innerHTML=employeeName;
        cell3.innerHTML=employeeEmail;
        cell4.innerHTML=employeeAge;
        cell5.innerHTML=salary;
        cell6.innerHTML=phone;
        cell7.innerHTML=password;
        cell8.innerHTML=employeeSpecialization;
        selectedRowToInput();
    }	
}

function selectedRowToInput()
{
    for(var i=1;i<table.rows.length;i++)
    {
        table.rows[i].onclick=function()
        {
            rIndex=this.rowIndex;
            document.getElementById("Employee-id").value=this.cells[0].innerHTML;
            document.getElementById("Employee-name").value=this.cells[1].innerHTML;
            document.getElementById("Employee-email").value=this.cells[2].innerHTML;
            document.getElementById("Employee-age").value=this.cells[3].innerHTML;
            document.getElementById("Salary").value=this.cells[4].innerHTML;
            document.getElementById("Phone").value=this.cells[5].innerHTML;
            document.getElementById("Password").value=this.cells[6].innerHTML;
            document.getElementById("Employee-specialization").value=this.cells[7].innerHTML;
        };
    }
}
selectedRowToInput();

function updateHtmlTableSelectedRow()
{
    var	employeeId=document.getElementById("Employee-id").value,
        employeeName=document.getElementById("Employee-name").value,
        employeeEmail=document.getElementById("Employee-email").value,
        employeeAge=document.getElementById("Employee-age").value,
        salary=document.getElementById("Salary").value,
        phone=document.getElementById("Phone").value,
        password=document.getElementById("Password").value,
        employeeSpecialization=document.getElementById("Employee-specialization").value;
    if(!checkEmptyInput())	
    {
        table.rows[rIndex].cells[0].innerHTML=employeeId;
        table.rows[rIndex].cells[1].innerHTML=employeeName;
        table.rows[rIndex].cells[2].innerHTML=employeeEmail;
        table.rows[rIndex].cells[3].innerHTML=employeeAge;
        table.rows[rIndex].cells[4].innerHTML=salary;
        table.rows[rIndex].cells[5].innerHTML=phone;
        table.rows[rIndex].cells[6].innerHTML=password;
        table.rows[rIndex].cells[7].innerHTML=employeeSpecialization;
    }
}

function deleteSelectedRow()			
{
    table.deleteRow(rIndex);
}
function myFunction(x) {
    x.classList.toggle("change");
  }