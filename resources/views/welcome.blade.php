<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Form Validation</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<h2 class="text-center my-5 text-success">Task 3 : Form Validation through AJAX</h2>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	<script>
		function closeBox()
		{
			$("#errorBox").addClass("d-none");
			$("#successBox").addClass("d-none");
		}
		function checkAndSubmit()
		{	
			closeBox();
			var name = $('#name').val();
			var email = $('#email').val();
			var pincode = $('#pincode').val();
			var send="email="+email+"&name="+name+"&pincode="+pincode;
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					$("#successBox").removeClass("d-none");

					$('#name').val("");
					$('#email').val("");
					$('#pincode').val("");
				}
				else if(this.readyState == 4 && this.status == 422)
				{
					$("#errorBox").removeClass("d-none");
					var myObj = JSON.parse(this.responseText);
					var output="";
					for (var property in myObj['errors']) {
						output += "<div>"+myObj['errors'][property]+"</div>";
					}
					$('#error').html(output);
				}
			};
			xhttp.open("POST", "http://127.0.0.1:8000/api/register", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(send);
		}

	</script>
	<div class="container">
		
		<div class="alert alert-success d-none" id="successBox">
			<button type="button" class="close" onclick="closeBox()">&times;</button>
			<strong>successfull submitted !!</strong> .
		</div>
		<div class="alert alert-danger d-none" id="errorBox">
			<button type="button" class="close" onclick="closeBox()">&times;</button>
			<div id="error"></div>
		</div>

		<form>
			@csrf()
			<div class="form-group">
				<label for="email" class="font-weight-bold">Email</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="Enter your mail" autofocus>
			</div>
			<div class="form-group">
				<label for="name" class="font-weight-bold">Name</label>
				<input type="text" class="form-control" id="name"  name="name" placeholder="Enter your name">
			</div>
			<div class="form-group">
				<label for="pincode" class="font-weight-bold">Pincode</label>
				<input type="number" class="form-control" id="pincode" name="pincode" placeholder="Pincode">
			</div>
			<div class="text-center">
				<input type="button" name="submit" value="submit" class="btn btn-info btn-lg text-uppercase" onclick="checkAndSubmit()">
			</div>
		</form>

	</div>
</body>
</html>