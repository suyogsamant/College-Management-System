<?php
session_start();
?>

<?php
 $connect = mysqli_connect("localhost", "root", "", "projecttycomp");  

if(isset($_POST['signin'])){
    $designation = $_POST["designation"];  
	$username = $_POST["username"];  
	$password = $_POST["password"];
	$password = md5($password);

    $query = "select * from admin where Username = '$username' and Password = '$password' and Designation = '$designation'";
	$result = mysqli_query($connect, $query);  
	if(mysqli_num_rows($result) > 0)  
	{  
		$_SESSION['username'] = $username;
		$_SESSION['designation'] = $designation; 
		header("location: Dashboard.php");
	}  
	else
	{  
		echo '<script>alert("Wrong User Details")</script>';  
	}
}

if(isset($_POST['signup'])){
	$designation = mysqli_real_escape_string($connect, $_POST['designation']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $cpassword = mysqli_real_escape_string($connect, $_POST['cpassword']);

    $pass = md5($password);
    $cpass = md5($cpassword);

    $emailquery = "select * from admin where Username = '$username' and Designation = '$designation'";
    $query = mysqli_query($connect, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        echo "User already exists";
    }else{
        if($password === $cpassword){
            $insertquery = "insert into admin(Username, Password, CPassword, Designation) 
                            values('$username', '$pass', '$cpass', '$designation')";
            $iquery = mysqli_query($connect, $insertquery);
            
            if($connect){
                ?>
                    <script>
                        alert("Inserted Successful");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        alert("Not Inserted");
                    </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("Passwords are not matching");
                </script>
            <?php
        }
    }
}
?>

<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== 
    <link rel="stylesheet" href="style.css">-->

	<style>
		/* ===== Google Font Import - Poformsins ===== */
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}

		body{
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			background-color: #4070f4;
		}

		.container{
			position: relative;
			max-width: 430px;
			width: 100%;
			background: #fff;
			border-radius: 10px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
			overflow: hidden;
			margin: 0 20px;
		}

		.container .forms{
			display: flex;
			align-items: center;
			height: 520px;
			width: 200%;
			transition: height 0.2s ease;
		}

		.container .form{
			width: 50%;
			padding: 30px;
			background-color: #fff;
			transition: margin-left 0.18s ease;
		}

		.container.active .login{
			margin-left: -50%;
			opacity: 0;
			transition: margin-left 0.18s ease, opacity 0.15s ease;
		}

		.container .signup{
			opacity: 0;
			transition: opacity 0.09s ease;
		}
		.container.active .signup{
			opacity: 1;
			transition: opacity 0.2s ease;
		}

		.container.active .forms{ height: 600px; }

		.container .form .title{
			position: relative;
			font-size: 27px;
			font-weight: 600;
		}

		.form .title::before{
			content: '';
			position: absolute;
			left: 0;
			bottom: 0;
			height: 3px;
			width: 30px;
			background-color: #4070f4;
			border-radius: 25px;
		}

		.form .input-field, .select-field{
			position: relative;
			height: 50px;
			width: 100%;
			margin-top: 30px;
		}

		.input-field input, .select-field select{
			position: absolute;
			height: 100%;
			width: 100%;
			padding: 0 35px;
			border: none;
			outline: none;
			font-size: 16px;
			border-bottom: 2px solid #ccc;
			border-top: 2px solid transparent;
			transition: all 0.2s ease;
		}

		.input-field input:is(:focus, :valid){ border-bottom-color: #4070f4; }

		.input-field i{
			position: absolute;
			top: 50%;
			transform: translateY(-50%);
			color: #999;
			font-size: 23px;
			transition: all 0.2s ease;
		}

		.input-field input:is(:focus, :valid) ~ i{ color: #4070f4; }

		.input-field i.icon{ left: 0; }
		
		.input-field i.showHidePw{
			right: 0;
			cursor: pointer;
			padding: 10px;
		}

		.form .checkbox-text{
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin-top: 20px;
		}

		.checkbox-text .checkbox-content{
			display: flex;
			align-items: center;
		}

		.checkbox-content input{
			margin-right: 10px;
			accent-color: #4070f4;
		}

		.form .text{
			color: #333;
			font-size: 14px;
		}

		.form a.text{
			color: #4070f4;
			text-decoration: none;
		}
		.form a:hover{ text-decoration: underline; }

		.form .button{ margin-top: 35px; }

		.form .button input{
			border: none;
			color: #fff;
			font-size: 17px;
			font-weight: 500;
			letter-spacing: 1px;
			border-radius: 6px;
			background-color: #4070f4;
			cursor: pointer;
			transition: all 0.3s ease;
		}

		.button input:hover{ background-color: #265df2;	}

		.form .login-signup{
			margin-top: 30px;
			text-align: center;
		}
	</style>
         
    <!--<title>Login & Registration Form</title>-->
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form method="POST">
					<div class="select-field">
						<select name="designation" id="designation" required>
							<option value="-1" disabled selected>Choose...</option>
							<option value="Administrator">Administrator</option>
							<option value="HOD">HOD</option>
							<option value="Teaching Staff">Teaching Staff</option>
							<option value="Non-Teaching Staff">Non-Teaching Staff</option>
							<option value="Librarian">Librarian</option>
							<option value="Accountant">Accountant</option>
							<option value="Clerk">Clerk</option>
						</select>
					</div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your Username" name="username" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your Password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login" name="signin">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>

                <form method="POST">
					<div class="select-field">
						<select name="designation" id="designation" required>
							<option value="-1" disabled selected>Choose...</option>
							<option value="Administrator">Administrator</option>
							<option value="HOD">HOD</option>
							<option value="Teaching Staff">Teaching Staff</option>
							<option value="Non-Teaching Staff">Non-Teaching Staff</option>
							<option value="Librarian">Librarian</option>
							<option value="Accountant">Accountant</option>
							<option value="Clerk">Clerk</option>
						</select>
					</div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your Username" name="username" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Create a Password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm a Password" name="cpassword" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accepted all terms and conditions</label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Register" name="signup">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="#" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
	const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });
</script>