$(document).ready(function(){
	$('div').fadeIn(function(){
  		$('form').toggle(1500);
  });
  });
  function checkEmptyInput()
			{
				var isEmpty=false,
                username=document.getElementById("username").value,
                password=document.getElementById("password").value;
			
				if(username==="")
				{
					alert("Username is required");
					isEmpty=true;
				}
				else if(password==="")
				{
					alert("Password is required");
					isEmpty=true;
				}
            }