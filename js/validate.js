$(".user").focusin(function() {
  $(".inputUserIcon").css("color", "#e74c3c");
}).focusout(function() {
  $(".inputUserIcon").css("color", "white");
});

$(".pass").focusin(function() {
  $(".inputPassIcon").css("color", "#e74c3c");
}).focusout(function() {
  $(".inputPassIcon").css("color", "white");
});

function validate() { 
  var username = document.getElementById("name").value;
  var birthdate = document.getElementById("dob").value;
  var contact = document.getElementById("contaddr").value;
  var email = document.getElementById("email").value;
  var adhaar = document.getElementById("adhaar").value;
  var pattern =/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/;
  var re = /\S+@\S+\.\S+/;
  var id=/^([0-9]{12})$/;
  var phone=/^([0-9]{10})$/;

  if (username !="")
  {	 
    if (pattern.test(birthdate))
	{		
        if (phone.test(contact))
		{
			if (re.test(email))
			{
				if (id.test(adhaar))
				{ 
			        // pass documents table data to text area in order to pass to display.php
			        var urlstr="";
					var doctypestr="";	
					document.getElementById('hiddenurl').innerHTML=urlstr;
					document.getElementById('hiddendoctype').innerHTML=doctypestr; 
					var tabel = document.getElementById('dataTable');
					var rowcount = tabel.rows.length;
					for (i = 0; i < rowcount; i++){
						var url = tabel.rows.item(i).getElementsByTagName("input");
						var doctype = tabel.rows.item(i).getElementsByTagName("select");  	
						urlstr+= url[1].value+" "; 
						doctypestr+= doctype[0].value+" ";               
					}   						
					document.getElementById('hiddenurl').innerHTML=urlstr;
					document.getElementById('hiddendoctype').innerHTML=doctypestr; 
					
	                //adhaar id and name match authentication code here  
	  
					
				}
				else
				{
					document.getElementById("adhaar").focus;
					alert("adhaar not correct");
				}
			}
            else
			{
				document.getElementById("email").focus;
				alert("email not correct");
			}			
		}	
		else
		{
			document.getElementById("contaddr").focus;
			alert("contact not in required format, don't use +91 in contact number");
		}
	}
    else
	{
		alert(" birth date is empty");
	} 	
  }
  else
  {
	alert("username is empty");
	document.getElementById("name").focus; 
  }  
  
}


function existvalidate() 
{ 
  var email = document.getElementById("existemail").value;
  var adhaar = document.getElementById("existadhaar").value;
  var re = /\S+@\S+\.\S+/;
  var id=/^([0-9]{12})$/;	
        
		if (re.test(email))
			{
				if (id.test(adhaar))
				{  						
	                //adhaar id and name match authentication code here  
					  
					//document.getElementById('msg').innerHTML=test;				
				}
				else
				{
					document.getElementById("existadhaar").focus;
					alert("adhaar not correct");
				}
			}
            else
			{
				document.getElementById("existemail").focus;
				alert("email not correct");
			}			
}


function adminvalidate() 
{ 
  var email = document.getElementById("adminemail").value;
  var adhaar = document.getElementById("adminadhaar").value;
  var re = /\S+@\S+\.\S+/;
  var id=/^([0-9]{12})$/;	
        
		if (re.test(email))
			{
				if (id.test(adhaar))
				{ 
			        if(email=="admin@iirs.com" && adhaar=="999999999999")
					{
					
					alert("I am admin!!"); 											
	                //adhaar id and name match authentication code here  
					  
					//document.getElementById('msg').innerHTML=test;
					}
					else
					{
					 alert("wrong credentials!!");	
					} 
				}
				else
				{
					document.getElementById("adminadhaar").focus;
					alert("adhaar not correct");
				}
			}
            else
			{
				document.getElementById("adminemail").focus;
				alert("email not correct");
			}			
}
