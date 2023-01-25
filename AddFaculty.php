<?php 
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['designation'])) {
    echo "You are logged out";
    header('location:Index.php');
}
?>

<?php

$connect = mysqli_connect("localhost", "root", "", "projecttycomp");

if(isset($_POST["userid"]))	{
	$userid = mysqli_real_escape_string($connect, $_POST["userid"]);
	$upassword = mysqli_real_escape_string($connect, $_POST["upassword"]);
	$cpassword = mysqli_real_escape_string($connect, $_POST["cpassword"]);
	$fname = mysqli_real_escape_string($connect, $_POST["fname"]);
	$lname = mysqli_real_escape_string($connect, $_POST["lname"]);
	$address = mysqli_real_escape_string($connect, $_POST["address"]);
	$email = mysqli_real_escape_string($connect, $_POST["email"]);
	$phoneno = mysqli_real_escape_string($connect, $_POST["phoneno"]);
	$dob = mysqli_real_escape_string($connect, $_POST["dob"]);
	$caste = mysqli_real_escape_string($connect, $_POST["caste"]);
	$gender = mysqli_real_escape_string($connect, $_POST["gender"]);
	$course = mysqli_real_escape_string($connect, $_POST["course"]);
	$courseid = mysqli_real_escape_string($connect, $_POST["courseid"]);
	$desig = mysqli_real_escape_string($connect, $_POST["desig"]);
	$qualify = mysqli_real_escape_string($connect, $_POST["qualify"]);
	$adhaar = mysqli_real_escape_string($connect, $_POST["adhaar"]);
		
    $upasswordmd5 = md5($upassword);
    $cpasswordmd5 = md5($cpassword);
    
    $sql = "SELECT UserID FROM faculty WHERE UserID='".$userid."'";
            
    $data=mysqli_query($connect,$sql);
    $count=mysqli_num_rows($data);
        
    if($count == 0)
    {
        $sql = "INSERT INTO faculty (UserID, Password, Firstname, Lastname, Address, DOB, Gender, Email, PhoneNo, Course, CourseID, Designation, Qualification, AadhaarNo, Caste)
                VALUES ('$userid', '$upasswordmd5', '$fname', '$lname', '$address', '$dob', '$gender', '$email', '$phoneno', '$course', '$courseid', '$desig', '$qualify', '$adhaar', '$caste')";
        
        if($upasswordmd5==$cpasswordmd5)
        {
            $data = mysqli_query($connect, $sql);
            if($data)
            {
                echo "Your Account is Created";
                exit;	  
            }
            else
            {
                echo "Error:" . $sql . "<br>" . mysqli_error($connect);
            }
        }
        else
        {
            echo "Both password do not match";
            exit;
        }
    }
    else
    {
        echo "User already exist";
        exit;
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>College Management System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
        .form-rounded {
            border-radius: 4rem;
        }
    </style>

    <script>
        jQuery(function ($) {
            $(".sidebar-dropdown > a").click(function () {
                $(".sidebar-submenu").slideUp(200);
                if (
                    $(this)
                        .parent()
                        .hasClass("active")
                ) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .parent()
                        .removeClass("active");
                } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .next(".sidebar-submenu")
                        .slideDown(200);
                    $(this)
                        .parent()
                        .addClass("active");
                }
            });
        });
    </script>

    <script>  
        $(document).ready(function(){  
            $('#submit').click(function() {
                
                var userid = $('#userid').val();
                var upassword = $('#upassword').val();
                var cpassword = $('#cpassword').val();
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var address = $('#address').val();
                var email = $('#email').val();
                var phoneno = $('#phoneno').val();
                var dob = $('#dob').val();
                var caste = $('#caste').val();
                var gender = $('#gender').val();
                var course = $('#course').val();
                var courseid = $('#courseid').val();
                var desig = $('#desig').val();
                var qualify = $('#qualify').val();
                var adhaar = $('#adhaar').val();
                
                if(userid == '' || upassword == '' || cpassword == '' || fname == '' || lname == '' || address == '' || email == '' || phoneno == '' || dob == '' || caste == '' || gender == '' || course == '' || courseid == '' || desig == '' || qualify == '' || adhaar == '')  
                {  
                    $('#error_message').html("All Fields are required");  
                }  
                else
                {  
                    $('#error_message').html('');  
                    $.ajax({  
                        method:"POST",  
                        data:{ ajax: 1, userid:userid, upassword:upassword, cpassword:cpassword, fname:fname, lname:lname, address:address, email:email, phoneno:phoneno, dob:dob, caste:caste, gender:gender, course:course, courseid:courseid, desig:desig, qualify:qualify, adhaar:adhaar},  
                        success: function (data) {  
                            $("form").trigger("reset");  
                            $('#success_message').fadeIn().html(data);  
                            setTimeout(function() {  
                                $('#success_message').fadeOut("Slow");  
                            }, 2000);  
                        }  
                    });  
                }  
            });  
        });  
    </script>
</head>

<body>
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="Dashboard.php"><h3 style="font-family:Lucida Handwriting;">College Management System</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars" style="font-size:24px"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#"></a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-info">
                        <h5><span class="user-name"><strong><?php echo $_SESSION['username'];?></strong></span></h5>
                        <span class="user-role"><?php echo $_SESSION['designation'];?></span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div class="input-group">
                        <input type="text" class="form-control form-rounded search-menu" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar">
                            <a href="Dashboard.php">
                                <i class="fas fa-university"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-code-branch"></i>
                                <span>Course</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddCourse.php">Add Course</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-tasks"></i>
                                <span>Semester</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddSemester.php">Add Semester</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-sitemap"></i>
                                <span>Subject</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddSubject.php">Add Subjects</a>
                                    </li>
                                    <li>
                                        <a href="ViewSubject.php">View Subjects</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-user-graduate"></i>
                                <span>Student</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddStudent.php">Add Student</a>
                                    </li>
                                    <li>
                                        <a href="UpdateStudent.php">Update Student</a>
                                    </li>
                                    <li>
                                        <a href="ViewStudent.php">View Student</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span>Faculty</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddFaculty.php">Add Faculty</a>
                                    </li>
                                    <li>
                                        <a href="UpdateFaculty.php">Update Faculty</a>
                                    </li>
                                    <li>
                                        <a href="ViewFaculty.php">View Faculty</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-file-alt"></i>
                                <span>Marksheet</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="Marksheet.php">Marksheet</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>
                                <span>Attendance</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="AddAttendance.php">Add Attendance</a>
                                    </li>
                                    <li>
                                        <a href="ViewAttendance.php">View Attendance</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
        </nav>

        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <h2>Faculty Registration Form</h2>
                <hr>
                <!--faculty registration form-->
                <h5>Login Info:</h5>
                <form action="" method="POST" name="faculty" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="userid">UserID</label>
                                    <input type="text" class="form-control form-rounded" name="userid" id="userid" placeholder="UserID">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="upassword">Password</label>
                                    <input type="password" class="form-control form-rounded" name="upassword" id="upassword" placeholder="Password">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" class="form-control form-rounded" name="cpassword" id="cpassword" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <h5>Personal Info:</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control form-rounded" name="fname" id="fname" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control form-rounded" name="lname" id="lname" placeholder="Last Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control form-rounded" name="address" id="address" placeholder="Address">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="dob">DOB</label>
                                    <input type="date" class="form-control form-rounded" name="dob" id="dob">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="caste">Caste</label>
                                    <div class="form-inline">
                                        <label class="radio-inline">
                                            <input type="radio" name="caste" id="caste" value="general">General
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="caste" id="caste" value="sc">SC
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="caste" id="caste" value="st">ST
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="caste" id="caste" value="obc">OBC
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="gender">Gender</label>
                                    <div class="form-inline">
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="gender" value="male">Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="gender" value="female">Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control form-rounded" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phoneno">Phone Number</label>
                                    <input type="number" class="form-control form-rounded" name="phoneno" id="phoneno" placeholder="Phone Number">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="course">Course</label>
                                    <select name="course" id="course" class="form-control form-rounded">
                                        <option value="-1" disabled selected>Choose...</option>
                                        <option value="Computer Engineering">Computer Engineering</option>
                                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                                        <option value="Electrical & Electronics Engineering">Electrical & Electronics Emgineering</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="courseid">CourseID</label>
                                    <select name="courseid" id="courseid" class="form-control form-rounded">
                                        <option value="-1" disabled selected>Choose...</option>
                                        <option value="13">13</option>
                                        <option value="20">20</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="desig">Designation</label>
                                    <select name="desig" id="desig" class="form-control form-rounded">
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
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="qualify">Qualification</label>
                                    <input type="text" class="form-control form-rounded" name="qualify" id="qualify">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="adhaar">Adhaar_No:</label>
                                    <input type="number" class="form-control form-rounded" name="adhaar" id="adhaar">
                                </div>
                            </div>
                            <span id="error_message" class="text-danger"></span>
                            <span id="success_message" class="text-success"></span>
                            <div align="center">
                                <input type="button" id="submit" name="submit" class="btn btn-info form-rounded" value="Save">
                                <input type="reset" class="btn btn-secondary form-rounded" value="Clear">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        <!-- page-content" -->
    </div>
</body>

</html>
