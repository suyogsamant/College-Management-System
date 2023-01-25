<?php 
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['designation'])) {
    echo "You are logged out";
    header('location:Index.php');
}
?>

<?php

include('Config.php');

if (isset($_POST['submit'])) {

	$cs = $_POST['Course'];
	$sm = $_POST['Semester'];
	$sb = $_POST['Subject'];

	$sc = "SELECT CourseName FROM course WHERE CourseID = '$cs'";
	$ms = "SELECT SemName FROM semester WHERE SemID = '$sm'";
	$bs = "SELECT SubjectName FROM subject WHERE SubjectID='$sb'";

	$sc = mysqli_query($connect, $sc);
	while ($row = $sc->fetch_assoc()) {
		$CO = $row["CourseName"];
	}

	$ms = mysqli_query($connect, $ms);
	while ($row = $ms->fetch_assoc()) {
		$SE = $row["SemName"];
	}

	$bs = mysqli_query($connect, $bs);
	while ($row2 = $bs->fetch_assoc()) {
		$SU = $row2["SubjectName"];
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
			<div id="newr">
				<div class="dashboard-ecommerce">
					<div class="container-fluid dashboard-content ">
						<div class="ecommerce-widget">
							<!----FROM HERE----->
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="card">
									<h5 class="card-header">
										<FONT>COURSE: <?php echo $CO;?><FONT>&nbsp &nbsp &nbsp</FONT>
										<FONT>SEM: <?php echo $SE;?><FONT>&nbsp &nbsp &nbsp</FONT>
										<FONT>SUBJECT: <?php echo $SU;?>
									</h5>
									<div class="card-body p-0">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="card">

											</DIV>
										</DIV>
										<div class="row">
											<div class="col-xl-12 col-lg-6 col-md-6 col-sm-10 col-10">
												<div class="card">
													<div class="card-body">
														<table id="data_table" class="table table-striped">
															<thead>
																<tr>
																	<th>Enrollment No</th>
																	<th>PA1</th>
																	<th>PA2</th>
																	<th>Average</th>
																	<th>Theory</th>
																	<th>Practical</th>
																	<th>Termwork</th>
																</tr>
															</thead>
															<tbody>
																<?php
																error_reporting(0);

																$sql_query = "SELECT EnrollmentNo FROM student WHERE CourseID = '$cs' AND SemName='$sm'";
																$resultset = mysqli_query($connect, $sql_query) 
																			or die("database error:" . mysqli_error($connect));
																while ($developer = mysqli_fetch_assoc($resultset)) {
																?>
																	<tr id="<?php echo $developer['EnrollmentNo']; ?>">
																		<td><?php echo $developer['EnrollmentNo']; ?></td>
																		<td><?php echo $developer['PA1']; ?></td>
																		<td><?php echo $developer['PA2']; ?></td>
																		<td><?php echo $developer['Average']; ?></td>
																		<td><?php echo $developer['Theory']; ?></td>
																		<td><?php echo $developer['Practical']; ?></td>
																		<td><?php echo $developer['Termwork']; ?></td>
																	</tr>
																<?php
																}
																?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>

	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

	<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>

	<script src="assets/libs/js/main-js.js"></script>

	<script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>

	<script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>

	<script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
	<script src="assets/vendor/charts/morris-bundle/morris.js"></script>

	<script src="assets/vendor/charts/c3charts/c3.min.js"></script>
	<script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
	<script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
	<script src="assets/libs/js/dashboard-ecommerce.js"></script>


	<script type="text/javascript" src="js/jquery.tabledit.js"></script>

	<script>
		$(document).ready(function() {
			$('#data_table').Tabledit({
				deleteButton: false,
				editButton: false,
				columns: {
					identifier: [0, 'EnrollmentNo'],
					editable: [
						[1, 'PA1'],
						[2, 'PA2'],
						[3, 'Average'],
						[4, 'Theory'],
						[5, 'Practical'],
						[6, 'Termwork']
					]
				},
				hideIdentifier: false,
				url: 'AddMarks2.php'
			});
		});
	</script>
</body>

</html>