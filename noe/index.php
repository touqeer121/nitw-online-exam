<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="navStyle.css">
	<title>NITW || Online Exam Portal</title>
	<style>
		#hd1{
			margin: 20px 0px 0px 180px;
			font: 36px "Source Sans Pro", sans-serif;			
			color: white;
		}
		#hd2{
			margin: 182px 162px 0px 0px;
			font: 28px "Source Sans Pro", sans-serif;			
			color: white;
		}
		.textbox{
			font: 16px "Source Sans Pro", sans-serif;
			font-weight : bold;
			padding: 4px;
			height: 20px;
			width: 245px;
			color: white;
			background-color: rgba(1,1,1,0);
			border: solid 0.5px white;
			border-radius: 2px;
		}
		.textbox:active{
			border: solid 0.5px white;
		}
		::placeholder{
			color: rgba(242, 241, 237,.8);
		}
		.myButton1{
			font: 18px "Source Sans Pro", sans-serif;
			font-weight : bold;
			padding: 4px;
			margin: 10px auto 10px -5px;
			height: 35px;
			width: 262px;
			color: grey;
			border: solid 0.5px white;
			background-color: white;
			border-radius: 2px;
			cursor : pointer;
		}
		.myButton2{
			font: 16px "Source Sans Pro", sans-serif;
			/*font-weight : 1200;*/
			padding: 6px 21px;
			/*display: flex;*/
			margin: 10px auto 0px auto;
			height: 35px;
			color: rgba(0,0,0,0.6);
			border: solid 0.5px #E0E1E2;
			background-color: #E0E1E2;
			border-radius: 4px;
			cursor : pointer;
		}
		#horz{
			width: 75%;
			border: 0.85px solid rgba(.1,.1,.1, 0.1);
			margin: 4px auto 0px 30px;
		}
		#logo{
			margin: 210px 0px 0px 165px;
		}
	</style>
	<script type="text/javascript">
		function validateForm(){
			console.log("submit pressed");
			return true;
		}
	</script>
</head>
<body id="indexBody">
	<div class="external-container">
		<div id="ic1" class="internal-container">
			<img id="logo" src="http://wsdc.nitw.ac.in/static/img/logo_wsdc.png" alt="wsdc logo" width="200"/><br>
			<h1 id="hd1">Online Exam Portal</h1>
		</div>
		<div id="ic2" class="internal-container">
			<h1 id="hd2">Welcome!</h1>
			<form role="form" method="post" action="login.php?q=index.php">
			<div class="login-area">
				<input class="textbox" id="tb1" type="text" name="username" placeholder="Registration number"><br>
				<input class="textbox" id="tb2" type="password" name="password" placeholder="Password">
				<input class="myButton1" id="mb1"type="submit" onclick=" " value="Login">
			</div>
			</form>
			<hr id="horz">
			<div class="int">
				<a class="myButton2" id="signup_button"><i class="fa fa-pencil-square-o"></i> <b>Signup</b></a>
				<a class="myButton2" id="mb2_2"><i class="fa fa-user"></i> <b>Forgot Password</b></a>
			</div>
		</div>	 
	</div>

	<!-- The Login fail Modal -->
	<div id="loginFailModal" class="modal">
		<div class="modal-content">
	    	<div class="modal-body">
	    		<p style="font-size:20px; font-weight: bold;">Invalid Username or Password</p>
	    	</div>
		</div>
	</div>
	<script>
		var loginFailModal = document.getElementById('loginFailModal');
		function loginError(){		
				loginFailModal.style.display = "block";	
		}
	</script>
	<?php 
		if($ref=@$_GET['w']){
			echo '<script type="text/javascript">',
				'loginError()',
				'</script>';
		}
	?>
	 <!-- The Signup Modal -->
	<div id="signupModal" class="modal">
	  <div class="modal-content">
	    <div class="modal-header">
	      <span class="close">&times;</span>
	      <h2 style="font-size: 24px;">Create a new account</h2>
	    </div>
	    <div class="modal-body">
	      <form name="regForm" action="signup.php?q=account.php" onSubmit="validateForm()" method="POST">
	      	<div class="myFormGroup"> 
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Full name:</label>
	      		<input class="myTextbox" type="text" name="full_name" id="fullname" placeholder="Enter a name">
	      		</div>
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Username:</label>
	      		<input class="myTextbox" type="text" name="username" id="username" placeholder="Enter a username">
	      		</div>
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Password:</label>
	      		<input class="myTextbox" type="password" name="password1" id="password1" placeholder="Enter a password">
	      		</div>
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Repeat password:</label>
	      		<input class="myTextbox" type="password" name="password2" id="password2" placeholder="Re-enetr the same password">
	      		</div>
	      	</div>
	      	<div class="myFormGroup"> 
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Registration Number:</label>
	      		<input class="myTextbox" type="text" name="reg_no" id="regno" placeholder="Enter a valid registration number">
	      		</div>
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Roll Number:</label>
	      		<input class="myTextbox" type="text" name="roll_no" id="rollno" placeholder="Same as registration number for 1st year">
	      		</div>
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Email:</label>
	      		<input class="myTextbox" type="text" name="email" id="email" placeholder="Enter email">
	      		</div>
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Mobile Number:</label>
	      		<input class="myTextbox" type="text" name="mobile_no" id="mobileno" placeholder="Enter mobile number">
	      		</div>
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Gender:</label>
	      		<select class="mySelectBox" name="gender" id="gender">
	      			<option value="choose" disabled="true" selected>Choose Gender</option>
	      			<option value="male" name="male">Male</option>
	      			<option value="female" name="female">Female</option>
	      		</select>
	      		</div>
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Course:</label>
	      		<select class="mySelectBox" name="course" id="course">
	      			<option value="choose" disabled="true" selected>Choose Course</option>
	      			<option value="btech" name="btech">B Tech</option>
	      			<option value="mtech" name="mtech">M Tech</option>
	      			<option value="mca" name="mca">MCA</option>
	      			<option value="mba" name="mba">MBA</option>
	      			<option value="msc" name="msc">MSc</option>
	      			<option value="phd" name="phd">PhD</option>
	      			<option value="msctech" name="msctech">Msc. Tech</option>	
	      		</select>
	      		</div>
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Current year:</label>
	      		<input class="myTextbox" type="number" name="current_year" id="currentyear" placeholder="Example: 1">
	      		</div>
	      		<div class="myFormElement">
	      		<label class="myFormLabel">Admission type:</label>
	      		<select class="mySelectBox" name="admission_type" id="admissiontype">
	      			<option value="choose" disabled="true" selected>Choose Category</option>
	      			<option value="normal" name="btech">Normal</option>
	      			<option value="dasa" name="mtech">DASA</option>
	      			<option value="iccr" name="mca">ICCR</option>
	      			<option value="mea" name="mba">MEA</option>
	      			<option value="spdc" name="msc">SPDC</option>
	      			<option value="study_in_india" name="phd">Study in India</option>
	      		</select>
	      		</div>
	      	</div>
		      <div class="modal-footer">
		      <input class="myButton3" type="submit" name="signup" value="Submit">
		      <!-- <h3>Modal Footer</h3> -->
		    </div>
		    </form>
	    </div>
	  </div>
	</div>

	<script>
		var signupModal = document.getElementById("signupModal");
		var btn = document.getElementById("signup_button");
		var span = document.getElementsByClassName("close")[0];
		btn.onclick = function() {
		  signupModal.style.display = "block";
		}
		span.onclick = function() {
		  signupModal.style.display = "none";
		}
		window.onclick = function(event) {
		  if (event.target == signupModal || event.target == loginFailModal) {
		    signupModal.style.display = "none";
		    loginFailModal.style.display = "none";
		  }
		}
		</script>
	
</body>
</html>