<?php 
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['designation'])) {
    echo "You are logged out";
    header('location:Index.php');
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
	<link rel="stylesheet" type="text/css" href="css/AttendanceStyle.css">
	

	<style>
		.form-rounded {
			border-radius: 4rem;
		}
	</style>

	<script>
		var close = document.getElementsByClassName("closebtn");
		var i;
		for (i = 0; i < close.length; i++) {
			close[i].onclick = function() {
				var div = this.parentElement;
				div.style.opacity = "0";
				setTimeout(function() {
					div.style.display = "none";
				}, 600);
			}
		}
	</script>

	<script>
		jQuery(function($) {
			$(".sidebar-dropdown > a").click(function() {
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

			$("#close-sidebar").click(function() {
				$(".page-wrapper").removeClass("toggled");
			});
			$("#show-sidebar").click(function() {
				$(".page-wrapper").addClass("toggled");
			});
		});
	</script>
</head>

<body>
	<div class="dashboard-header">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<a class="navbar-brand" href="Dashboard.php"><h3 style="font-family:Lucida Handwriting;">College Management System</h3></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
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
						<input type="text" class="form-control search-menu" placeholder="Search...">
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="fas fa-search" aria-hidden="true"></i>
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
				<form action="#" method="post">
					<div class="container box">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label>Semester: </label>
						<select class="select" name="s" placeholder="select">
							<option value="">Select</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
						</select>

						&nbsp&nbsp&nbsp&nbsp&nbsp<label>Department: </label>
						<select class="select" name="c" placeholder="select">
							<option value="">Select</option>
							<option value="13">Computer</option>
							<option value="3">Mechanical</option>
							<option value="20">Electrical & Electronics</option>
						</select>

						&nbsp&nbsp&nbsp&nbsp&nbsp<label>Theory/Practical: </label>
						<select class="select" name="t" placeholder="select">
							<option value="">Select</option>
							<option value="Theory">Theory</option>
							<option value="Practical">Practical</option>
						</select>

						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="submit" id="search" value="Search" class="btn btn-info" />
					</div>
				</form>

				<?php

				if (isset($_POST['submit'])) {
					$s =  $_POST['s'];
					$c =  $_POST['c'];
					$t =  $_POST['t'];
					if ($s != "" && $c != "" && $t != "") {
						include "Config.php";

						$sql = ("SELECT * FROM subject WHERE CourseID='" . $c . "' AND SemID='" . $s . "'")
							or die(mysqli_connect_error());

						$data = mysqli_query($connect, $sql);
						$total = mysqli_num_rows($data);

						if ($total != 0) {
							$sql2 = ("SELECT  * FROM course where CourseID='" . $c . "'")
								or die(mysqli_connect_error());

							$data2 = mysqli_query($connect, $sql2);

							echo "<form action='#' method='post'>";
							echo "<br><br><table style='width:100%' >
											<tr>
												<th>SUBJECTID</th>
												<th>SUBJECT</th>
												<th>COURSE</th>
												<th>SEMESTER</th>
												<th>Theory/Practical</th>
												<th>SELECT</th>
											</tr>";
							while ($result2 = mysqli_fetch_array($data2)) {
								while ($result = mysqli_fetch_array($data)) {
									echo "<tr>
										<td>" . $result['SubjectID'] . "</td>
										<td>" . $result['SubjectName'] . "</td>
										<td>" . $result2['CourseName'] . "</td>
										<td>" . $result['SemID'] . "</td>
										<td>" . $t . "</td>
										<td><input type='radio' name='sub' value=" . $result['SubjectID'] . "></td>
									</tr>";
								}
							}
							echo "</table>";
							echo "<div class='container'>";
							echo "<input type='hidden' name='s' VALUE=" . $_POST['s'] . ">";
							echo "<input type='hidden' name='c' VALUE=" . $_POST['c'] . ">";
							echo "<input type='hidden' name='t' VALUE=" . $_POST['t'] . ">";
							echo "<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='submit' name='next' id='search' value='Search' class='btn btn-info' />";
							echo "</div> ";
							echo "</form>";
						} else {
							echo "Error: " . $sql . "<br>" . $connect->error;
						}
					} else {
						echo "<br><div class='alert'>
							<span class='closebtn'>&times;</span>  
							<strong>!</strong> Not selected all fields 
							</div>";
					}
				}

				?>

				<?php

				if (isset($_POST['next'])) {
					include "Config.php";
					$s =  $_POST['s'];
					$c =  $_POST['c'];
					$sub =  $_POST['sub'];
					$t =  $_POST['t'];
					if ($sub != "") {
						$sql2 = ("SELECT DISTINCT * FROM subject where SubjectID='" . $sub . "' and CourseID='" . $c . "' AND SemID='" . $s . "'")
							or die(mysqli_connect_error());

						$data = mysqli_query($connect, $sql2);
						while ($result1 = mysqli_fetch_array($data)) {
							echo "<form action='#' method='post'>";
							echo "<div class='container box'>";
							echo "<label class='thicker'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSubject: " . $result1['SubjectName'] . "</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "<label class='thicker'>Theory/Practical: " . $t . "</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "<label class='thicker'> Date: &nbsp</label><input type='date' name='date' value='date'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "<input  type='submit'   name='next2' value='Submit'  onclick='myFunction()' class='btn btn-info'/>";
							echo "</div><br>";
						}

						$sql = ("SELECT * FROM student where CourseID='" . $c . "' AND SemName='" . $s . "'")
							or die(mysqli_connect_error());

						$data = mysqli_query($connect, $sql);
						$total = mysqli_num_rows($data);

						if ($total != 0) {
							echo "<br><table style='width:80%' >
										<tr>
											<th >EnrollmentNo</th>
											<th >Name</th>
											<th >Course</th>
											<th style='width:13%'>Semester</th>
											<th style='width:10%'>Present</th>
											<th style='width:10%'>absent</th>
										</tr>";
							while ($result = mysqli_fetch_array($data)) {
								$query = ("SELECT * FROM student where EnrollmentNo=" . $result['EnrollmentNo'])
									or die(mysqli_connect_error());

								$row = mysqli_query($connect, $query);
								$total = mysqli_num_rows($row);

								if ($total != 0) {
									while ($fetch = mysqli_fetch_array($row)) {
										echo "<tr>
												<td>" . $fetch['EnrollmentNo'] . "</td>
												<td>" . $fetch['Firstname'] . "</td>
												<td>" . $fetch['Course'] . "</td>
												<td>" . $fetch['SemName'] . "</td>
												<td><input type='radio' name=" . $result['EnrollmentNo'] . " value='P' size='10' checked ></td>
												<td><input type='radio' name=" . $result['EnrollmentNo'] . "  value='A' size='10'></td>
											</tr>";
										echo "<input type='hidden' name='Enroll' VALUE=" . $fetch['EnrollmentNo'] . ">";
										echo "<input type='hidden' name='name' VALUE=" . $fetch['Firstname'] . ">";
									}
								}
							}
						}
						echo "<input type='hidden' name='s' VALUE=" . $_POST['s'] . ">";
						echo "<input type='hidden' name='t' VALUE=" . $_POST['t'] . ">";
						echo "<input type='hidden' name='c' VALUE=" . $_POST['c'] . ">";
						echo "<input type='hidden' name='sub' VALUE=" . $_POST['sub'] . ">";
						echo "</table><br>";
						echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
						echo "</form>";
					} else {
						echo "<br><div class='alert'>
									<span class='closebtn'>&times;</span>  
									<strong>!</strong> No subject is selected 
								</div>";

						$t =  $_POST['t'];
						$s =  $_POST['s'];
						$c =  $_POST['c'];

						if ($t != "" && $s != "" && $c != "") {
							include "Config.php";

							$sql = ("SELECT  * FROM subject where CourseID='" . $c . "' AND SemID='" . $s . "'AND Type='" . $t . "'")
								or die(mysqli_connect_error());

							$data = mysqli_query($connect, $sql);
							$total = mysqli_num_rows($data);

							if ($total != 0) {
								$sql2 = ("SELECT  * FROM course where CourseID='" . $c . "'")
									or die(mysqli_connect_error());

								$data2 = mysqli_query($connect, $sql2);

								echo "<form action='#' method='post'>";
								echo "<br><table style='width:100%' >
											<tr>
												<th>SUBJECT ID</th>
												<th>SUBJECT</th>
												<th>COURSE</th>
												<th>SEMESTER</th>
												<th>Theory/Practical</th>
												<th>SELECT</th>								 
											</tr>";
								while ($result2 = mysqli_fetch_array($data2)) {
									while ($result = mysqli_fetch_array($data)) {
										echo "<tr><td>" . $result['SubjectID'] . "</td>
												<td>" . $result['SubjectName'] . "</td>
												<td>" . $result2['CourseName'] . "</td>
												<td>" . $result['SemID'] . "</td>
												<td>" . $result['Type'] . "</td>
												<td><input type='radio' name='sub' value=" . $result['SubjectID'] . "></td>"
											. "</tr>";
									}
								}
								echo "</table>";
								echo "<div class='container'>";
								echo "<input type='hidden' name='s' VALUE=" . $_POST['s'] . ">";
								echo "<input type='hidden' name='c' VALUE=" . $_POST['c'] . ">";
								echo "<input type='hidden' name='t' VALUE=" . $_POST['t'] . ">";
								echo "<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='submit' name='next' id='search' value='Search' class='btn btn-info' />";
								echo "</div> ";
								echo "</form>";
							} else {
								echo "Error: " . $sql . "<br>" . $connect->error;
							}
						}
					}
				}

				?>

				<?php

				if (isset($_POST['next2'])) {
					include "Config.php";

					$s =  $_POST['s'];
					$c =  $_POST['c'];
					$sub =  $_POST['sub'];
					$t =  $_POST['t'];
					$d = $_POST['date'];

					if ($d != "") {
						$connection = new mysqli("localhost", "root", "", "projecttycomp");
						$c = $connection->real_escape_string($_POST['c']);
						$t = $connection->real_escape_string($_POST['t']);
						$s = $connection->real_escape_string($_POST['s']);
						$sub = $connection->real_escape_string($_POST['sub']);
						$d = $connection->real_escape_string($_POST['date']);

						$sql2 = $connection->query("SELECT * FROM student where CourseID='" . $c . "' AND SemName='" . $s . "'");
						if ($sql2->num_rows > 0) {
							while ($data = $sql2->fetch_array()) {
								$id = $data['EnrollmentNo'];
								$dd = $connection->real_escape_string($_POST[$data['EnrollmentNo']]);
								$sql3 = $connection->query("INSERT INTO attendance (EnrollmentNo,CourseID,SemName,SubjectID,Type,Date,Attendance) 
									VALUES ('$id','$c','$s','$sub','$t','$d','$dd')")
									or die(mysqli_connect_error());
							}
							echo '<script language="javascript">';
							echo 'alert("Succesfully Entered")';
							echo '</script>';
						} else {
							echo "Your search query doesn't match any data!";
						}
					} else {
						$sql2 = ("SELECT DISTINCT * FROM subject where SubjectID='" . $sub . "' and CourseID='" . $c . "' AND SemID='" . $s . "'")
							or die(mysqli_connect_error());

						$data = mysqli_query($connect, $sql2);
						while ($result1 = mysqli_fetch_array($data)) {
							echo "<form action='#' method='post'>";
							echo "<div class='container box'>";
							echo "<label class='thicker'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSubject: " . $result1['SubjectName'] . "</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "<label class='thicker'>Theory/Practical: " . $t . "</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "<label class='thicker'> Date: &nbsp</label><input type='date' name='date' value='date'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "<input  type='submit'   name='next2' value='Submit'  class='btn btn-info'/>";
							echo "</div><br>";
						}
						echo "<div class='alert'>
								<span class='closebtn'>&times;</span>  
								<strong>!</strong> Date not selected
							</div><br>";

						$sql = ("SELECT * FROM student where CourseID='" . $c . "' AND SemName='" . $s . "'")
							or die(mysqli_connect_error());

						$data = mysqli_query($connect, $sql);
						$total = mysqli_num_rows($data);

						if ($total != 0) {
							echo "<table style='width:60%' >
									<tr>
										<th>EnrollmentNo</th>
										<th>Name</th>
										<th>Course</th>
										<th>Semester</th>
										<th>Present</th>
										<th>absent</th>
									</tr>";
							while ($result = mysqli_fetch_array($data)) {
								$query = ("SELECT * FROM student where EnrollmentNo=" . $result['EnrollmentNo'])
									or die(mysqli_connect_error());

								$row = mysqli_query($connect, $query);
								$total = mysqli_num_rows($row);

								if ($total != 0) {
									while ($fetch = mysqli_fetch_array($row)) {
										echo "</tr><td>" . $fetch['EnrollmentNo'] . " </td><td> " . $fetch['Firstname'] . "<td>" . $fetch['Course'] . "</td><td> " . $fetch['SemName'] . "</td><td>" . "<input type='radio' name='$result[EnrollmentNo]' value='P' size='10' checked ></td><td><input type='radio' name='$result[EnrollmentNo]'  value='A' size='10'></td>";
										echo "<input type='hidden' name='Enroll' VALUE=" . $fetch['EnrollmentNo'] . ">";
										echo "<input type='hidden' name='name' VALUE=" . $fetch['Firstname'] . ">";
									}
								}
							}
						}
						echo "<input type='hidden' name='s' VALUE=" . $_POST['s'] . ">";
						echo "<input type='hidden' name='t' VALUE=" . $_POST['t'] . ">";
						echo "<input type='hidden' name='c' VALUE=" . $_POST['c'] . ">";
						echo "<input type='hidden' name='sub' VALUE=" . $_POST['sub'] . ">";
						echo "</table>";
						echo "</form>";
					}
				}
				?>
			</div>
		</main>
		<!-- page-content" -->
	</div>
</body>

</html>

<script>
	var close = document.getElementsByClassName("closebtn");
	var i;

	for (i = 0; i < close.length; i++) {
		close[i].onclick = function() {
			var div = this.parentElement;
			div.style.opacity = "0";
			setTimeout(function() {
				div.style.display = "none";
			}, 600);
		}
	}
</script>